<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Formulario;

class FormularioController extends Controller
{
    public function index()
    {
        return view('formularios.index');
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

        if (!in_array($orden, ['asc', 'desc'])) {
            $orden = 'desc';
        }

        $formularios = $query
            ->orderBy('created_at', $orden)
            ->get();

        $usuarios = \App\Models\User::orderBy('name')->get();

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
        $formulario->delete();

        return redirect()
            ->route('formularios.registros')
            ->with('success', 'Registro eliminado correctamente.');
    }

    public function guardarDocumento(Request $request)
    {
        $datos = $request->validate([
            'nombre_formulario' => 'required|string|max:255',
            'datos' => 'required|array',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Crear registro
        |--------------------------------------------------------------------------
        */

        $formulario = Formulario::create([
            'nombre_formulario' => $datos['nombre_formulario'],
            'usuario_id' => auth()->id(),
            'ediciones' => 0,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Crear carpeta
        |--------------------------------------------------------------------------
        */

        $carpeta = 'formularios/' . $formulario->id;

        /*
        |--------------------------------------------------------------------------
        | Guardar datos JSON
        |--------------------------------------------------------------------------
        */

        $datosPath = $carpeta . '/datos.json';

        Storage::disk('local')->put(
            $datosPath,
            json_encode(
                $datos['datos'],
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
            )
        );

        /*
        |--------------------------------------------------------------------------
        | Generar HTML usando el formulario original
        |--------------------------------------------------------------------------
        */

        $mapaFormularios = [
    'ENTREVISTA ESTUDIANTES' => 'entrevista-estudiantes',
    'FICHA DE OBSERVACIÓN' => 'ficha-observacion',
    'FICHA DE DERIVACIÓN' => 'ficha-derivacion',
    'ENTREVISTA REPRESENTANTES' => 'entrevista-representantes',
    'ENTREVISTA DOCENTES' => 'entrevista-docentes',
    'CONSENTIMIENTO INFORMADO' => 'consentimiento-informado',
    'FICHA DE NOTIFICACIÓN DE ALERTA DECE' => 'ficha-alerta-dece',
    'PLAN DE ATENCIÓN PSICOSOCIAL Y SEGUIMIENTO' => 'plan-atencion-psicosocial',
];

$vistaFormulario = $mapaFormularios[$datos['nombre_formulario']] ?? null;

if (!$vistaFormulario) {
    return response()->json([
        'success' => false,
        'message' => 'No existe una plantilla para el formulario seleccionado.',
    ], 422);
}

$html = view('formularios.' . $vistaFormulario, [
    'datos' => $datos['datos'],
])->render();

        $htmlPath = storage_path(
            'app/private/' . $carpeta . '/formulario.html'
        );

        file_put_contents($htmlPath, $html);

        /*
        |--------------------------------------------------------------------------
        | Ruta final del PDF
        |--------------------------------------------------------------------------
        */

        $pdfPath = storage_path(
            'app/private/' . $carpeta . '/documento.pdf'
        );

        /*
        |--------------------------------------------------------------------------
        | Guardar rutas en la base de datos
        |--------------------------------------------------------------------------
        */

        $formulario->update([
            'datos_path' => $datosPath,
            'pdf_path' => $carpeta . '/documento.pdf',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Ejecutar Puppeteer en segundo plano
        |--------------------------------------------------------------------------
        */

        $script = base_path('scripts/generar-pdf.cjs');

        $comando = sprintf(
            'nohup node %s %s %s > /dev/null 2>&1 &',
            escapeshellarg($script),
            escapeshellarg($htmlPath),
            escapeshellarg($pdfPath)
        );

        exec($comando);

        /*
        |--------------------------------------------------------------------------
        | Respuesta inmediata
        |--------------------------------------------------------------------------
        */

        return response()->json([
            'success' => true,
            'formulario_id' => $formulario->id,
            'message' => 'Formulario guardado correctamente.',
        ]);
    }
}
