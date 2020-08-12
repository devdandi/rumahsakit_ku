<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Manufaktur extends Model
{
    protected $fillable = [
        'nama_manufaktur',
        'status'
    ];
}
