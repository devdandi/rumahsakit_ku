<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pasien extends Model
{
    protected $fillable = ['nik'];
    
    public function getByWeek()
    {
        $array = array();
        $senin = DB::table('pasiens')->where('day','Senin')->get();
        $selasa = DB::table('pasiens')->where('day','Selasa')->get();
        $rabu = DB::table('pasiens')->where('day','Rabu')->get();
        $kamis = DB::table('pasiens')->where('day','Kamis')->get();
        $jumat = DB::table('pasiens')->where('day','Jumat')->get();
        $sabtu = DB::table('pasiens')->where('day','Sabtu')->get();
        $minggu = DB::table('pasiens')->where('day','Minggu')->get();
        $array['senin'] = $senin;
        $array['selasa'] = $selasa;
        $array['rabu'] = $rabu;
        $array['kamis'] = $kamis;
        $array['jumat'] = $jumat;
        $array['sabtu'] = $sabtu;
        $array['minggu'] = $minggu;
        return $array;

    }
    public function getByDay()
    {
        $dateY = date('Y-m-d');
        // return DB::select(DB::raw("SELECT created_at, COUNT(*) AS jumlah_harian FROM pasiens GROUP BY created_at"));
        return DB::select(DB::raw("SELECT created_at, nama FROM pasiens WHERE created_at LIKE '$dateY%' "));
    }
    public function check()
    {
        return DB::select(DB::raw("SELECT DATE_ADD(CURRENT_DATE(), INTERVAL -1 DAY) AS hari_kemarin"));
    }
    public function getTomorrow()
    {
        
    }
}
