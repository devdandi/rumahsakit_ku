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
        'send_to'
    ];

    static function getList()
    {
        return DB::table('po_pending_views')->paginate(10);
    }
}
