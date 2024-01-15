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
        Schema::create('obats', function (Blueprint $table) {
            $table->increments('id', 5);
            $table->string('kodeProduk')->length(13)->unsigned();
            $table->string('obat', 25);
            $table->unsignedTinyInteger('kategoriObatId');
            $table->unsignedTinyInteger('jenisObatId');
            $table->unsignedTinyInteger('unitId');
            $table->unsignedTinyInteger('jumlah');
            $table->unsignedTinyInteger('active')->default(1);
            $table->integer('hargaBeli')->length(10)->unsigned();
            $table->integer('hargaJual')->length(10)->unsigned();
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
