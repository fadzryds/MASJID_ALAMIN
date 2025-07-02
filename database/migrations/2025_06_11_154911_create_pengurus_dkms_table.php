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
        Schema::create('pengurus_dkms', function (Blueprint $table) {
            $table->id('id_pengurus')->primary();
            $table->string('nama_lengkap');
            $table->enum('jabatan', ['Ketua_DKM', 'Wakil_Ketua', 'Sekretaris', 'Bendahara']);
            $table->string('no_hp');
            $table->enum('status_aktif', ['Aktif', 'Nonaktif']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengurus_dkms');
    }
};
