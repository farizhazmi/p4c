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
        Schema::create('ujians', function (Blueprint $table) {
            $table->id();
            $table->text('nama_ujian')->nullable();
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('materi_id');
            $table->timestamp('waktu_mulai')->nullable();
            $table->timestamp('waktu_selesai')->nullable();
            $table->integer('kkm')->nullable();
            $table->timestamps();

            $table->foreign('materi_id')->references('id')->on('materis')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ujians');
    }
};
