<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class TransaksiSementara extends Model
{
    protected $fillable = ['id_pasien','data','nama_obat','harga'];
}
