<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('TBBitacoraSolicitudes', function (Blueprint $table) {
    $table->id('BitacoraSolicitudId');

    $table->unsignedBigInteger('SolicitudId');   // <-- FALTABA
    $table->unsignedBigInteger('UserId');

    $table->string('Accion', 40);
    $table->json('Antes')->nullable();
    $table->json('Despues')->nullable();
    $table->ipAddress('Ip')->nullable();
    $table->timestamps();

});
    }

    public function down(): void
    {
        Schema::dropIfExists('TBBitacoraSolicitudes');
    }
};
