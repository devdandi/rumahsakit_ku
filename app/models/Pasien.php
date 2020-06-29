<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pasien extends Model
{
    protected $fillable = ['nik'];
    
    public function getByWeek()
    {
        return DB::select(DB::raw("SELECT YEARWEEK(created_at) AS tahun_minggu,COUNT(*) AS jumlah_mingguan
        FROM pasiens
        GROUP BY YEARWEEK(created_at);"));

    }
}
