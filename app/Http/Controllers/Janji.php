<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Janji as Janjis;
use App\models\Dokter;
use App\Http\Controllers\EmailControl;
use App\models\Antrian;

class Janji extends Controller
{
    protected $janji;
    public function index()
    {
        $janji = new Janjis;
        $user = array();
        if(session()->get('level') == "dokter")
        {
            $user['data'] = new Dokter;
        }else{
            $user['data'] = new User;
        }
        $data_janji = $janji->where('keluhan','LIKE', '%'.$user['data']->spesialis.'%')->paginate(10);
        $get_data = $user['data']->where('email', session()->get('email'))->get();
        return view('daftar-janji',['get_data' => $get_data,'data_janji' => $data_janji]);
    }
    public function edit($id)
    {
        $janji = new Janjis;
        $data = array();

        if($id == '' OR $id == null)
        {
            return redirect()->back()->with(['error' => 'Aduh, ada kesalahan !']);
        }
        if(session()->get('level') == "dokter")
        {
            $data['user'] = new Dokter;
        }else{
            $data['user'] = new User;
        }
        
        $get_janji = $janji->where('id_janji', $id)->get();
        $get_data = $data['user']->where('email', session()->get('email'))->get();
        return view('edit-janji', compact('get_janji','get_data'));
    }
    public function proses_edit(Request $req)
    {
        if($req->date == null)
        {
            
        }
        $janji = new Janjis;
        $dokter = new Dokter;
        $email = new EmailControl;
        $antrian = new Antrian;
        $get_antrian = $antrian->get()->last();
        if($req->input('keputusan') == "Terima") {

        }else if($req->input('keputusan') == "Tolak" AND $req->input('date') == null) {
            $janji->where('id_janji', $req->input('id'))->update(['status' => 'Tolak']);
            $get_data = $janji->where('id_janji', $req->input('id'))->get();
            $email->_SendEmail("tolak-janji-without-date", $get_data[0]->email, null, $get_data[0]->dokter, $get_data[0]->nama, $get_data[0]->keluhan, null, $get_data[0]->telepon, $get_data[0]->tanggal);
            return redirect()->back()->with(['success' => 'Perjanjian ditolak !']);
            
        }else if($req->input('keputusan') == "Tolak" AND $req->input('date') != null) {
            
            $get_data = $janji->where('id_janji', $req->input('id'))->get();
            $update_janji = $janji->where('id_janji', $req->input('id'))->update(['tanggal' => $req->input('date'),'no_antrian' => $get_antrian->no_antrian+1,'status' => 'Penjadwalan Ulang']);
            $update_dokter = $dokter->where('name', $get_data[0]->dokter)->update(['available' => 'no']);
            $email->_SendEmail("tolak-with-date", $get_data[0]->email, $get_antrian->no_antrian+1, $get_data[0]->dokter, $get_data[0]->nama, $get_data[0]->keluhan, null, $get_data[0]->telepon, $req->input('date'));
            $save_antrian = $antrian->create(['no_antrian' => $get_antrian->no_antrian+1]);
            return redirect()->back()->with(['success' => 'Perjanjian dijadwal ulang, dengan ini status anda tidak tersedia !']);
        }else{
            return redirect()->back()->with(['error' => 'Aduh, ada kesalahan !']);
        }
    }
    public function cancel($id)
    {
        $janji = new Janjis;
        $get = $janji->where('email', $id)->update(['status' => 'Tolak']);
        if($get)
        {
            echo "<script>alert('Jadwal berhasil ditolak')</script>";
            echo "<script>window.location.href='/'</script>";
        }
    }
}
