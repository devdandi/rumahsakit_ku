<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Dokter;
use App\models\Manufaktur as Manufakturs;

class Manufaktur extends Controller
{
    protected $user;
    protected $manufaktur;
    protected $get_data;
    function __construct(User $user, Dokter $dokter, Manufakturs $manufaktur)
    {

        // $this->get_data = $this->getLogin();
        if(session('level') == "dokter")
        {
            $this->user = $dokter;
        }else{
            $this->user = $user;
        }
        $this->manufaktur =$manufaktur;
    }


    private function getEmail()
    {
        return session('email');
    }

    private function validateLogin()
    {
        return $this->user->where('email', $this->getEmail())->get();
    }

    function index()
    {
        $manufaktur = $this->manufaktur->paginate(10);
        $get_data = $this->validateLogin();
        return view('manufaktur-daftar', compact('get_data','manufaktur'));
    }

    // public function detail($id)
    // {
    //     $get_data = $this->validateLogin();
    //     if($id == null)
    //     {
    //         return redirect()->back()->with(['error' => 'Something went wrong !']);
    //     }
    //     $manufaktur = $this->manufaktur->ManufakturById($id);
    //     return view('daftar-manufakturById',compact('get_data','manufaktur','id'));
    // }

}
