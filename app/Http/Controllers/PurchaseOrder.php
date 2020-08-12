<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Dokter;
use App\models\PurchaseOrder as s;


class PurchaseOrder extends Controller
{
    private $user;
    private $po;
    function __construct(User $user, Dokter $dokter, s $po)
    {
        
        if(session('level') == "dokter")
        {
            $this->user = $dokter;
        }else{
            $this->user = $user;
        }
        $this->po = $po;
    } 
    function getEmail()
    {
        return session('email');
    }  
    function isTrue()
    {
        return session('level');
    }
    // function validateLogin()
    // {
    //     return 
    // }
    public function index()
    {
        // dd($this->user);
        $get_data = $this->user->where('email', session('email'))->get();
        // dd($get_data);
        $po = $this->po->getList();
        return view('daftar-purchase-order', compact('get_data','po'));
    }
}
