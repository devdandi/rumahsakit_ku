<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Spesialis;
use App\models\LoggingUser;

class Tambah extends Controller
{
    
    protected $pesanController = "Melakukan permintaan untuk mengakses data spesialis";
    public function spesialis()
    {
        $log = new LoggingUser;   
        $user = new User;
        $get_dat = $user->where('email',session()->get('email'))->get();
        $log->create(['email' => session()->get('email'),'pesan' => $this->pesanController."Lihat"]);
        return view('tambah-spesialis',['get_data' => $get_dat]);
    }
    public function tambah_spesialis(Request $req)
    {
        $log = new LoggingUser;
        $spesialis = new Spesialis;
        $pecah_koma = explode("|", $req->spesialis);
        foreach($pecah_koma as $data)
        {
            $a = $spesialis->create([
                'spesialis' => $data
            ]);
        }
        $log->create(['email' => session()->get('email'),'pesan' => $this->pesanController."Tambah"]);

        return redirect()->back()->with(['success' => 'Data berhasil ditambahkan !','data' => $data]);
    }
}
