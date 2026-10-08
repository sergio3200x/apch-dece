<?php

use App\Models\Formulario;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Process\PendingProcess;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('username');
        $table->string('password');
        $table->string('role');
        $table->boolean('status')->default(true);
        $table->timestamps();
    });

    Schema::create('formularios', function (Blueprint $table) {
        $table->id();
        $table->string('nombre_formulario');
        $table->unsignedBigInteger('usuario_id');
        $table->string('pdf_path')->nullable();
        $table->string('datos_path')->nullable();
        $table->unsignedTinyInteger('ediciones')->default(0);
        $table->timestamps();
    });
});

it('stores the submitted form data and creates its PDF backup after responding', function () {
    Storage::fake('local');

    $usuario = User::create([
        'name' => 'Coordinador de prueba',
        'username' => 'coordinador-prueba',
        'password' => 'password',
        'role' => 'coordinador',
        'status' => true,
    ]);

    Process::fake(function (PendingProcess $process) {
        $comando = $process->command;

        expect($comando)->toBeArray();

        $html = file_get_contents($comando[2]);

        expect($html)
            ->toContain('datos-formulario-pdf')
            ->toContain('data:image/png;base64,')
            ->toContain('Estudiante Ejemplo');

        file_put_contents($comando[3], "%PDF-1.4\nPDF de prueba\n");

        return Process::result('PDF generado');
    });

    $respuesta = $this->actingAs($usuario)->postJson(route('formularios.guardar-documento'), [
        'nombre_formulario' => 'FICHA DE NOTIFICACIÓN DE ALERTA DECE',
        'datos' => [
            'estudiante_nombre' => [
                'tipo' => 'texto',
                'valor' => 'Estudiante Ejemplo',
            ],
        ],
    ]);

    $respuesta->assertOk()
        ->assertJsonPath('success', true);

    $formulario = Formulario::query()->sole();

    Storage::disk('local')->assertExists([
        $formulario->datos_path,
        $formulario->pdf_path,
    ]);
    Storage::disk('local')->assertMissing('formularios/'.$formulario->id.'/formulario.html');

    expect(json_decode(Storage::disk('local')->get($formulario->datos_path), true))
        ->toBe([
            'estudiante_nombre' => [
                'tipo' => 'texto',
                'valor' => 'Estudiante Ejemplo',
            ],
        ]);

    Process::assertRan(fn (PendingProcess $process): bool => is_array($process->command) && $process->command[0] === 'node'
    );
});

it('returns a successful save and preserves form data when PDF generation fails', function () {
    Storage::fake('local');

    $usuario = User::create([
        'name' => 'Coordinador de prueba',
        'username' => 'coordinador-prueba',
        'password' => 'password',
        'role' => 'coordinador',
        'status' => true,
    ]);

    Process::fake(fn () => Process::result('', 'Falló Puppeteer', 1));

    $respuesta = $this->actingAs($usuario)->postJson(route('formularios.guardar-documento'), [
        'nombre_formulario' => 'FICHA DE NOTIFICACIÓN DE ALERTA DECE',
        'datos' => [
            'estudiante_nombre' => [
                'tipo' => 'texto',
                'valor' => 'Estudiante Ejemplo',
            ],
        ],
    ]);

    $respuesta->assertOk()
        ->assertJsonPath('success', true);

    $formulario = Formulario::query()->sole();

    expect($formulario->datos_path)->toBe('formularios/'.$formulario->id.'/datos.json')
        ->and($formulario->pdf_path)->toBeNull();

    Storage::disk('local')->assertExists($formulario->datos_path);
    Storage::disk('local')->assertMissing([
        'formularios/'.$formulario->id.'/documento.pdf',
        'formularios/'.$formulario->id.'/formulario.html',
    ]);

    expect(json_decode(Storage::disk('local')->get($formulario->datos_path), true))
        ->toBe([
            'estudiante_nombre' => [
                'tipo' => 'texto',
                'valor' => 'Estudiante Ejemplo',
            ],
        ]);
});

it('keeps the saved form when the renderer exits without creating a PDF', function () {
    Storage::fake('local');

    $usuario = User::create([
        'name' => 'Coordinador de prueba',
        'username' => 'coordinador-prueba',
        'password' => 'password',
        'role' => 'coordinador',
        'status' => true,
    ]);

    Process::fake(fn () => Process::result());

    $respuesta = $this->actingAs($usuario)->postJson(route('formularios.guardar-documento'), [
        'nombre_formulario' => 'FICHA DE NOTIFICACIÓN DE ALERTA DECE',
        'datos' => [
            'estudiante_nombre' => [
                'tipo' => 'texto',
                'valor' => 'Estudiante Ejemplo',
            ],
        ],
    ]);

    $respuesta->assertOk()
        ->assertJsonPath('success', true);

    $formulario = Formulario::query()->sole();

    Storage::disk('local')->assertExists($formulario->datos_path);
    Storage::disk('local')->assertMissing('formularios/'.$formulario->id.'/documento.pdf');
});

it('lists only the current user forms matching the selected form type', function () {
    $usuario = User::create([
        'name' => 'Analista de prueba',
        'username' => 'analista-prueba',
        'password' => 'password',
        'role' => 'analista',
        'status' => true,
    ]);
    $otroUsuario = User::create([
        'name' => 'Otro analista',
        'username' => 'otro-analista',
        'password' => 'password',
        'role' => 'analista',
        'status' => true,
    ]);

    $formularioPropio = Formulario::create([
        'nombre_formulario' => 'FICHA DE NOTIFICACIÓN DE ALERTA DECE',
        'usuario_id' => $usuario->id,
        'ediciones' => 0,
    ]);
    $formularioDeOtroUsuario = Formulario::create([
        'nombre_formulario' => 'FICHA DE NOTIFICACIÓN DE ALERTA DECE',
        'usuario_id' => $otroUsuario->id,
        'ediciones' => 0,
    ]);
    $otroTipoPropio = Formulario::create([
        'nombre_formulario' => 'FICHA DE OBSERVACIÓN',
        'usuario_id' => $usuario->id,
        'ediciones' => 0,
    ]);

    $respuesta = $this->actingAs($usuario)->get(route('formularios.mis-documentos', [
        'tipo' => 'ficha-alerta-dece',
    ]));

    $respuesta->assertOk()
        ->assertSee('Mis Formularios: FICHA DE NOTIFICACIÓN DE ALERTA DECE')
        ->assertDontSee('Logo APCH')
        ->assertDontSee('APCH · DECE')
        ->assertSee('FICHA DE NOTIFICACIÓN DE ALERTA DECE')
        ->assertSee('class="record-id">#'.$formularioPropio->id.'</td>', false)
        ->assertDontSee('class="record-id">#'.$formularioDeOtroUsuario->id.'</td>', false)
        ->assertDontSee('class="record-id">#'.$otroTipoPropio->id.'</td>', false);
});

it('returns not found for an unsupported form type in the personal list', function () {
    $usuario = User::create([
        'name' => 'Analista de prueba',
        'username' => 'analista-prueba',
        'password' => 'password',
        'role' => 'analista',
        'status' => true,
    ]);

    $this->actingAs($usuario)
        ->get(route('formularios.mis-documentos', ['tipo' => 'tipo-desconocido']))
        ->assertNotFound();
});

it('opens a personal list for every supported form type', function (string $tipo, string $nombreFormulario) {
    $usuario = User::create([
        'name' => 'Analista de prueba',
        'username' => 'analista-prueba',
        'password' => 'password',
        'role' => 'analista',
        'status' => true,
    ]);

    $this->actingAs($usuario)
        ->get(route('formularios.mis-documentos', ['tipo' => $tipo]))
        ->assertOk()
        ->assertSee($nombreFormulario);
})->with([
    'entrevista estudiantes' => ['entrevista-estudiantes', 'ENTREVISTA ESTUDIANTES'],
    'ficha de observación' => ['ficha-observacion', 'FICHA DE OBSERVACIÓN'],
    'ficha de derivación' => ['ficha-derivacion', 'FICHA DE DERIVACIÓN'],
    'entrevista representantes' => ['entrevista-representantes', 'ENTREVISTA REPRESENTANTES'],
    'entrevista docentes' => ['entrevista-docentes', 'ENTREVISTA DOCENTES'],
    'consentimiento informado' => ['consentimiento-informado', 'CONSENTIMIENTO INFORMADO'],
    'ficha alerta dece' => ['ficha-alerta-dece', 'FICHA DE NOTIFICACIÓN DE ALERTA DECE'],
    'plan de atención psicosocial' => ['plan-atencion-psicosocial', 'PLAN DE ATENCIÓN PSICOSOCIAL Y SEGUIMIENTO'],
]);

it('styles only the toolbar and removes its back button on all form templates', function (string $rutaFormulario) {
    $usuario = User::create([
        'name' => 'Analista de prueba',
        'username' => 'analista-prueba',
        'password' => 'password',
        'role' => 'analista',
        'status' => true,
    ]);

    $contenido = $this->actingAs($usuario)
        ->get(route($rutaFormulario))
        ->assertOk()
        ->getContent();

    expect($contenido)
        ->toContain('.toolbar::after')
        ->toContain('border-left: 5px solid #a31616')
        ->toContain('border-radius: 16px')
        ->toContain('🗑 Borrar todo')
        ->toContain('🖨 Guardar e imprimir')
        ->toContain('📂 Mis formularios')
        ->not->toContain('↩ Volver');
})->with([
    'entrevista estudiantes' => ['formularios.entrevista-estudiantes'],
    'ficha observacion' => ['formularios.ficha-observacion'],
    'ficha derivacion' => ['formularios.ficha-derivacion'],
    'entrevista representantes' => ['formularios.entrevista-representantes'],
    'entrevista docentes' => ['formularios.entrevista-docentes'],
    'consentimiento informado' => ['formularios.consentimiento-informado'],
    'alerta dece' => ['formularios.ficha-alerta-dece'],
    'plan de atencion' => ['formularios.plan-atencion-psicosocial'],
]);

it('requires authentication to view personal form lists', function () {
    $this->get(route('formularios.mis-documentos', ['tipo' => 'ficha-alerta-dece']))
        ->assertRedirect(route('login'));
});

it('opens the original template with saved data for editing each supported form', function (string $nombreFormulario, string $vista) {
    Storage::fake('local');

    $usuario = User::create([
        'name' => 'Analista de prueba',
        'username' => 'analista-prueba',
        'password' => 'password',
        'role' => 'analista',
        'status' => true,
    ]);

    $formulario = Formulario::create([
        'nombre_formulario' => $nombreFormulario,
        'usuario_id' => $usuario->id,
        'datos_path' => 'formularios/1/datos.json',
        'ediciones' => 0,
    ]);

    Storage::disk('local')->put($formulario->datos_path, json_encode([
        'campo_prueba' => 'Dato original',
    ]));

    $this->actingAs($usuario)
        ->get(route('formularios.editar', $formulario))
        ->assertOk()
        ->assertViewIs('formularios.'.$vista)
        ->assertSee('Dato original');
})->with([
    'entrevista estudiantes' => ['ENTREVISTA ESTUDIANTES', 'entrevista-estudiantes'],
    'ficha observacion' => ['FICHA DE OBSERVACIÓN', 'ficha-observacion'],
    'ficha derivacion' => ['FICHA DE DERIVACIÓN', 'ficha-derivacion'],
    'entrevista representantes' => ['ENTREVISTA REPRESENTANTES', 'entrevista-representantes'],
    'entrevista docentes' => ['ENTREVISTA DOCENTES', 'entrevista-docentes'],
    'consentimiento informado' => ['CONSENTIMIENTO INFORMADO', 'consentimiento-informado'],
    'alerta dece' => ['FICHA DE NOTIFICACIÓN DE ALERTA DECE', 'ficha-alerta-dece'],
    'plan de atencion' => ['PLAN DE ATENCIÓN PSICOSOCIAL Y SEGUIMIENTO', 'plan-atencion-psicosocial'],
]);

it('allows one owner edit, updates the original JSON and regenerates its PDF', function () {
    Storage::fake('local');

    $usuario = User::create([
        'name' => 'Analista de prueba',
        'username' => 'analista-prueba',
        'password' => 'password',
        'role' => 'analista',
        'status' => true,
    ]);

    $formulario = Formulario::create([
        'nombre_formulario' => 'ENTREVISTA DOCENTES',
        'usuario_id' => $usuario->id,
        'datos_path' => 'formularios/1/datos.json',
        'pdf_path' => 'formularios/1/documento.pdf',
        'ediciones' => 0,
    ]);

    Storage::disk('local')->put($formulario->datos_path, json_encode([
        ['index' => 0, 'value' => 'Dato original'],
    ]));
    Storage::disk('local')->put($formulario->pdf_path, "%PDF-1.4\nPDF anterior\n");

    Process::fake(function (PendingProcess $process) {
        $comando = $process->command;
        $html = file_get_contents($comando[2]);

        expect($html)
            ->toContain('datos-formulario-pdf')
            ->toContain('Dato actualizado');

        file_put_contents($comando[3], "%PDF-1.4\nPDF actualizado\n");

        return Process::result('PDF actualizado');
    });

    $rutaActualizacion = route('formularios.actualizar', $formulario);
    $respuesta = $this->actingAs($usuario)->putJson($rutaActualizacion, [
        'datos' => [
            ['index' => 0, 'value' => 'Dato actualizado'],
        ],
    ]);

    $respuesta->assertOk()
        ->assertJsonPath('success', true)
        ->assertJsonPath('formulario_id', $formulario->id);

    $formulario->refresh();

    expect($formulario->ediciones)->toBe(1)
        ->and($formulario->pdf_path)->toBe('formularios/1/documento.pdf')
        ->and(json_decode(Storage::disk('local')->get($formulario->datos_path), true))
        ->toBe([
            ['index' => 0, 'value' => 'Dato actualizado'],
        ]);

    Storage::disk('local')->assertExists($formulario->pdf_path);
    expect(Storage::disk('local')->get($formulario->pdf_path))
        ->toContain('PDF actualizado');

    $this->actingAs($usuario)->putJson($rutaActualizacion, [
        'datos' => [
            ['index' => 0, 'value' => 'Intento de segunda edición'],
        ],
    ])->assertForbidden();

    expect(json_decode(Storage::disk('local')->get($formulario->datos_path), true))
        ->toBe([
            ['index' => 0, 'value' => 'Dato actualizado'],
        ]);
});

it('does not allow another user to view or edit a saved form', function () {
    Storage::fake('local');

    $propietario = User::create([
        'name' => 'Propietario',
        'username' => 'propietario',
        'password' => 'password',
        'role' => 'analista',
        'status' => true,
    ]);
    $otroUsuario = User::create([
        'name' => 'Otro usuario',
        'username' => 'otro-usuario',
        'password' => 'password',
        'role' => 'analista',
        'status' => true,
    ]);

    $formulario = Formulario::create([
        'nombre_formulario' => 'FICHA DE NOTIFICACIÓN DE ALERTA DECE',
        'usuario_id' => $propietario->id,
        'datos_path' => 'formularios/1/datos.json',
        'pdf_path' => 'formularios/1/documento.pdf',
        'ediciones' => 0,
    ]);

    Storage::disk('local')->put($formulario->datos_path, json_encode(['dato' => 'original']));
    Storage::disk('local')->put($formulario->pdf_path, "%PDF-1.4\nPDF\n");

    $this->actingAs($otroUsuario)
        ->get(route('formularios.pdf', $formulario))
        ->assertNotFound();

    $this->actingAs($otroUsuario)
        ->get(route('formularios.editar', $formulario))
        ->assertNotFound();

    $this->actingAs($otroUsuario)
        ->putJson(route('formularios.actualizar', $formulario), [
            'datos' => ['dato' => 'alterado'],
        ])
        ->assertNotFound();
});

it('serves the owner PDF inline and returns not found while it is unavailable', function () {
    Storage::fake('local');

    $usuario = User::create([
        'name' => 'Analista de prueba',
        'username' => 'analista-prueba',
        'password' => 'password',
        'role' => 'analista',
        'status' => true,
    ]);

    $formulario = Formulario::create([
        'nombre_formulario' => 'FICHA DE OBSERVACIÓN',
        'usuario_id' => $usuario->id,
        'pdf_path' => 'formularios/1/documento.pdf',
        'ediciones' => 0,
    ]);
    Storage::disk('local')->put($formulario->pdf_path, "%PDF-1.4\nPDF\n");

    $this->actingAs($usuario)
        ->get(route('formularios.pdf', $formulario))
        ->assertOk()
        ->assertHeader('content-type', 'application/pdf')
        ->assertHeader('content-disposition', 'inline; filename="formulario-'.$formulario->id.'.pdf"');

    $formulario->update(['pdf_path' => null]);

    $this->actingAs($usuario)
        ->get(route('formularios.pdf', $formulario))
        ->assertNotFound();
});

it('shows PDF and edit actions only when each record is eligible', function () {
    $usuario = User::create([
        'name' => 'Analista de prueba',
        'username' => 'analista-prueba',
        'password' => 'password',
        'role' => 'analista',
        'status' => true,
    ]);

    $disponible = Formulario::create([
        'nombre_formulario' => 'FICHA DE NOTIFICACIÓN DE ALERTA DECE',
        'usuario_id' => $usuario->id,
        'pdf_path' => 'formularios/1/documento.pdf',
        'ediciones' => 0,
    ]);
    $editado = Formulario::create([
        'nombre_formulario' => 'FICHA DE NOTIFICACIÓN DE ALERTA DECE',
        'usuario_id' => $usuario->id,
        'ediciones' => 1,
    ]);

    $this->actingAs($usuario)
        ->get(route('formularios.mis-documentos', ['tipo' => 'ficha-alerta-dece']))
        ->assertOk()
        ->assertSee(route('formularios.pdf', $disponible))
        ->assertSee(route('formularios.editar', $disponible))
        ->assertSee('<th scope="col">ID</th>', false)
        ->assertSee('<th scope="col">Nombre formulario</th>', false)
        ->assertSee('<th scope="col">Fecha</th>', false)
        ->assertSee('<th scope="col">Hora</th>', false)
        ->assertSee('<th scope="col">Estado</th>', false)
        ->assertSee('<th scope="col">Acciones</th>', false)
        ->assertSee('Guardado')
        ->assertSee('Editado')
        ->assertSee('PDF pendiente')
        ->assertSee('Edición utilizada')
        ->assertSee('#'.$disponible->id)
        ->assertSee('#'.$editado->id);
});

it('places the requested representative interview section at the end of the first page', function () {
    $usuario = User::create([
        'name' => 'Analista de prueba',
        'username' => 'analista-prueba',
        'password' => 'password',
        'role' => 'analista',
        'status' => true,
    ]);

    $contenido = $this->actingAs($usuario)
        ->get(route('formularios.entrevista-representantes'))
        ->assertOk()
        ->getContent();

    $inicioSegundaPagina = strpos($contenido, '<!-- ==================== PÁGINA 2 ==================== -->');

    expect($inicioSegundaPagina)->not->toBeFalse();

    $contenidoPrimeraPagina = substr($contenido, 0, $inicioSegundaPagina);

    expect($contenidoPrimeraPagina)
        ->toContain('¿Qué reglas usan en casa para mantener la disciplina?')
        ->toContain('OTROS ASPECTOS')
        ->toContain('¿Cuáles son los pasatiempos o actividades que más le gusta hacer a su representado/a en el tiempo libre?')
        ->toContain('¿Qué aspectos usted destacaría de su representado/a? (habilidades, valores, saberes, etc.)');
});
