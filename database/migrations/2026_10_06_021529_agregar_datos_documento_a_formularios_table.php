<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            $table->string('pdf_path')->nullable()->after('usuario_id');
            $table->string('datos_path')->nullable()->after('pdf_path');
            $table->unsignedTinyInteger('ediciones')->default(0)->after('datos_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            $table->dropColumn([
                'pdf_path',
                'datos_path',
                'ediciones',
            ]);
        });
    }
};
