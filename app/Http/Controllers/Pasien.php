<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Pasien as Pasiens;
use App\models\User;
use App\models\Ruangan;
use App\models\Antrian;
use App\Http\Controllers\DayNow;
use App\models\Obat;
use App\models\Dokter;
use App\models\TransaksiSementara;
use App\models\Transaksi;



class Pasien extends Controller
{
    public function index()
    {
        $user = array();
        if(session()->get('level') == "dokter")
        {
            $user['data'] = new Dokter;
        }else{
            $user['data'] = new User;
        }
        $pasien = new Pasiens;
        $data_pasien = $pasien->where('status','!=','Menunggu Pembelian Resep')->paginate(10);
        $get_data = $user['data']->where('email', session()->get('email'))->get();
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
        $user = array();
        if(session()->get('level') == "dokter")
        {
            $user['data'] = new Dokter;
        }else{
            $user['data'] = new User;
        }
        $ruangan = new Ruangan;
        
        if($antrian->where('status','diperiksa')->count() > 0) {
            return redirect()->back()->with(['error' => 'Aduh, masih ada yang diperiksa !']);
        }
        $get_ruangan = $ruangan->where('status','kosong')->get();
        $get_data = $user['data']->where('email', session()->get('email'))->get();
        
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
        $user = array();
        if(session()->get('level') == "dokter")
        {
            $user['data'] = new Dokter;
        }else{
            $user['data'] = new User;
        }
        $get_data = $user['data']->where('email',session()->get('email'))->get();
        $pasien = new Pasiens;
        $get_pasien = $pasien->where('id_pasien', $id)->get();
        $obat = new Obat;
        return view('edit-pasien',[
            'get_data'=> $get_data,
            'data' => $get_pasien,
            'obat' => $obat->all()
            ]);
    }
    public function proses_edit(Request $req)
    {
        $antrian = new Antrian;
        $pasien = new Pasiens;
        $c = $pasien->where('id_pasien', $req->id)->update([
                'status' => "Menunggu Pembelian Resep",
                'penyakit' => $req->penyakit,
                'resep' => json_encode($req->resep),
                'pesan' => $req->pesan,
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
        $user = array();
        if(session()->get('level') == "dokter")
        {
            $user['data'] = new Dokter;
        }else{
            $user['data'] = new User;
        }
        $get_data = $user['data']->where('email',session()->get('email'))->get();
        return view('obat-pasien',[
            'get_data' => $get_data,
            'data_pasien' => $get_pasien
            ]);
    }
    public function proses_pembelian($id)
    {
        $data_obat = array();
        $user = array();
        if(session()->get('level') == "dokter")
        {
            $user['data'] = new Dokter;
        }else{
            $user['data'] = new User;
        }
        $pasien = new Pasiens;
        $obat = new Obat;
        $data = $pasien->where('id_pasien', $id)->get();
        $get_data = $user['data']->where('email',session()->get('email'))->get();
        
        $json_obat = json_decode($data[0]->resep);

        for($i = 0; $i < count($json_obat); $i++) {
            array_push($data_obat, $obat->where('id_obat', $json_obat[$i])->get());
        }

        return view('proses-obat-pasien',[
            'get_data' => $get_data,
            'data' => $data,
            'data_obat' => $data_obat
        ]);
    }
    public function proses_pembelian_obat(Request $req)
    {
        
        $transaksi = new TransaksiSementara;
        $check = $transaksi->where('id_pasien', $req->id)->count();
        if($check > 0) {
            return redirect('dashboard/pasien/obat/checkout/'.$req->id);
        }
        foreach($req->qty as $data)
        {
            $ex = explode("|", $data);
            for($i = 0; $i < count($ex)-2; $i++)
            {
                $c = $transaksi->create(['id_pasien' => $req->id,'data' => $ex[0],'nama_obat' => $ex[1],'harga' => $ex[2]]);
            }
            
        }
        return redirect('dashboard/pasien/obat/checkout/'.$req->id);
        
        // $transaksi = new TransaksiSementara;
        // for($i = 0; $i < count($req->input('qty')); $i++) {
        //     $c = $transaksi->create(['id_pasien' => $req->id,'data' => $req->qty[$i]]);
        //     if($c)
        //     {
        //         return redirect('dashboard/pasien/obat/checkout/'.$req->id);
        //     }else{
        //         return redirect('dashboard/pasien/obat/'.$req->id)->with(['error','Aduh, ada kesalahan']);
        //     }
        // }
        
    }
    public function checkout_obat($id)
    {

        $user = new User;
        $get_data = $user->where('email',session()->get('email'))->get();
        $pasien = new Pasiens;
        $transaksi = new TransaksiSementara;
        $get_tr = $transaksi->where('id_pasien', $id)->get();
        $get_pasien = $pasien->where('id_pasien', $id)->get();
        return view('checkout-pasien',['get_data' => $get_data,'get_tr' => $get_tr,'get_pasien'=>$get_pasien]);
    }
    public function proses_checkout_obat(Request $req)
    {
        $data = array();
        if($req->id == null OR $req->id == '')
        {
            return redirect()->back()->with(['error'=> 'Aduh, ada kesalahan !']);
        }

        $user = new User;
        $pasien = new Pasiens;
        $transaksi_s = new TransaksiSementara;
        $transaksi = new Transaksi;
        $day = new DayNow;

        $get_pasien = $pasien->where('id_pasien', $req->id)->get();
        $get_transaksi_s = $transaksi_s->where('id_pasien', $req->id)->get();
        for($i = 0; $i < count($get_transaksi_s); $i++)
        {
            array_push($data, json_encode($get_transaksi_s[$i]));
        }
        $save = $transaksi->create([
            'id_pasien' => $req->id,
            'data' => json_encode($data),
            'cash' => $req->uang,
            'kembali' => $req->uang - $req->subtotal,
            'total' => $req->subtotal,
            'day' => $day->index()
        ]);
        if($save)
        {
            return redirect('/dashboard/pasien/payment/success/'.$req->id);
        }else{
            return redirect('/dashboard/pasien/payment/failed/'.$req->id);
        }
    }
}
 