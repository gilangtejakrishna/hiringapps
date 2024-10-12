<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLamaranPekerjaansTable extends Migration
{
    public function up()
    {
        Schema::create('lamaran_pekerjaans', function (Blueprint $table) {
            $table->id('id_lamaran');
            $table->unsignedBigInteger('id_pelamar');
            $table->unsignedBigInteger('id_pekerjaan')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kode_pos', 10)->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('no_tlp', 20)->nullable();
            $table->string('lulusan')->nullable();
            $table->string('berkas')->nullable();
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_pelamar')->references('id_pelamar')->on('pelamars')->onDelete('cascade');
            $table->foreign('id_pekerjaan')->references('id_pekerjaan')->on('pekerjaans')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lamaran_pekerjaans');
    }
}
