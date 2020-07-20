<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pasien extends Model
{
    protected $fillable = ['nik'];
    
    public function getByWeek()
    {
        // dd(\Carbon\Carbon::parse($ca[0]->created_at)->format('l'));
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
        // return DB::table('pasiens')->get();
        // $c =  DB::select(DB::raw('SELECT created_at, COUNT(created_at) as total FROM pasiens GROUP BY created_at'));
        // return response()->json($c);
        // return DB::table('pasien')->get();

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
    // public function getByMonth()
    // {
    //     $c = DB::select(DB::raw("COUNT(*) as count"))
    //     ->whereYear('created_at', date('Y'))
    //     ->groupBy(\DB::raw("Month(created_at)"))
    //     ->pluck('count');
    //     return response()->json($c);
    // }
}
