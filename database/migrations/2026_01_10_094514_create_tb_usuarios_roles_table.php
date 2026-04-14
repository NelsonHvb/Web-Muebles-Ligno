<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('TBUsuariosRoles', function (Blueprint $table) {
        $table->integer('UserId');      // int, para calzar con TBUsuarios.UserId
        $table->bigInteger('RolId');    // bigint, para calzar con TBRoles.RolId

        $table->primary(['UserId', 'RolId']);

        $table->foreign('UserId')->references('UserId')->on('TBUsuarios');
        $table->foreign('RolId')->references('RolId')->on('TBRoles');
    });


    }

    public function down(): void
    {
        Schema::dropIfExists('TBUsuariosRoles');
    }
};
