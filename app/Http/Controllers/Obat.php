<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Obat as Obats;
use App\models\User;
use App\models\Dokter;


class Obat extends Controller
{
    protected $user;
    protected $obat;
    protected $email;
    function __construct()
    {
        $this->email = session()->get('email');
        $this->user = new User;
        $this->obat = new Obat;
    }
    public function index()
    {
        $get_data = $this->user->where('email', session()->get('email'))->get();
        $get_obat = $this->obat->paginate(10);
        return view('daftar-obat', compact('get_data','get_obat'));
    }

    function ajaxObat()
    {
        return $_GET['data'];
    }
}
