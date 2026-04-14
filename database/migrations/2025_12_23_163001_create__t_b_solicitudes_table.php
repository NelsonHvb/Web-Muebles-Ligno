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
    Schema::create('TBSolicitudes', function (Blueprint $table) {
        $table->id('SolicitudId');            // esto crea bigint identity para la PK de solicitudes
        $table->unsignedInteger('UserId');    // <-- CAMBIAR a unsignedInteger
        $table->string('Tipo')->nullable();
        $table->text('Mensaje')->nullable();
        $table->enum('Estado', ['P', 'A', 'R'])->default('P');
        $table->text('DescripcionAdmin')->nullable();
        $table->timestamps();

        $table->foreign('UserId')
              ->references('UserId')
              ->on('TBUsuarios');
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_t_b_solicitudes');
    }
};
