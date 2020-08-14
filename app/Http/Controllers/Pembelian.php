<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Obat;
use App\models\User;
use App\models\Dokter;
use App\models\PurchaseOrder;


class Pembelian extends Controller
{
    protected $po, $user, $dokter, $obat;
    function __construct(PurchaseOrder $po, User $user, Dokter $dokter, Obat $obat)
    {
        $this->po = $po;
        if(session('level') == "user")
        {
            $this->user = $user;
        }else{
            $this->user = $dokter;
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
}
