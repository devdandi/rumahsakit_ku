<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;

class PurchaseOrder extends Model
{
    protected $fillable = [
        'id_manufaktur',
        'id_obat',
        'satuan',
        'jumlah',
        'harga',
        'make_by',
        'status',
        'send_to',
        'nama_obat'
    ];

    static function getList()
    {
        return DB::table('po_pending_views')->paginate(10);
    }
    public static function prints($id, $tanggal)
    {
        return DB::table('purchase-order')->where('id', $id)->where('created_at','LIKE','%'.$tanggal.'%')->get();
    }
}
