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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->increments('id')->length(12)->primary();
            $table->string('kodeProduk', 12);
            $table->string('namaPembeli', 25);
            $table->string('noTelp', 12);
            $table->unsignedTinyInteger('jumlah');
            $table->integer('hargaJual')->length(10)->unsigned();
            $table->integer('hargaBeli')->length(10)->unsigned();
            $table->unsignedTinyInteger('statusPembayaran');
            $table->unsignedTinyInteger('unitId');
            $table->unsignedInteger('obatId', 5);
            $table->integer('total')->length(10)->unsigned();
            $table->integer('totalBeli')->length(10)->unsigned();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
