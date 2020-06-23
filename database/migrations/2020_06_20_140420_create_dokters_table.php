<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoktersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->id('id_dokter');
            $table->integer('nik')->unique();
            $table->string('email')->unique();
            $table->string('nama');
            $table->text('alamat');
            $table->string('jenis_kelamin');
            $table->text('spesialis');
            $table->text('jadwal_dokter');
            $table->string('dari_jam');
            $table->string('sampai_jam');
            $table->string('password');
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
        Schema::dropIfExists('dokters');
    }
}
