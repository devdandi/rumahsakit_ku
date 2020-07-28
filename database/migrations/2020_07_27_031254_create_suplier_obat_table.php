<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuplierObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suplier_obat', function (Blueprint $table) {
            $table->id('id_suplier');
            $table->string('manufaktur');
            $table->string('nama_obat');
            $table->string('kategori');
            $table->string('jumlah');
            $table->integer('harga_satuan');
            $table->bigInteger('total');
            $table->bigInteger('terbayar');
            $table->string('status');
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
        Schema::dropIfExists('suplier_obat');
    }
}
