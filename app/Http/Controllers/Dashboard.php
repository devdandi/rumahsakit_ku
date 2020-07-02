<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Pasien;
use App\Http\Controllers\StatusCovid;
use App\Http\Controllers\DayNow;
use App\models\Antrian;


class Dashboard extends Controller
{
    public function index()
    {
        
        $array = array();
        date_default_timezone_set('Asia/Jakarta');
        if(session()->get('id_user') == null AND session()->get('email') == null)
        {
            return redirect('/')->with(['error' => 'Login terlebih dahulu !']);
        }
        if($c = session()->get('login')) {
            echo $c;
        }
        $array = '';
        $user = new User;
        $get_data = $user->where('email', session()->get('email'))->get();
        $pasien = new Pasien;
        $covid = new StatusCovid;
        $antrian = new Antrian;
        $get_antrian_before = $antrian->all()->last();
        $jumlah_antrian = $antrian->count();
        return view('index', [
            'get_data' => $get_data,
            'date_pasien' => $pasien->getByWeek(),
            'date_pasien_harian' => $pasien->getByDay(),
            'total_pasien' => $pasien->count(),
            'antrian' => $get_antrian_before,
            'jumlah_antrian' => $jumlah_antrian,
            'covid' => $covid->getAPi()
            ]);
    }
    public function test()
    {
        return view('form-basic');
    }
    public function logout()
    {
        session()->forget('id_user');
        session()->forget('email');
        if(session()->get('id_user') == null AND session()->get('email') == null)
        {
            return redirect('/')->with(['success' => 'Logout Berhasil !']);

        }
    }
}
