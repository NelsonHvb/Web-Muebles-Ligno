<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        // 1) Mantener Admin (RolId = 1) como está.

        // 2) Reutilizar el rol 2 (antes "Vendedor") y renombrarlo a "Encargado"
        DB::table('TBRoles')
            ->where('RolId', 2)
            ->update([
                'Nombre' => 'Encargado',
                'EstadoRol' => 'A',
                'updated_at' => $now,
            ]);

        // 3) Crear "Mantenimiento" si no existe (SIN especificar RolId porque es IDENTITY)
        $existeMantenimiento = DB::table('TBRoles')
            ->where('Nombre', 'Mantenimiento')
            ->exists();

        if (! $existeMantenimiento) {
            DB::table('TBRoles')->insert([
                'Nombre' => 'Mantenimiento',
                'EstadoRol' => 'A',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    public function down(): void
    {
        $now = now();

        // Volver RolId=2 a "Vendedor"
        DB::table('TBRoles')
            ->where('RolId', 2)
            ->update([
                'Nombre' => 'Vendedor',
                'EstadoRol' => 'A',
                'updated_at' => $now,
            ]);

        // Borrar el rol "Mantenimiento"
        DB::table('TBRoles')->where('Nombre', 'Mantenimiento')->delete();
    }
};
