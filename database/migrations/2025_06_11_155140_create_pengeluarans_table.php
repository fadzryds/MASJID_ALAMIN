<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->bigIncrements('id_pengeluaran'); 
        
            $table->unsignedBigInteger('id_pengurus');
            $table->foreign('id_pengurus')->references('id_pengurus')->on('pengurus_dkms')->onDelete('cascade');
            
            $table->decimal('nominal', 15, 2);
            $table->string('deskripsi_pengeluaran')->nullable();
            $table->date('tanggal');
            $table->enum('status_persetujuan', ['Sedang Berjalan', 'Selesai', 'Dibatalkan'])->default('Sedang Berjalan');
            $table->string('bukti_pengeluaran')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengeluarans');
    }
};
