<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->id('id_obat');
            $table->string('nama');
            $table->integer('harga');
            $table->string('satuan');
            $table->integer('jumlah')->default(1);
            $table->string('pemakaian');
            $table->string('kategori');
            $table->string('kadaluarsa');
            $table->text('desk');
            $table->string('jenis');
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
        Schema::dropIfExists('obats');
    }
}
