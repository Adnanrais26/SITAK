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
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->increments('id')->length(10);
            $table->string('pengeluaran', 25);
            $table->unsignedTinyInteger('jenisPengeluaranId');
            $table->string('distributor', 25);
            $table->binary('file');
            $table->integer('jumlah')->length(10)->unsigned();
            $table->text('keterangan');
            $table->date('tanggalPengeluaran');  
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};
