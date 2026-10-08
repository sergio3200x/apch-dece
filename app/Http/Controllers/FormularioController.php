<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Process\Exceptions\ProcessTimedOutException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use JsonException;
use Symfony\Component\Process\Exception\ProcessStartFailedException;

use function Illuminate\Support\defer;

class FormularioController extends Controller
{
    private const MAPA_FORMULARIOS = [
        'ENTREVISTA ESTUDIANTES' => 'entrevista-estudiantes',
        'FICHA DE OBSERVACIÓN' => 'ficha-observacion',
        'FICHA DE DERIVACIÓN' => 'ficha-derivacion',
        'ENTREVISTA REPRESENTANTES' => 'entrevista-representantes',
        'ENTREVISTA DOCENTES' => 'entrevista-docentes',
        'CONSENTIMIENTO INFORMADO' => 'consentimiento-informado',
        'FICHA DE NOTIFICACIÓN DE ALERTA DECE' => 'ficha-alerta-dece',
        'PLAN DE ATENCIÓN PSICOSOCIAL Y SEGUIMIENTO' => 'plan-atencion-psicosocial',
    ];

    public function index()
    {
        return view('formularios.index');
    }

    public function misFormularios($nombre)
    {
        $formularios = Formulario::with('usuario')
            ->where('nombre_formulario', $nombre)
            ->where('usuario_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'formularios' => $formularios,
            'usuario_actual' => auth()->id(),
        ]);
    }

    public function misDocumentos(string $tipo)
    {
        $tiposFormulario = [
            'entrevista-estudiantes' => [
                'nombre' => 'ENTREVISTA ESTUDIANTES',
                'ruta' => 'formularios.entrevista-estudiantes',
            ],
            'ficha-observacion' => [
                'nombre' => 'FICHA DE OBSERVACIÓN',
                'ruta' => 'formularios.ficha-observacion',
            ],
            'ficha-derivacion' => [
                'nombre' => 'FICHA DE DERIVACIÓN',
                'ruta' => 'formularios.ficha-derivacion',
            ],
            'entrevista-representantes' => [
                'nombre' => 'ENTREVISTA REPRESENTANTES',
                'ruta' => 'formularios.entrevista-representantes',
            ],
            'entrevista-docentes' => [
                'nombre' => 'ENTREVISTA DOCENTES',
                'ruta' => 'formularios.entrevista-docentes',
            ],
            'consentimiento-informado' => [
                'nombre' => 'CONSENTIMIENTO INFORMADO',
                'ruta' => 'formularios.consentimiento-informado',
            ],
            'ficha-alerta-dece' => [
                'nombre' => 'FICHA DE NOTIFICACIÓN DE ALERTA DECE',
                'ruta' => 'formularios.ficha-alerta-dece',
            ],
            'plan-atencion-psicosocial' => [
                'nombre' => 'PLAN DE ATENCIÓN PSICOSOCIAL Y SEGUIMIENTO',
                'ruta' => 'formularios.plan-atencion-psicosocial',
            ],
        ];

        abort_unless(isset($tiposFormulario[$tipo]), 404);

        $tipoSeleccionado = $tiposFormulario[$tipo];
        $formularios = Formulario::query()
            ->where('usuario_id', auth()->id())
            ->where('nombre_formulario', $tipoSeleccionado['nombre'])
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(20);

        return view('formularios.mis-documentos', [
            'formularios' => $formularios,
            'nombreFormulario' => $tipoSeleccionado['nombre'],
            'rutaFormulario' => $tipoSeleccionado['ruta'],
        ]);
    }

    public function verPdf(Formulario $formulario)
    {
        abort_unless($formulario->usuario_id === auth()->id(), 404);

        if (
            ! $formulario->pdf_path ||
            ! Storage::disk('local')->exists($formulario->pdf_path)
        ) {
            abort(404, 'El PDF no existe.');
        }

        return response()->file(
            Storage::disk('local')->path($formulario->pdf_path),
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="formulario-'.$formulario->id.'.pdf"',
            ]
        );
    }

    public function editar(Formulario $formulario)
    {
        abort_unless($formulario->usuario_id === auth()->id(), 404);
        abort_if($formulario->ediciones >= 1, 403, 'Este formulario ya fue editado.');

        $vistaFormulario = self::MAPA_FORMULARIOS[$formulario->nombre_formulario] ?? null;

        abort_unless($vistaFormulario, 404, 'No se reconoce el tipo de formulario.');

        if (
            ! $formulario->datos_path ||
            ! Storage::disk('local')->exists($formulario->datos_path)
        ) {
            abort(404, 'Los datos del formulario no existen.');
        }

        try {
            $datos = json_decode(
                Storage::disk('local')->get($formulario->datos_path),
                true,
                512,
                JSON_THROW_ON_ERROR
            );
        } catch (JsonException $exception) {
            Log::error('No se pudieron leer los datos para editar el formulario.', [
                'formulario_id' => $formulario->id,
                'exception' => $exception::class,
                'message' => $exception->getMessage(),
            ]);

            abort(500, 'No se pudieron leer los datos del formulario.');
        }

        abort_unless(is_array($datos), 500, 'Los datos del formulario no tienen un formato válido.');

        return view('formularios.'.$vistaFormulario, [
            'datosEditar' => $datos,
            'formularioEditar' => $formulario,
        ]);
    }

    public function actualizar(Request $request, Formulario $formulario)
    {
        abort_unless($formulario->usuario_id === auth()->id(), 404);

        $datosValidados = $request->validate([
            'datos' => ['required', 'array'],
        ]);

        $nombreFormulario = $formulario->nombre_formulario;
        $vistaFormulario = self::MAPA_FORMULARIOS[$nombreFormulario] ?? null;

        abort_unless($vistaFormulario, 404, 'No se reconoce el tipo de formulario.');

        $disk = Storage::disk('local');
        $datosPath = $formulario->datos_path;

        abort_unless($datosPath, 404, 'Los datos del formulario no existen.');

        $datosJson = json_encode(
            $datosValidados['datos'],
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR
        );
        $archivoTemporal = 'formularios/'.$formulario->id.'/datos-'.Str::uuid().'.tmp';

        $errorAlGuardar = null;
        $formularioActualizado = DB::transaction(function () use ($formulario, $datosJson, $archivoTemporal, $datosPath, $disk, &$errorAlGuardar): ?Formulario {
            $registro = Formulario::query()
                ->lockForUpdate()
                ->findOrFail($formulario->id);

            abort_unless($registro->usuario_id === auth()->id(), 404);
            abort_if($registro->ediciones >= 1, 403, 'Este formulario ya fue editado.');

            if (! $disk->put($archivoTemporal, $datosJson)) {
                $errorAlGuardar = 'No se pudo guardar el archivo temporal de datos.';

                return null;
            }

            if (! $disk->move($archivoTemporal, $datosPath)) {
                $errorAlGuardar = 'No se pudieron reemplazar los datos del formulario.';

                return null;
            }

            $registro->update([
                'ediciones' => 1,
                'pdf_path' => null,
            ]);

            return $registro;
        });

        if (! $formularioActualizado) {
            $disk->delete($archivoTemporal);

            Log::error('No se pudo guardar la edición del formulario.', [
                'formulario_id' => $formulario->id,
                'message' => $errorAlGuardar,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'No se pudo guardar la edición del formulario.',
            ], 500);
        }

        $this->programarGeneracionPdf(
            $formularioActualizado,
            $datosValidados['datos'],
            $vistaFormulario
        );

        return response()->json([
            'success' => true,
            'formulario_id' => $formularioActualizado->id,
            'message' => 'Formulario actualizado. Se abrirá la impresión.',
        ]);
    }

    public function registrar(Request $request)
    {
        $datos = $request->validate([
            'nombre_formulario' => 'required|string|max:255',
        ]);

        Formulario::create([
            'nombre_formulario' => $datos['nombre_formulario'],
            'usuario_id' => auth()->id(),
        ]);

        return back()->with('success', 'Formulario registrado correctamente.');
    }

    public function registros(Request $request)
    {
        $query = Formulario::with('usuario');

        if ($request->filled('usuario_id')) {
            $query->where('usuario_id', $request->usuario_id);
        }

        if ($request->filled('nombre_formulario')) {
            $query->where('nombre_formulario', $request->nombre_formulario);
        }

        $orden = $request->input('orden', 'desc');

        if (! in_array($orden, ['asc', 'desc'])) {
            $orden = 'desc';
        }

        $formularios = $query
            ->orderBy('created_at', $orden)
            ->get();

        $usuarios = User::orderBy('name')->get();

        $formulariosDisponibles = [
            'ENTREVISTA ESTUDIANTES',
            'FICHA DE OBSERVACIÓN',
            'FICHA DE DERIVACIÓN',
            'ENTREVISTA REPRESENTANTES',
            'ENTREVISTA DOCENTES',
            'CONSENTIMIENTO INFORMADO',
            'FICHA DE NOTIFICACIÓN DE ALERTA DECE',
            'PLAN DE ATENCIÓN PSICOSOCIAL Y SEGUIMIENTO',
        ];

        return view(
            'formularios.registros',
            compact(
                'formularios',
                'usuarios',
                'formulariosDisponibles'
            )
        );
    }

    public function eliminar(Formulario $formulario)
    {
        $carpeta = 'formularios/'.$formulario->id;

        Storage::disk('local')->deleteDirectory($carpeta);

        $formulario->delete();

        return redirect()
            ->route('formularios.registros')
            ->with(
                'success',
                'Registro y documentos eliminados correctamente.'
            );
    }

    public function guardarDocumento(Request $request)
    {
        $datos = $request->validate([
            'nombre_formulario' => [
                'required',
                'string',
                'max:255',
                Rule::in(array_keys(self::MAPA_FORMULARIOS)),
            ],
            'datos' => ['required', 'array'],
        ]);

        $formulario = Formulario::create([
            'nombre_formulario' => $datos['nombre_formulario'],
            'usuario_id' => auth()->id(),
            'ediciones' => 0,
        ]);

        $disk = Storage::disk('local');
        $carpeta = 'formularios/'.$formulario->id;
        $datosPath = $carpeta.'/datos.json';
        $jsonGuardado = $disk->put(
            $datosPath,
            json_encode($datos['datos'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR)
        );

        if (! $jsonGuardado) {
            $disk->deleteDirectory($carpeta);
            $formulario->delete();

            Log::error('No se pudieron guardar los datos del formulario.', [
                'formulario_id' => $formulario->id,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'No se pudo guardar el formulario.',
            ], 500);
        }

        $formulario->update([
            'datos_path' => $datosPath,
        ]);

        $this->programarGeneracionPdf(
            $formulario,
            $datos['datos'],
            self::MAPA_FORMULARIOS[$datos['nombre_formulario']]
        );

        return response()->json([
            'success' => true,
            'formulario_id' => $formulario->id,
            'message' => 'Formulario guardado. Se abrirá la impresión.',
        ]);
    }

    private function programarGeneracionPdf(Formulario $formulario, array $datos, string $vistaFormulario): void
    {
        $disk = Storage::disk('local');
        $carpeta = 'formularios/'.$formulario->id;
        $htmlPathRelativo = $carpeta.'/formulario.html';
        $pdfPathRelativo = $carpeta.'/documento.pdf';
        $pdfTemporalRelativo = $carpeta.'/documento-'.Str::uuid().'.tmp.pdf';
        $htmlPath = $disk->path($htmlPathRelativo);
        $pdfTemporal = $disk->path($pdfTemporalRelativo);
        $script = base_path('scripts/generar-pdf.cjs');

        defer(function () use ($datos, $vistaFormulario, $disk, $formulario, $htmlPathRelativo, $pdfPathRelativo, $pdfTemporalRelativo, $htmlPath, $pdfTemporal, $script): void {
            try {
                $html = view('formularios.'.$vistaFormulario)->render();

                foreach (['images/logo-apch.png', 'images/ecuador-resuelve.png'] as $imagen) {
                    $rutaImagen = public_path($imagen);

                    if (! is_file($rutaImagen)) {
                        continue;
                    }

                    $html = str_replace(
                        asset($imagen),
                        'data:image/png;base64,'.base64_encode(file_get_contents($rutaImagen)),
                        $html
                    );
                }

                $datosJson = json_encode(
                    $datos,
                    JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_THROW_ON_ERROR
                );
                $scriptDatos = '<script type="application/json" id="datos-formulario-pdf">'.$datosJson.'</script>';
                $posicionCierreBody = strripos($html, '</body>');

                if ($posicionCierreBody === false) {
                    Log::error('No se pudo preparar el formulario para generar el PDF.', [
                        'formulario_id' => $formulario->id,
                    ]);

                    return;
                }

                $html = substr_replace($html, $scriptDatos, $posicionCierreBody, 0);

                if (! $disk->put($htmlPathRelativo, $html)) {
                    Log::error('No se pudo guardar el HTML temporal del formulario.', [
                        'formulario_id' => $formulario->id,
                    ]);

                    return;
                }

                $resultado = Process::path(base_path())
                    ->timeout(60)
                    ->run(['node', $script, $htmlPath, $pdfTemporal]);

                if (! $resultado->successful() || ! $disk->exists($pdfTemporalRelativo) || $disk->size($pdfTemporalRelativo) === 0) {
                    Log::error('Falló la generación del PDF del formulario.', [
                        'formulario_id' => $formulario->id,
                        'exit_code' => $resultado->exitCode(),
                        'error_output' => mb_substr(trim($resultado->errorOutput()), 0, 4000),
                    ]);

                    return;
                }

                if (! $disk->move($pdfTemporalRelativo, $pdfPathRelativo)) {
                    Log::error('No se pudo reemplazar el PDF del formulario.', [
                        'formulario_id' => $formulario->id,
                    ]);

                    return;
                }

                $formulario->update([
                    'pdf_path' => $pdfPathRelativo,
                ]);
            } catch (ProcessTimedOutException|ProcessStartFailedException $exception) {
                Log::error('Falló la generación del PDF del formulario.', [
                    'formulario_id' => $formulario->id,
                    'exception' => $exception::class,
                    'message' => $exception->getMessage(),
                ]);
            } finally {
                $disk->delete($htmlPathRelativo);
                $disk->delete($pdfTemporalRelativo);
            }
        });
    }
}
