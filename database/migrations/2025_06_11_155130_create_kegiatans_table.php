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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->bigIncrements('id_kegiatan'); 

            $table->unsignedBigInteger('id_pengurus');
            $table->foreign('id_pengurus')->references('id_pengurus')->on('pengurus_dkms')->onDelete('cascade');
            
            $table->string('nama_kegiatan');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->string('lokasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->date('tanggal');
        
            $table->enum('status_kegiatan', ['Aktif', 'Selesai', 'Dibatalkan'])->default('Aktif');
        
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
        Schema::dropIfExists('kegiatans');
    }
};
