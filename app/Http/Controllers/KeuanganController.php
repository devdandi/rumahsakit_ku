<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Transaksi;
use App\models\User;
use Cache;
use App\models\Dokter;



class KeuanganController extends Controller
{
    public $laba;
    protected $data;
    private $user;
    protected $transaksi;
    public $dari;
    public $sampai;
    function __construct()
    {
        if(session()->get('level') == "dokter") {
            $this->user = new Dokter;
        }else{
            $this->user = new User;
        }
        $this->transaksi = new Transaksi;
    }
    public function index()
    {
        $get_data = $this->user->where('email', session()->get('email'))->get();
        return view('keuangan',['get_data' => $get_data]);
    }
    public function proses(Request $req)
    {
        if($req->input('dari') == '' OR $req->input('sampai') == '') {
            return false;
        }
        $c = $this->transaksi->whereBetween('created_at', [$req->dari, $req->sampai ]);
        
        if($c)
        {
            $get_data = $this->user->where('email', session()->get('email'))->get();
            $datas = $c->paginate(10);
            return redirect('/dashboard/keuangan/result/'.$req->dari.'/'.$req->sampai);
        }else{
            return false;
        }
        
    }
    public function result($dari, $sampai)
    {
        $this->dari = $dari;
        $this->sampai = $sampai;
        $get_data = $this->user->where('email', session()->get('email'))->get();
        // $datas = $this->transaksi->whereBetween('created_at', [$dari, $sampai ])->paginate(100);
        // $total_laba = $this->transaksi->all();
        // foreach($total_laba as $a)
        // {
        //     $this->data += $a->cash - $a->kembali;
        // }
        // $laba = $this->data;
        
        $datas = $this->transaksi->whereBetween('created_at', [$this->dari, $this->sampai ])->paginate(10);
        return view('result-keuangan', compact('datas', 'get_data'));
    }
}

