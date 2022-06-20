<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('rpp_id')->unsigned()->nullable();
            $table->foreign('rpp_id')->references('id')->on('rpp')->onDelete('cascade')->onUpdate('cascade');
            $table->text('hasil');
            $table->text('nama');
            $table->text('kelas');
            $table->text('uraian_tugas');
            $table->text('kendala');
            $table->text('tindak_lanjut');
            $table->string('foto_kegiatan');
            $table->date('tanggal');
            $table->string('status')->default('belum divalidasi');
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
        Schema::dropIfExists('jurnal');
    }
}
