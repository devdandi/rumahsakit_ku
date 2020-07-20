<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Janji extends Model
{
    protected $fillable = ['nama','email','telepon','tanggal','keluhan','dokter','pesan','no_antrian'];
}
