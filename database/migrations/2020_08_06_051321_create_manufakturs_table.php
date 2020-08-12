<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufaktursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufakturs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_manufaktur');
            $table->string('nama_obat');
            $table->string('satuan  ');
            $table->string('kategori');
            $table->bigInteger('jumlah');
            $table->string('status')->default('false');
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
        Schema::dropIfExists('manufakturs');
    }
}
