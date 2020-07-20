<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Transaksi;
use App\models\User;
use App\models\Pasien;
use App\models\Obat;


class Payment extends Controller
{
    public $daynow;
    protected $pasien;
    protected $user;
    protected $transaksi;
    protected $obat;
    private $data = array();

    public function __construct()
    {
        $this->pasien = new Pasien;
        $this->user = new user;
        $this->transaksi = new Transaksi;
        $this->obat = new Obat;

    }
    public function index($id)
    {
 
        $get_data = $this->user->where('email', session()->get('email'))->get();
        $get_pasien = $this->pasien->where('id_pasien', $id)->get();
        $get_transaksi = $this->transaksi->where('id_pasien', $id)->get();
        $update_status_pasien = $this->pasien->where('id_pasien', $id)->update(['status' => 'berhasil']);
        
        $get_data_transaksi = $this->transaksi->where('id_pasien', $id)->get();
        for($i = 0; $i < count($get_data_transaksi); $i++)
        {
            // echo "<pre>";
            $get_j = json_decode($get_data_transaksi[$i]->data);
            foreach($get_j as $j)
            {
                $c = json_decode($j);
                $d = $this->obat->where('nama', $c->nama_obat)->get();
                $stok_sebelumnya = $d[$i]->jumlah - $c->data;
                $this->obat->where('nama', $c->nama_obat)->update(['jumlah' => $stok_sebelumnya]);
            }


        }
        return view('payment',['get_data' => $get_data,'get_pasien' => $get_pasien,'get_transaksi' => $get_transaksi]);
    }
}
