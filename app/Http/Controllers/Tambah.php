<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Spesialis;
use App\models\LoggingUser;
use App\models\Obat;
use App\models\SupplierObat;



class Tambah extends Controller
{
    protected $data = [];
    protected $obat;   
    protected $user;
    protected $pesanController = "Melakukan permintaan untuk mengakses data spesialis";
    function __construct()
    {
        $this->obat = new Obat;
        $this->user = new User;
    }
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
    public function tambah_obat()
    {
        $get_data = $this->user->where('email', session()->get('email'))->get();
        return view('tambah-obat', compact('get_data'));
    }
    public function proses_tambah_obat(Request $req)
    {
        $sup = new SupplierObat;
        $saves = $sup->create([
            'manufaktur' => $req->manufaktur,
            'nama_obat' => $req->nama_obat,
            'kategori' => $req->kategori,
            'jumlah' => $req->jumlah,
            'harga_satuan' => $req->harga,
            'total' => $req->harga * $req->jumlah,
            'terbayar' => 0,
            'status' => 'Belum lunas',
            'created_at' => now(),
            'updated_at' => now()
        ]); 
        $save = $this->obat->create([
                'manufaktur' => $req->manufaktur,
                'nama' => $req->nama_obat,
                'harga' => $req->harga,
                'satuan' => $req->satuan,
                'jumlah' => $req->jumlah,
                'harga_jual' => $req->harga_jual,
                'pemakaian' => $req->pemakaian,
                'kategori' => $req->kategori,
                'kadaluarsa' => $req->kadaluarsa,
                'desk' => $req->deskripsi,
                'jenis' => $req->jenis
        ]);

        if($save AND $saves)
        {
            return redirect()->back()->with(['success' => 'Obat dan manufaktur berhasil ditambahkan !','link_manufaktur' => 'http://localhost:8000/dashboard/report/manufaktur-obat']);
        }else{
            return redirect()->back()->with(['error' => 'Obat dan manufaktur gagal ditambahkan !']);

        }
    }
}
