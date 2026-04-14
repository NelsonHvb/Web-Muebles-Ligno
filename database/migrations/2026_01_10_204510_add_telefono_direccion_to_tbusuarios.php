<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('TBUsuarios', function (Blueprint $table) {
            $table->string('TelefonoUsuario', 25)->nullable();
            $table->string('DireccionUsuario', 255)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('TBUsuarios', function (Blueprint $table) {
            $table->dropColumn(['TelefonoUsuario', 'DireccionUsuario']);
        });
    }
};
