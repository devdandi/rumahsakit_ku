<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;

class PurchaseOrder extends Model
{
    protected $fillable = [
        'id_manufaktur',
        'nama_obat',
        'satuan',
        'jumlah',
        'harga',
        'make_by',
        'status',
        'send_to'
    ];

    static function getList()
    {
        return DB::table('po_views')->paginate(10);
    }
}
