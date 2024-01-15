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
        Schema::create('struks', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('kodeStruk');
            $table->unsignedTinyInteger('kodePenjualan');
            $table->integer('total')->length(10)->unsigned();
            $table->integer('tunai')->length(10)->unsigned();
            $table->integer('kembali')->length(10)->unsigned();
            $table->tinyInteger('userId')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('struks');
    }
};
