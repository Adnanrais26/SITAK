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
        Schema::create('stok_opnames', function (Blueprint $table) {
            $table->id('id', 5);
            $table->unsignedTinyInteger('userId');
            $table->unsignedTinyInteger('obatId');
            $table->unsignedTinyInteger('unitId');
            $table->unsignedTinyInteger('jumlahTercatata');
            $table->unsignedTinyInteger('jumlahSebenarnya');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_opnames');
    }
};
