<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User as Login;

class User extends Controller
{
    private $email = '';
    public $block_acc = 1;

    public function index()
    {
        return view('login');
    }
    public function login(Request $req)
    {
        global $login_failed;

        if(isset($_POST['submit'])) {
            $user = new Login;
            $check_email = $user->where('email', $req->email)->count();
            if($check_email == 0) {
                return redirect('/')->with(['error' => 'Email tidak terdaftar !']);
            }else{
                $login = $user->where('email', $req->email)->where('password', $req->password);
                if($login->count() > 0) {
                    $c = $login->get();
                    $req->session()->put('id_user', $c[0]->id_user);
                    $req->session()->put('email', $req->email);
                    if(session()->get('id_user') != '' && session()->get('email') != '') 
                    {
                        if($c[0]->status == "aktif") {
                            return redirect('/dashboard');
                        }else if($c[0]->status == "block"){
                            return redirect('/')->with(['error' => 'Akun anda dinonaktifkan, mungkin karena pelanggaran !']);
                        }else{
                            return redirect('/')->with(['error' => 'Akun anda belum diaktifkan, silahkan cek email anda !']);
                            
                        }
                    }else{
                        return redirect('/')->with(['error' => 'Aduh, ada kesalahan !']);
                    }
                }else{
                    return redirect('/')->with(['error' => 'Email atau password salah !']);
                }
            }
        }else{
            return view('login');
        }
    }
}
