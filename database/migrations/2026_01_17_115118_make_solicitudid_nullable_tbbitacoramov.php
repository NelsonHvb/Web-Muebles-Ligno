<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Cambia INT por BIGINT si tu columna SolicitudId es BIGINT en SQL Server
        DB::statement("ALTER TABLE TBBitacoraMOV ALTER COLUMN SolicitudId INT NULL");
    }

    public function down(): void
    {
        // Si ya existen NULLs, primero tendrías que actualizarlos antes de volverlo NOT NULL
        DB::statement("ALTER TABLE TBBitacoraMOV ALTER COLUMN SolicitudId INT NOT NULL");
    }
};
