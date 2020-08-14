<?php

namespace App\Http\Controllers;

use App\Exports\PurchaseOrder;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class PrintExcel extends Controller
{
    public function pembelian($id, $tanggal)
    {
        return Excel::download(new PurchaseOrder, 'purchase-order'.$tanggal.'.xlsx');
    }
}
