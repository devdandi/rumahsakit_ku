<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJanjisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('janjis', function (Blueprint $table) {
            $table->id('id_janji');
            $table->string('nama',50);
            $table->string('email', 30)->unique();
            $table->string('telepon', 30)->unique();
            $table->string('tanggal');
            $table->string('keluhan');
            $table->string('dokter');
            $table->string('pesan');
            $table->string('status')->default('menunggu');
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
        Schema::dropIfExists('janjis');
    }
}
