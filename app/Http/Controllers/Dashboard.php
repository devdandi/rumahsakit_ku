<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Pasien;
use App\Http\Controllers\StatusCovid;
use App\Http\Controllers\DayNow;
use App\models\Antrian;
use App\models\Dokter;
use App\models\Transaksi;
use App\models\TransaksiSementara;


use DB;
use App\Charts\UserLineChart;


class Dashboard extends Controller
{   
    public function index()
    {
        $array = array();
        date_default_timezone_set('Asia/Jakarta');
        if(session()->get('id_user') == null AND session()->get('email') == null)
        {
            return redirect('/')->with(['error' => 'Login terlebih dahulu !']);
        }
        if($c = session()->get('login')) {
            echo $c;
        }
        $array = '';
        $user = array();
        $total_uang = 0;
        $jumlah_pasien = 0;
        if(session()->get('level') == "dokter")
        {
            $user['data'] = new Dokter;
        }else{
            $user['data'] = new User;
        }
        $get_data = $user['data']->where('email', session()->get('email'))->get();
        $pasien = new Pasien;
        $covid = new StatusCovid;
        $antrian = new Antrian;
        $get_antrian_before = $antrian->all()->last();
        $jumlah_antrian = $antrian->count();
        $transaksi = new Transaksi;

        // $pasiens_grafik = $pasien->where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        // $chart = Charts::database($pasiens_grafik, 'bar', 'highcharts')
        //  ->title("Jumlah Pasien Bulanan")
        //  ->elementLabel("Total Pasien")
        //  ->dimensions(1000, 500)
        //  ->responsive(false)
        //  ->groupByMonth(date('Y'), true);
        // $date_pasien = Pasien::select(DB::raw("COUNT(*) as count"))
        //             ->whereYear('created_at', date('Y'))
        //             ->groupBy(\DB::raw("Month(created_at)"))
        //             ->pluck('count');

        // $chart = new UserLineChart;

        // $pasienv = Pasien::select(\DB::raw("COUNT(*) as count"))
        //             ->whereYear('created_at', date('Y'))
        //             ->groupBy(\DB::raw("Month(created_at)"))
        //             ->pluck('count');
        // $chart->dataset('New User Register Chart', 'line', $pasienv)->options([
        //         'fill' => 'true',
        //         'borderColor' => '#51C1C0'
        //     ]);
        // $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])->load($chart->api());
            // $ca = $pasien->getByWeek()->getData();
            // dd(\Carbon\Carbon::parse($ca[0]->created_at)->format('l'));
            // $transaksi = new Transaksi;
            // $get_tr = $transaksi->all();
            $tr_sementara = new TransaksiSementara;
            // foreach($get_tr as $cnc)
            // {
            //     $total_uang += $cnc->total - $cnc->kembali;
            // }
        return view('index', [
            'get_data' => $get_data,
            'date_pasien' => $pasien->getByWeek(),
            'date_pasien_harian' => $pasien->getByDay(),
            'total_pasien' => $pasien->count(),
            'antrian' => $get_antrian_before,
            'jumlah_antrian' => $jumlah_antrian,
            // 'total_uang' => $total_uang,
            'total_uang' => 0,
            'total_pasien' => $pasien->count(),
            'pembayaran' => $transaksi->where('status','berhasil')->count(),
            // 'pembayaran' => 0,

            'transaksi_sementara' => $tr_sementara->count()
            // 'chart' => $chart
            // 'covid' => $covid->getApi()
            ]);
    }
    public function test()
    {
        return view('invoice');
    }
    public function logout()
    {
        session()->forget('id_user');
        session()->forget('email');
        session()->forget('level');
        if(session()->get('id_user') == null AND session()->get('email') == null)
        {
            return redirect('/login')->with(['success' => 'Logout Berhasil !']);

        }
    }
}
