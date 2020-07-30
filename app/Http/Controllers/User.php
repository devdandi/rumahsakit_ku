<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User as Login;
use App\Http\Controllers\EmailControl;
use App\models\Dokter;

class User extends Controller
{
    public $email;
    public $level_login = '';

    public function index()
    {
        if(session()->get('email') == null OR session()->get('email') == '') {
            return view('login');
        }else{
            return redirect('/dashboard')->with(['login' => "<script>alert('Kamu sudah login')</script>"]);
        }
        
    }
    public function login(Request $req)
    {
        if(isset($_POST['submit'])) {
            $user = new Login;
            $check_email = $user->where('email', $req->email)->count();
            if($check_email == 0) {
                return redirect('/login')->with(['error' => 'Email tidak terdaftar !']);
            }else{
                $login = $user->where('email', $req->email)->where('password', $req->password);
                if($login->count() > 0) {
                    $c = $login->get();
                    $req->session()->put('id_user', $c[0]->id_user);
                    $req->session()->put('email', $req->email);
                    $req->session()->put('level', $c[0]->level);

                    if(session()->get('id_user') != '' && session()->get('email') != '') 
                    {
                        if($c[0]->status == "aktif") {
                            $this->email = $req->email;
                            return redirect('/dashboard');
                        }else if($c[0]->status == "block"){
                            return redirect('/login')->with(['error' => 'Akun anda dinonaktifkan, mungkin karena pelanggaran !']);
                        }else{
                            return redirect('/login')->with(['error' => 'Akun anda belum diaktifkan, silahkan cek email anda !']);
                        }
                    }else{
                        return redirect('/login')->with(['error' => 'Aduh, ada kesalahan !']);
                    }
                }else{
                    return redirect('/login')->with(['error' => 'Email atau password salah !']);
                }
            }
        }else{
            return view('login');
        }
    }
    public function forgot()
    {
        return view('forgot_password');
    }
    public function proses_forgot()
    {
        $user = new Login;
        $c = $user->where('email', $req->email);
        if($c->count() > 0)
        {
            $email = new EmailControl;
            $email->_sendEmail('reset', $req->email);
            return redirect('/')->with(['success' => 'Password reset berhasil, cek email anda !']);

        }else{
            return redirect('/')->with(['error' => 'Email tidak terdaftar !']);
        }
    }
    public function index_dokter()
    {
        return view('login-dokter');
    }
    public function login_dokter(Request $req)
    {
        if(isset($_POST['submit'])) {
            $user = new Dokter;
            $check_email = $user->where('email', $req->email)->count();
            if($check_email == 0) {
                return redirect('/login/dokter')->with(['error' => 'Email tidak terdaftar !']);
            }else{
                $login = $user->where('email', $req->email)->where('password', $req->password);
                if($login->count() > 0) {
                    // dd($login->count());
                    $c = $login->get();
                    session()->put('id_user', $c[0]->id_dokter);
                    session()->put('email', $req->email);
                    session()->put('level', 'dokter');
                    // $_SESSION['level'] = "dokter";

                    $this->level_login = $c[0]->level;
                    if(session()->get('id_user') != '' && session()->get('email') != '') 
                    {
                        if($c[0]->status == "aktif") {
                            return redirect('/dashboard');
                        }else if($c[0]->status == "block"){
                            return redirect('/login/dokter')->with(['error' => 'Akun anda dinonaktifkan, mungkin karena pelanggaran !']);
                        }else{
                            return redirect('/login/dokter')->with(['error' => 'Akun anda belum diaktifkan, silahkan cek email anda !']);
                        }
                    }else{
                        return redirect('/login/dokter')->with(['error' => 'Aduh, ada kesalahan !']);
                    }
                }else{
                    return redirect('/login/dokter')->with(['error' => 'Email atau password salah !']);
                }
            }
        }else{
            return view('login-dokter');
        }
        
    }
}
