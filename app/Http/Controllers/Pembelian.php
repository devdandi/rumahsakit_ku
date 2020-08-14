<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Obat;
use App\models\User;
use App\models\Dokter;
use App\models\PurchaseOrder;
use DB;


class Pembelian extends Controller
{
    protected $po, $user, $dokter, $obat;
    function __construct(PurchaseOrder $po, User $user, Dokter $dokter, Obat $obat)
    {
        $this->po = $po;
        if(session('level') == "dokter")
        {
            $this->user = $dokter;
        }else{
            $this->user = $user;
        }
        $this->obat = $obat;
    }
    public function approve($id)
    {
        $update = $this->po->where('id_manufaktur', $id)->where('status','Menunggu')->update(['status' => 'Disetujui']);
        if($update)
        {
            return redirect()->back()->with(
                ['success' => 'Disetujui']
            );
        }
    }
    public function index()
    {
        // dd($this->user);
        $get_data = $this->user->where('email', session('email'))->get();
        $get_list = DB::table('po_approve_views')->paginate(10);
        return view('daftar-pembelian', compact('get_data','get_list'));
    }
}
