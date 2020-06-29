<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Pasien as Pasiens;
use App\models\User;
use App\models\Ruangan;



class Pasien extends Controller
{
    public function index()
    {
        $user = new User;
        $pasien = new Pasiens;
        $data_pasien = $pasien->all();
        $get_data = $user->where('email', session()->get('email'))->get();
        return view('daftar-pasien',['get_data' => $get_data,'pasien' => $data_pasien]);
        
    }
    public function indexGrafik()
    {
        $pasien = new Pasiens;
        return $pasien->get();
    }
    public function tambah()
    {
        $user = new User;
        $ruangan = new Ruangan;
        $get_ruangan = $ruangan->where('status','kosong')->get();
        $get_data = $user->where('email', session()->get('email'))->get();
        return view('pasien-tambah',['get_data' => $get_data,'ruangan' => $get_ruangan]);
    }
    public function proses_tambah(Request $req)
    {
        $pasien = new Pasiens;
        $pasien->nik = $req->nik;
        $pasien->nama = $req->nama;
        $pasien->alamat = $req->alamat;
        $pasien->penyakit = json_encode($req->penyakit);
        $pasien->ruangan = $req->ruangan;
        $pasien->created_at = now();
        $pasien->golongan_darah = $req->golongan_darah;
        $pasien->jenis_kelamin = $req->jenis_kelamin;
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
        return view('edit-pasien',['get_data'=> $get_data,'data' => $get_pasien]);
    }
    public function proses_edit(Request $req)
    {
        $pasien = new Pasiens;
        $c = $pasien->where('id_pasien', $req->id)->update([
                'nik' => $req->nik,
                'nama' => $req->nama,
                'jenis_kelamin' => $req->jenis_kelamin,
                'status' => $req->status,
                'alamat' => $req->alamat,
                'penyakit' => $req->penyakit,
                'updated_at' => now(),
                'golongan_darah' => $req->golongan_darah
            ]);
        if($c)
        {
            return redirect()->back()->with(['success' => 'Pasien diperbarui !']);
        }else{
            return redirect()->back()->with(['error' => 'Pasien gagal diperbarui !']);
        }
    }
}
