<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Pasien as Pasiens;
use App\models\User;
use App\models\Ruangan;
use App\models\Antrian;
use App\Http\Controllers\DayNow;
use App\models\Obat;



class Pasien extends Controller
{
    public function index()
    {
        $user = new User;
        $pasien = new Pasiens;
        $data_pasien = $pasien->where('status','!=','Menunggu Pembelian Resep')->get();
        $get_data = $user->where('email', session()->get('email'))->get();
        return view('daftar-pasien',['get_data' => $get_data,'pasien' => $data_pasien]);
        
    }
    public function indexGrafik()
    {
        $pasien = new Pasiens;
        return $pasien->get();
    }
    public function tambah($id)
    {
        if($id == '') {
            return redirect('/dashboard/antrian')->with(['error' => 'Aduh, ada kesalahan']);
        }
        $antrian = new Antrian;
        $user = new User;
        $ruangan = new Ruangan;
        if($antrian->where('status','diperiksa')->count() > 0) {
            return redirect()->back()->with(['error' => 'Aduh, masih ada yang diperiksa !']);
        }
        $get_ruangan = $ruangan->where('status','kosong')->get();
        $get_data = $user->where('email', session()->get('email'))->get();
        
        return view('pasien-tambah',['get_data' => $get_data,'ruangan' => $get_ruangan,'no_antrian' => $id]);
    }
    public function proses_tambah(Request $req)
    {
        $antrian = new Antrian;
        $day = new DayNow;
        $pasien = new Pasiens;
        $pasien->nik = $req->nik;
        $pasien->nama = $req->nama;
        $pasien->alamat = $req->alamat;
        $pasien->penyakit = "null";
        $pasien->ruangan = "none";
        $pasien->no_antrian = $req->no_antrian;
        $pasien->created_at = now();
        $pasien->golongan_darah = $req->golongan_darah;
        $pasien->jenis_kelamin = $req->jenis_kelamin;
        $pasien->day = $day->index();
        $pasien->status = "Menunggu diperiksa";
        $antrian->where('no_antrian', $req->no_antrian)->update(['status' => 'diperiksa']);
        if($pasien->save())
        {
            return redirect()->back()->with(['success' => 'Pasien Ditambahkan !']);
        }else{
            return redirect()->back()->with(['error' => 'Pasien Gagal Ditambahkan !']);
        }

    }
    public function hapus($id)
    {
        if($id == '')
        {
            return redirect()->back()->with(['error' => 'Aduh, ada kesalahan !']);
        }
        $pasien = new Pasiens;
        $c = $pasien->where('id_pasien', $id)->delete();
        if($c){
            return redirect()->back()->with(['success' => 'Pasien Dihapus !']);
        }else{
            return redirect()->back()->with(['error' => 'Pasien Gagal dihapus !']);
        }
    }
    public function edit($id)
    {
        if($id == '')
        {
            return redirect()->back()->with(['error' => 'Aduh, ada kesalahan !']);
        }
        $user = new User;
        $get_data = $user->where('email',session()->get('email'))->get();
        $pasien = new Pasiens;
        $get_pasien = $pasien->where('id_pasien', $id)->get();
        $obat = new Obat;
        return view('edit-pasien',['get_data'=> $get_data,'data' => $get_pasien,'obat' => $obat->all()]);
    }
    public function proses_edit(Request $req)
    {
        $antrian = new Antrian;
        $pasien = new Pasiens;
        $c = $pasien->where('id_pasien', $req->id)->update([
                'status' => "Menunggu Pembelian Resep",
                'penyakit' => $req->penyakit,
                'resep' => json_encode($req->resep),
                'updated_at' => now(),
            ]);
        if($c)
        {
            $antrian->where('status','diperiksa')->update(['status' => 'selesai']);
            return redirect()->back()->with(['success' => 'Pasien diperbarui !']);
        }else{
            return redirect()->back()->with(['error' => 'Pasien gagal diperbarui !']);
        }
    }
    public function obat()
    {
        $pasien = new Pasiens;
        $get_pasien = $pasien->where('status','Menunggu Pembelian Resep')->get();
        $user = new User;
        $get_data = $user->where('email',session()->get('email'))->get();
        return view('obat-pasien',['get_data' => $get_data,'data_pasien' => $get_pasien]);
    }
    public function proses_pembelian($id)
    {
        $data_obat = array();
        $user = new User;
        $pasien = new Pasiens;
        $obat = new Obat;
        $data = $pasien->where('id_pasien', $id)->get();
        $get_data = $user->where('email',session()->get('email'))->get();
        return view('proses-obat-pasien',['get_data' => $get_data,'data' => $data,'data_obat' => $data_obat]);
    }
}
