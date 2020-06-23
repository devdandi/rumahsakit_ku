<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Spesialis;
use App\models\JadwalDokter;
use App\models\Dokter as Dokters;
use App\models\LoggingUser;


class Dokter extends Controller
{
    protected $pesanController = "Melakukan permintaan untuk mengakses data dokter";
    public function index()
    {
        $log = new LoggingUser;
        $dokter = new Dokters;
        $data_dokter = $dokter->paginate(10);
        $user = new User;
        $get_data = $user->where('email',session()->get('email'));
        $log->create(['email' => session()->get('email'),'pesan' => $this->pesanController."Lihat"]);
        return view('daftar-dokter',['get_data' => $get_data->get(),'data_dokter' => $data_dokter]);
    }
    public function tambah()
    {
        $log = new LoggingUser;
        $log->create(['email' => session()->get('email'),'pesan' => $this->pesanController."Tambah"]);
        
        $jadwal = new JadwalDokter;
        $c = $jadwal->get();
        $user = new User;
        $spesialis = new Spesialis;
        $data = $user->where('email', session()->get('email'));
        return view('tambah-dokter', ['get_data' => $data->get(),'spesialis' => $spesialis->distinct()->get('spesialis'),'jadwal' => $c]);
    }
}
