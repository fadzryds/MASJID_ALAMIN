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
        Schema::create('userrs', function (Blueprint $table) {
            $table->id('id_user');

            $table->unsignedBigInteger('id_jamaah');
            $table->foreign('id_jamaah')->references('id_jamaah')->on('jamaahs')->onDelete('cascade');
        
            $table->unsignedBigInteger('id_pengurus');
            $table->foreign('id_pengurus')->references('id_pengurus')->on('pengurus_dkms')->onDelete('cascade');
            
            $table->string('username');
            $table->string('password');
            $table->enum('role', ['Pengurus', 'Jamaah']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userrs');
    }
};
