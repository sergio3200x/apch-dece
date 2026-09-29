<?php

namespace App\Console\Commands;

use App\Models\Formulario;
use Illuminate\Console\Command;

class EliminarRegistrosAntiguos extends Command
{
    protected $signature = 'formularios:eliminar-antiguos';

    protected $description = 'Elimina registros de formularios con más de 2 años de antigüedad';

    public function handle()
    {
        $cantidad = Formulario::where(
            'created_at',
            '<',
            now()->subYears(2)
        )->delete();

        $this->info("Se eliminaron {$cantidad} registros antiguos.");

        return Command::SUCCESS;
    }
}
