<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('TBBitacoraES', function (Blueprint $table) {
            // El nombre exacto de la FK lo tomamos del error: tbbitacoraes_userid_foreign
            $table->dropForeign('tbbitacoraes_userid_foreign');

            $table->foreign('UserId')
                ->references('UserId')
                ->on('TBUsuarios')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('TBBitacoraES', function (Blueprint $table) {
            $table->dropForeign(['UserId']);

            $table->foreign('UserId')
                ->references('UserId')
                ->on('TBUsuarios');
        });
    }
};
