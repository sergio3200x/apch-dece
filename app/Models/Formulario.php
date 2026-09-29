<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Formulario extends Model
{
    /**
     * Campos que pueden ser asignados masivamente.
     */
    protected $fillable = [
        'nombre_formulario',
        'usuario_id',
    ];

    /**
     * Un formulario pertenece a un usuario.
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
