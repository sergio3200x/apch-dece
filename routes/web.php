<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.authenticate');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'active', 'role:coordinador'])->name('dashboard');

Route::get('/usuarios', [UserController::class, 'index'])
    ->middleware(['auth', 'active', 'role:coordinador'])
    ->name('usuarios.index');

Route::get('/usuarios/crear', [UserController::class, 'create'])
    ->middleware(['auth', 'active', 'role:coordinador'])
    ->name('usuarios.create');

Route::post('/usuarios', [UserController::class, 'store'])
    ->middleware(['auth', 'active', 'role:coordinador'])
    ->name('usuarios.store');

Route::post('/usuarios/{usuario}/desactivar', [UserController::class, 'desactivar'])
    ->middleware(['auth', 'active', 'role:coordinador'])
    ->name('usuarios.desactivar');

Route::post('/usuarios/{usuario}/reactivar', [UserController::class, 'reactivar'])
    ->middleware(['auth', 'active', 'role:coordinador'])
    ->name('usuarios.reactivar');

Route::get('/formularios', [FormularioController::class, 'index'])
    ->middleware(['auth', 'active'])
    ->name('formularios.index');

Route::get('/formularios/mis-formularios/{nombre}', [FormularioController::class, 'misFormularios'])
    ->middleware(['auth', 'active'])
    ->name('formularios.mis-formularios');

Route::get('/formularios/{tipo}/mis-documentos', [FormularioController::class, 'misDocumentos'])
    ->middleware(['auth', 'active'])
    ->name('formularios.mis-documentos');

Route::get('/formularios/{formulario}/pdf', [FormularioController::class, 'verPdf'])
    ->middleware(['auth', 'active'])
    ->name('formularios.pdf');

Route::get('/formularios/{formulario}/editar', [FormularioController::class, 'editar'])
    ->middleware(['auth', 'active'])
    ->name('formularios.editar');

Route::put('/formularios/{formulario}/editar', [FormularioController::class, 'actualizar'])
    ->middleware(['auth', 'active'])
    ->name('formularios.actualizar');

Route::post('/formularios/registrar', [FormularioController::class, 'registrar'])
    ->middleware(['auth', 'active'])
    ->name('formularios.registrar');

Route::get('/secretario/dashboard', function () {
    return view('secretario.dashboard');
})->middleware(['auth', 'active', 'role:analista'])->name('secretario.dashboard');

Route::get('/formularios/registros', [FormularioController::class, 'registros'])
    ->middleware(['auth', 'active', 'role:coordinador'])
    ->name('formularios.registros');

Route::post('/formularios/guardar-documento', [FormularioController::class, 'guardarDocumento'])
    ->middleware(['auth', 'active'])
    ->name('formularios.guardar-documento');

Route::delete('/formularios/registros/{formulario}', [FormularioController::class, 'eliminar'])
    ->middleware(['auth', 'active', 'role:coordinador'])
    ->name('formularios.eliminar');

Route::get('/formularios/entrevista-estudiantes', function () {
    return view('formularios.entrevista-estudiantes');
})->middleware(['auth', 'active'])->name('formularios.entrevista-estudiantes');

Route::get('/formularios/ficha-observacion', function () {
    return view('formularios.ficha-observacion');
})->middleware(['auth', 'active'])->name('formularios.ficha-observacion');

Route::get('/formularios/ficha-derivacion', function () {
    return view('formularios.ficha-derivacion');
})->middleware(['auth', 'active'])->name('formularios.ficha-derivacion');

Route::get('/formularios/entrevista-representantes', function () {
    return view('formularios.entrevista-representantes');
})->middleware(['auth', 'active'])->name('formularios.entrevista-representantes');

Route::get('/formularios/entrevista-docentes', function () {
    return view('formularios.entrevista-docentes');
})->middleware(['auth', 'active'])->name('formularios.entrevista-docentes');

Route::get('/formularios/consentimiento-informado', function () {
    return view('formularios.consentimiento-informado');
})->middleware(['auth', 'active'])->name('formularios.consentimiento-informado');

Route::get('/formularios/ficha-alerta-dece', function () {
    return view('formularios.ficha-alerta-dece');
})->middleware(['auth', 'active'])->name('formularios.ficha-alerta-dece');

Route::get('/formularios/plan-atencion-psicosocial', function () {
    return view('formularios.plan-atencion-psicosocial');
})->middleware(['auth', 'active'])->name('formularios.plan-atencion-psicosocial');

Route::get('/cambiar-contrasena', [PasswordController::class, 'edit'])
    ->name('password.edit');

Route::put('/cambiar-contrasena', [PasswordController::class, 'update'])
    ->name('password.update');
