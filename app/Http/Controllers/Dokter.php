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
    public function proses_tambah(Request $req)
    {
        $dokter = new Dokters;
        $log = new LoggingUser;
        $dokter->nik = $req->nik;
        $dokter->email = $req->email;
        $dokter->nama = $req->nama;
        $dokter->alamat = $req->alamat;
        $dokter->jenis_kelamin = $req->jenis_kelamin;
        $dokter->spesialis = json_encode($req->spesialis);
        $dokter->jadwal_dokter = json_encode($req->jadwal);
        $dokter->dari_jam = $req->dari_jam;
        $dokter->sampai_jam = $req->sampai_jam;
        $dokter->password = $req->password;
        if($req->sampai_jam <= $req->dari_jam) {
            return redirect()->back()->with(['error' => 'Input data jam dengan benar !']);
        }
        if($dokter->save())
        {
            $log->create(['email' => session()->get('email'),'pesan' => $this->pesanController.' Tambah ']);
            return redirect()->back()->with(['success' => 'Data berhasil ditambahkan !']);
        }else{
            $log->create(['email' => session()->get('email'),'pesan' => $this->pesanController.' Gagal  Tambah ']);
            return redirect()->back()->with(['error' => 'Data gagal ditambahkan !']);
        }

    }
    public function proses_hapus($id)
    {
        if($id == null) 
        {
            return redirect()->back()->with(['error' => 'Aduh, ada kesalahan !']);
        }
        $dokter = new Dokters;
        if($dokter->where('id_dokter', $id)->delete()) {
            return redirect()->back()->with(['success' => 'Berhasil dihapus !']);
        }
    }
    public function edit($id)
    {
        if($id == null)
        {
            return redirect()->back()->with(['error' => 'Aduh, ada kesalahan !']);
        }
        $user = new User;
        $spesialis = new Spesialis;
        $jadwal = new JadwalDokter;
        $log = new LoggingUser;
        $dokter = new Dokters;
        $data = $dokter->where('id_dokter', $id)->get();
        $get_data = $user->where('email', session()->get('email'))->get();
        return view('edit-dokter',['get_data' => $get_data,'data' => $data,'spesialis' => $spesialis->distinct()->get('spesialis'),'jadwal_dokter' => $jadwal->all()]);
    }
    public function proses_edit(Request $req)
    {
        $dokter = new Dokters;
       $c = $dokter->where('id_dokter', $req->id)->update([
                'nik' => $req->nik, 
                'email' => $req->email,
                'nama' => $req->nama,
                'alamat' => $req->alamat,
                'jenis_kelamin' => $req->jenis_kelamin,
                'spesialis' => $req->spesialis,
                'jadwal_dokter' => $req->jadwal_dokter,
                'dari_jam' => $req->dari_jam,
                'sampai_jam' => $req->sampai_jam,
                'password' => $req->password,
                'updated_at' => now()
        ]);
        if($c)
        {
            return redirect()->back()->with(['success' => 'Berhasil diperbarui !']);
        }else{
            return redirect()->back()->with(['error' => 'Gagal diperbarui !']);
        }
    }
} 
