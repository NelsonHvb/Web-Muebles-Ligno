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
    if (Schema::hasTable('TBBitacoraSolicitudes') && !Schema::hasTable('TBBitacoraMOV')) {
        Schema::rename('TBBitacoraSolicitudes', 'TBBitacoraMOV');
    }
}
public function down(): void
{
    if (Schema::hasTable('TBBitacoraMOV') && !Schema::hasTable('TBBitacoraSolicitudes')) {
        Schema::rename('TBBitacoraMOV', 'TBBitacoraSolicitudes');
    }
}

};
