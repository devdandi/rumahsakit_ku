<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->bigInteger('nik')->unique();
            $table->string('nama', 100);
            $table->mediumText('alamat');
            $table->mediumText('penyakit')->default('Dalam pemeriksaan');
            $table->string('ruangan', 60)->nullable();
            $table->string('status', 20)->default('dirawat');
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
        Schema::dropIfExists('pasiens');
    }
}
