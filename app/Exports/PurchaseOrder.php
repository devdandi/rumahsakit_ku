<?php

namespace App\Exports;

use App\models\PurchaseOrder as PCS;
use Maatwebsite\Excel\Concerns\FromCollection;

class PurchaseOrder implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PCS::prints(11, '2020-08-08');
    }
}
