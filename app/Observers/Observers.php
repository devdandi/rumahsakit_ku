<?php
namespace App\Observers;

use App\Notifications\HandleNotification;
use App\models\Pasien;
use App\models\Antrian;

class ItemObserver
{
    public function created(Antrian $antrian, Pasien $pasien)
    {
        
    }
}