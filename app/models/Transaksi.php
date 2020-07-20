<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['id_pasien','data','cash','kembali','total','day'];
}
