<?php

namespace App\Console\Commands;

use App\Models\Formulario;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class EliminarRegistrosAntiguos extends Command
{
    protected $signature = 'formularios:eliminar-antiguos';

    protected $description = 'Elimina registros de formularios con más de 2 años de antigüedad';

    public function handle()
    {
        $registros = Formulario::query()
            ->where('created_at', '<', now()->subYears(2))
            ->get();

        $cantidad = 0;

        foreach ($registros as $formulario) {
            DB::transaction(function () use ($formulario): void {
                $formulario->limpiarArchivos();
                $formulario->delete();
            });

            $cantidad++;
        }

        $this->info("Se eliminaron {$cantidad} registros antiguos.");

        return Command::SUCCESS;
    }
}
