<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('TBBitacoraES', function (Blueprint $table) {
            $table->increments('BitacoraESId'); // PK identity

            $table->unsignedInteger('UserId');
            $table->dateTime('Fecha');
            $table->string('Accion', 20);
            $table->string('Detalle', 255)->nullable();

            // Si quieres FK (recomendado):
            $table->foreign('UserId')->references('UserId')->on('TBUsuarios');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('TBBitacoraES');
    }
};

