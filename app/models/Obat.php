<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $fillable = ['harga_jual','manufaktur','nama','harga','satuan','pemakaian','kategori','kadaluarsa','desk','jenis','jumlah'];
}
