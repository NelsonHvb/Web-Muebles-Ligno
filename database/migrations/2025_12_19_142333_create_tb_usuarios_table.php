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
       Schema::create('TBUsuarios', function (Blueprint $table) {
    $table->increments('UserId');                 // int identity PK
    $table->string('Usuario', 150)->unique();
    $table->string('Email', 150)->unique();
    $table->string('PasswordHash', 255);
    $table->char('EstadoUsuario', 1)->default('A');
    $table->dateTime('FechaRegistro')->useCurrent();

    $table->string('remember_token', 100)->nullable();
    $table->timestamp('email_verified_at')->nullable();
});

    }

    /**
     * Reverse the migrations.
     */
        public function down(): void
    {
        Schema::dropIfExists('TBUsuarios');
    }

};
