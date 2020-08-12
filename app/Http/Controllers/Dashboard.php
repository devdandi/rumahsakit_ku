<?php

namespace App\Http\Controllers;


// including a mode that i build on \app\models\here
use DB;
use Illuminate\Http\Request;
use App\models\User;
use App\models\Pasien;
use App\Http\Controllers\StatusCovid;
use App\Http\Controllers\DayNow;
use App\models\Antrian;
use App\models\Dokter;
use App\models\Transaksi;
use App\models\TransaksiSementara;
// end including


class Dashboard extends Controller
{   

    // make property in class Dashboard
    protected $maintenance = false;
    public $antrian;
    public $user;
    protected $pasien;
    protected $transaksi;
    protected $transaksiSementara;
    protected $level;
    // end property


    // this function is first running if the class Dashboard is accessed
    function __construct(Dokter $dokter, User $user, Pasien $pasien, Transaksi $transaksi, TransaksiSementara $trs, Antrian $antrian)
    {
        // dd($this->validateLogin());
        // // if website is maintenance, change the property maintenance to true, and then the website will disable for temporary until maintenance finished
        // if($this->maintenance == true)
        // {
        //     return 'maintenance mode';
        // }
        // // end construct

        // // set date time to indonesia
        date_default_timezone_set('Asia/Jakarta');

        // // initialization property
        // $this->antrian = new Antrian;
        // $this->pasien = new Pasien;
        // $this->transaksi = new Transaksi;
        // $this->transaksiSementara = new TransaksiSementara;
        // $this->level = session()->get('level');
        // // end initialization

        if($this->maintenance == true)
        {
            
        }
        $this->antrian = $antrian;
        $this->transaksi = $transaksi;
        $this->transaksiSementara = $trs;
        $this->pasien = $pasien;
    }
    
    



    // function for validate user if that user login as doctor or user ordinary
    function validateLogin()
    {
        if(session('level') == "dokter")
        {
            return 'dokter';
        }else{
            return 'user';
        }
    }
    // end validate


    // function for get email someone login
    function getEmail()
    {
        return session('email');
    }
    // end email function


    // function for notify logged user
    private function notify()
    {
        if($this->validateLogin())
        {
            echo "<script>alert('Login sebagai ".$this->validateLogin()."')</script>";
            session()->put('notif', 1);
        }
    }

    // index that accessed of routes /domain:8000/dashboard
    public function index()
    {
        // validate user login with ?
        if($this->validateLogin() == "dokter")
        {
            $this->user = new Dokter;
        }else{
            $this->user = new User;
        }
        // endif
        
        // funciton to show notify
        if(session('notif') == 0)
        {
            $this->validateLogin();
        }
        // endnotif

        // get data user that login to dashboard
        $get_data = $this->user->where('email', $this->getEmail())->get();

        // get pasien grafik weekly
        $date_pasien = $this->pasien->getByWeek();
    
        // get the queue of last
        $antrian = $this->antrian->all()->last();

        // sum or plus income all day
        $total_uang = $this->transaksi->sum('total');

        // count total patient
        $total_pasien = $this->pasien->count();

        // get success transaction daily and count the success transaction
        $pembayaran = $this->transaksi->where('status','berhasil')->where('created_at', 'LIKE', '%'.date('Y-m-d').'%')->count();

        // get temporary transaction for patien that not pay to clinic and automatical deleted if transaction has success
        $transaksi_sementara = $this->transaksiSementara->where('created_at', 'LIKE', '%'.date('Y-m-d').'%')->count();

        // get patien based on daily
        $date_pasien_harian = $this->pasien->getByDay();
        
        // show the index.blade.php and sending the logic and data to views index
        return view('index', compact('get_data', 'date_pasien','antrian','pembayaran','transaksi_sementara','total_uang','total_pasien','date_pasien_harian'));
    }
    // end index function

    // function debugging, you can test the code or view in this function
    public function test()
    {
        return 'deleting database...';
    }
    // end function debugging

    // function for logout user
    public function logout()
    {
        session()->forget('id_user'); // destroy id_user
        session()->forget('email'); // destroy email
        session()->forget('level'); // destroy level

        // login if the session has been empty and will redirect to http://domain:8000/login
        if(session()->get('id_user') == null AND session()->get('email') == null AND session()->get('level') == null)
        {
            return redirect('/login')->with(['success' => 'Logout Berhasil !']);
        }
        // end login
    }
    // end funciton logout
}
