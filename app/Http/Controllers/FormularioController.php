<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    \App\Models\Formulario::create([
        'nombre_formulario' => $datos['nombre_formulario'],
        'usuario_id' => auth()->id(),
    ]);

    return back()->with('success', 'Formulario registrado correctamente.');
}

 public function registros(Request $request)
{
$query = \App\Models\Formulario::with('usuario');


if ($request->filled('usuario_id')) {
    $query->where('usuario_id', $request->usuario_id);
}

if ($request->filled('nombre_formulario')) {
    $query->where('nombre_formulario', $request->nombre_formulario);
}

// Orden de los registros por fecha
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

 public function eliminar(\App\Models\Formulario $formulario)
{
    $formulario->delete();

    return redirect()
        ->route('formularios.registros')
        ->with('success', 'Registro eliminado correctamente.');
}
}
