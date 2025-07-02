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
        Schema::create('donasis', function (Blueprint $table) {
            $table->bigIncrements('id_donasi'); 
            
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onDelete('cascade');

            $table->unsignedBigInteger('id_jamaah');
            $table->foreign('id_jamaah')->references('id_jamaah')->on('jamaahs')->onDelete('cascade');
        
            $table->unsignedBigInteger('id_pengurus');
            $table->foreign('id_pengurus')->references('id_pengurus')->on('pengurus_dkms')->onDelete('cascade');
        
            $table->decimal('nominal', 15, 2)->nullable();
            $table->decimal('jumlah_barang', 15, 2)->nullable();
            $table->string('deskripsi_barang')->nullable();
            $table->date('tanggal_donasi');
            $table->enum('status_konfirmasi', ['Menunggu', 'Diterima', 'Ditolak'])->default('Menunggu');
            $table->string('keterangan')->nullable();
            $table->string('bukti_transaksi')->nullable();
        
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
        Schema::dropIfExists('donasis');
    }
};
