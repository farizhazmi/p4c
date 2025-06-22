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
        Schema::create('hasil_ujian_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hasil_ujian_id');
            $table->text('pertanyaan')->default();
            $table->text('jawaban')->default();
            $table->integer('nilai');
            $table->text('alasan')->default();
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
        Schema::dropIfExists('hasil_ujian_details');
    }
};
