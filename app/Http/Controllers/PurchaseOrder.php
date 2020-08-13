<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Dokter;
use App\models\Obat;
use DB;

use App\models\PurchaseOrder as s;


class PurchaseOrder extends Controller
{
    private $user;
    private $po;
    public $obat;
    function __construct(User $user, Dokter $dokter, s $po, Obat $o)
    {
        
        if(session('level') == "dokter")
        {
            $this->user = $dokter;
        }else{
            $this->user = $user;
        }
        $this->po = $po;
        $this->obat = $o;
    } 
    function getEmail()
    {
        return session('email');
    }  
    function isTrue()
    {
        return session('level');
    }
    // function validateLogin()
    // {
    //     return 
    // }
    public function index()
    {
        // dd($this->user);
        $get_data = $this->user->where('email', session('email'))->get();
        // dd($get_data);
        $po = $this->po->getList();
        return view('daftar-purchase-order', compact('get_data','po'));
    }
    public function ajaxObat()
    {
        $data = $_GET['data'];
        if(isset($data))
        {
            $ex = $this->obat->where('id_obat', $data)->get();
            foreach($ex as $c)
            {
                return $c;
            }
        }
    }
    public function detailPO($id, $nama)
    {
        $dataa = array();
        if($id == null || $id == '')
        {
            return redirect()->back()->with([
                'error' => 'Error'
            ]);
            
        }
        $get_data = $this->user->where('email', session('email'))->get();

        
        // $get_list = $this->po->where('nama_manufaktur', $nama)->paginate(10);
        $get_list = DB::table('po_pending_views')->where('id', $id)->paginate(10);

        // foreach($get_list as $ca) {
        //     $check = $this->obat->where('id_obat', $ca->id_obat)->get();
        //     // echo "<pre>";
        //     foreach($check as $cas)
        //     { 
        //         // dd($ca);
        //         $dataa['harga'][$cas->id_obat] = $cas->harga;
        //         $dataa['nama'][$cas->id_obat] = $cas->nama;
                
        //     }
        // }
        // echo "<pre>";
        // print_r($dataa);
        
        return view('detail-purchase-order', compact('get_data','get_list','nama'));
    }
}
