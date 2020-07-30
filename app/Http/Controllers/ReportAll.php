<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Dokter;
use App\models\Obat;
use App\models\Pasien;
use App\models\SupplierObat;
use DB;



class ReportAll extends Controller
{
    protected $user;
    protected $data;
    protected $obat;
    protected $data_obat = array();
    
    public function __construct()
    {
        if(session()->get('level') == "dokter")
        {
            $this->user = new Dokter;
        }else{
            $this->user = new User;
        }
        $this->data = new SupplierObat;
        $this->obat = new Obat;
    }

    public function index()
    {
        // SELECT s.manufaktur, SUM(s.jumlah) AS semua_stok, SUM(s.total) AS harus_dibayar, s.terbayar, s.created_at AS tanggal, s.status, updated_at AS tanggal_bayar FROM supplier_obats s GROUP BY manufaktur ASC
    }
    public function manufaktur_obat($from = null, $to = null)
    {
        if($from == null || $to == null)
        {
            $get_data = $this->user->where('email', session()->get('email'))->get();
            // $laporan_obat = $this->data->paginate(10);
            // $laporan_obat = $this->data->select('manufaktur AS')->groupBy('manufaktur')->get();
            $laporan_obat = DB::table('supplier_obats')
            ->select('manufaktur', DB::raw("SUM(jumlah) as semua_stok"),
            DB::raw("SUM(total) as harus_dibayar"))
            ->groupBy('manufaktur')->paginate(10);
            
            // dd($laporan_obat);
            // $laporan_obat = DB::table('supplier_obats')->select(DB::raw('SELECT manufaktur,status, created_at AS tanggal, SUM(total) AS total_bayar, terbayar'));
            // $laporan_obat = DB::table('supplier_obats')->where('manufaktur', 'PT Obat Indonesia')->sum('total');
            // dd($laporan_obat);
            // dd($laporan_obat);
            // $laporan_obat = DB::select(DB::raw("SELECT * FROM supplier_obats GROUP BY manufaktur'"));
            return view('daftar-laporan-supplier', compact('laporan_obat', 'get_data'));
        }
    }
    public function filter_manufaktur_obat(Request $req)
    {
        $data = "Filter dari tanggal " . $req->from. " Sampai " . $req->to;
        $get_data = $this->user->where('email', session()->get('email'))->get();
        $laporan_obat = $this->data->whereBetween('created_at', [$req->fom, $req->to ])->paginate(10);
        return view('daftar-laporan-supplier', compact('laporan_obat', 'get_data', 'data'));
    }
    public function manufaktur_obat_detail($id)
    {
         $id = str_replace('-', ' ', $id);
         $names_o = array();
         $this->data_obat['supplier'] = $id;
         $get_data = $this->user->where('email', session()->get('email'))->get();
         $get_sup = $this->data->where('manufaktur', $id)->get();
         $get_obat = $this->obat->where('manufaktur', $id)->get();
         for($i = 0; $i < count($get_obat); $i++) {
            $this->data_obat['jumlah_supply'] = count($get_obat);
            array_push($names_o, $get_obat[$i]->nama);
            $this->data_obat['nama_obat'] = $names_o;
            $cls = $get_obat[$i]->jumlah;

            // menghitung 

            $check = $get_sup[$i]->jumlah - $get_obat[$i]->jumlah;
            // $check1 = $get_sup[]
            $this->data_obat['detail_stok'][$names_o[$i]] = $check;
            $this->data_obat['stok_asli'][$names_o[$i]] = $cls;
            $this->data_obat['status'][$names_o[$i]] = $get_sup[$i]->status;
            $this->data_obat['stok_awal'][$names_o[$i]] = $get_sup[$i]->jumlah;
            
            
            

            // $this->data_obat['detail'][$names_o[$i]] = $check; 
            // array_push($this->data, $check);
            // $this->data_obat['detail']['nama_obat'][$nam]
         }
        //  dd($this->data_obat);
        // echo "<pre>";
        // print_r($this->data_obat);
        $data = $this->data_obat;
        $get_obata = $this->obat->where('manufaktur', $id)->paginate(10);
        return view('detail-manufaktur-obat', compact('get_data','data','get_obata'));
    }
    public function pasien()
    {
        $get_data = $this->user->where('email', session()->get('email'))->get();
        $get_pasien = DB::table('laporan_pasien_view')->paginate(10);
        return view('detail-laporan-pasien', compact('get_data','get_pasien'));
    }
    public function filter_pasien(Request $req)
    {

    }
}
