<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class SupplierObat extends Model
{
    protected $fillable = [
        'manufaktur',
        'nama_obat',
        'kategori',
        'jumlah',
        'harga_satuan',
        'total',
        'terbayar',
        'status'
    ];
}
