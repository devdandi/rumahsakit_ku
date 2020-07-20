<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DayNow extends Controller
{
    public function index()
    {
        $hari = date('D');
        switch($hari){
            case 'Sun':
                $hari_ini = "Minggu";
            break;
     
            case 'Mon':			
                $hari_ini = "Senin";
            break;
     
            case 'Tue':
                $hari_ini = "Selasa";
            break;
     
            case 'Wed':
                $hari_ini = "Rabu";
            break;
     
            case 'Thu':
                $hari_ini = "Kamis";
            break;
     
            case 'Fri':
                $hari_ini = "Jumat";
            break;
     
            case 'Sat':
                $hari_ini = "Sabtu";
            break;
            
            default:
                $hari_ini = "Tidak di ketahui";		
            break;
        }
     
        return $hari_ini;
    }
    public function test($date, $data=null, $type=null)
    {
        $array1 = explode("-", $date);
        $tahun = $array1[0];
        $bulan = $array1[1];
        $sisa1 = $array1[2];
        $array2 = explode(" ", $sisa1);
        $tanggal = $array2[0];
        $sisa2 = $array2[1];
        $array3 = explode(":", $sisa2);
        $jam = $array3[0];
        $menit = $array3[1];
        $detik = $array3[2];

        if($type == "bulan") {
            switch($bulan)
            {
                case 1:
                    echo "januari";
                break;
                case 2:
                    echo "feb";
                break;
                case 3:
                    echo "mar";
                break;
                case 4:
                    echo "ap";
                break;
                case 5:
                    echo "mei";
                break;
                case 6:
                    echo "jun";
                break;
                case 7:
                    echo "jul";
                break;
                case 8:
                    echo "ag";
                break;
                case 9:
                    echo "sep";
                break;
                case 10:
                    echo "ok";
                break;
                case 11:
                    echo "nov";
                break;
                case 12:
                    echo "des";
                break;
            }
        }
    }
}
