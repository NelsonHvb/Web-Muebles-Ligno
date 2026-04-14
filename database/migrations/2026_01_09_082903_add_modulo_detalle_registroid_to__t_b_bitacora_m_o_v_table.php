<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::table('TBBitacoraMOV', function (Blueprint $table) {
      $table->string('Modulo', 30)->default('SOLICITUDES');
      $table->unsignedBigInteger('RegistroId')->nullable(); // id del rol/usuario/solicitud/etc
      $table->string('Detalle', 255)->nullable(); // “qué pasó” en texto corto
    });
  }

  public function down(): void
  {
    Schema::table('TBBitacoraMOV', function (Blueprint $table) {
      $table->dropColumn(['Modulo', 'RegistroId', 'Detalle']);
    });
  }
};
