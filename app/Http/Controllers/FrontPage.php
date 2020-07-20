<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Janji;
use App\models\Antrian;
use App\models\Spesialis;
use App\Http\Controllers\EmailControl;
use App\models\Dokter;

class FrontPage extends Controller
{
    public function index()
    {
        $email = new EmailControl;
        // $email->_sendEmail('daftar-online', 'adulmicro@gmail.com' , $no_antrians, $ab->name, $req->name, $req->keluhan, $req->message, $req->phone, $req->date);
        
        $spesialis = new Spesialis;
        $get_spesialis = $spesialis->distinct()->get('spesialis');
        return view('front_page.index',['get_spesialis' => $get_spesialis]);
    }
    public function proses_janji(Request $req)
    {
        $antrian = new Antrian;
        $get_antrian = $antrian->all()->last();
        $janji = new Janji;
        $dokter = new Dokter;
        
        $email = new EmailControl;
        $no_antrians = $get_antrian->no_antrian+1;
        $antrian->create(['no_antrian' => $no_antrians,'status'=>'menunggu']);

        // dd($req->input());

        $get_dokter = $dokter->where('spesialis','LIKE','%'.$req->keluhan.'%')->get();
        
        $rand_dokter = rand(0,count($get_dokter) -1 );
        $ab = $get_dokter[$rand_dokter];
        
        $save_janji = $janji->create([
                'nama' => $req->name,
                'email' => $req->email,
                'telepon' => $req->phone,
                'tanggal' => $req->date,
                'keluhan' => $req->keluhan,
                'dokter' => $ab->name,
                'pesan' => $req->message,
            ]);
            if($save_janji)
            {
                $email->_sendEmail('daftar-online', $req->email, $no_antrians, $ab->name, $req->name, $req->keluhan, $req->message, $req->phone, $req->date);
                return redirect()->back()->with(['success' => 'Janji anda sudah dibuat, cek email anda untuk info lebih lanjut. Terimakasih !']);
            }else{
                return redirect()->back()->with(['error' => 'Janji anda gagal dibuat !']);

            }

    }
}
