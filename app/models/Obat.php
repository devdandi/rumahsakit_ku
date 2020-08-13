<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Obat extends Model
{
    protected $fillable = ['harga_jual','manufaktur','nama','harga','satuan','pemakaian','kategori','kadaluarsa','desk','jenis','jumlah'];
    
}
