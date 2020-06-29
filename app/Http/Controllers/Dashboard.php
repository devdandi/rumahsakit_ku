<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Pasien;


class Dashboard extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        if(session()->get('id_user') == null AND session()->get('email') == null)
        {
            return redirect('/')->with(['error' => 'Login terlebih dahulu !']);
        }
        if($c = session()->get('login')) {
            echo $c;
        }
        $user = new User;
        $get_data = $user->where('email', session()->get('email'))->get();
        $pasien = new Pasien;
        return view('index', ['get_data' => $get_data,'date_pasien' => $pasien->getByWeek()]);
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
