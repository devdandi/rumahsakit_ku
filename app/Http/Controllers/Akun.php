<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use App\models\User;
use App\models\Jabatan;
use App\models\Spesialis;
use App\Http\Controllers\EmailControl;

class Akun extends Controller
{
    public function index()
    {
        $user = new User;
        return view('daftar-akun',['get_data' => $user->get(),'get_all' => $user->paginate(10)]);
    }
    public function tambah()
    {
        $spesialis = new Spesialis;
        $jabatan = new Jabatan;
        $user = new User;
        $get_date = $user->where('email', session()->get('email'))->get();
        return view('tambah',['get_data' => $get_date, 'jabatan' => $jabatan->get(),'spesialis' => $spesialis->get()]);
    }
    public function proses_tambah(Request $req)
    {
        $user = new User;
        $user->name = $req->nama;
        $user->email = $req->email;
        $user->status = "nonaktif";
        $user->password = $req->password;
        $user->level = $req->level;
        $user->foto = "admin-avatar.png";
        if($user->save())   
        {
            $email = new EmailControl;
            $email->_sendEmail('register', $req->email);
            return redirect('/akun/tambah')->with(['success' => 'Berhasil menambahkan '. $req->email.' !']);
        }else{
            return redirect('/akun/tambah')->with(['error' => 'Gagal menambahkan '. $req->email.' !']);

        }
    }
    public function verifikasi($email)
    {
        $user = new User;
        if($email == null OR $email == '')
        {
            return redirect('/')->with(['error' => 'Aduh, ada yang salah !']);
        }else{
            $c = $user->where('email', $email)->count();
            if($c == 0)
            {
                return redirect('/')->with(['error' => 'Aduh, ada yang salah !']);
            }else if($c == 1)
            {
                $update = $user->where('email', $email)->update(['status' => 'aktif']);
                if($update)
                {
                    return redirect('/')->with(['success' => $email. ' Berhasil diverifikasi !']);
                }
            }
        }
    }
    public function hapus($id)
    {
        $user = new User;
        $del = $user->where('id_user', $id);
        if($del->delete())
        {
            return redirect('/akun')->with(['success' => 'Berhasil dihapus !']);
        }
    }
    function check()
    {
        $user = new User;
        return $user->where('email', $_GET['email'])->count();
    }
    public function edit($id)
    {
        if($id == '')
        {
            return redirect('/akun')->with(['error' => 'Aduh, ada kesalahan !']);
        }
        $user = new User;
        $jabatan = new Jabatan;
        $spesialis = new Spesialis;
        $get = $user->where('id_user', $id);
        return view('edit-akun',['data' => $get->get(),'get_data' => $user->where('email',session()->get('email'))->get(),'jabatan' => $jabatan->get(),'spesialis' => $spesialis->get()]);
    }
    public function proses_edit(Request $req)
    {
        $user = new User;
        $c = $user->where('email', $req->email)->update([
            'name' => $req->nama, 
            'email' => $req->email, 
            'status' => $req->status,
            'password' => $req->password, 
            'level' => $req->level,
            'foto' => "admin-avatar.png", 
            'updated_at' => now()
            ]);
        if($c){
            if($req->status == "block") {
                $email = new EmailControl;
                $email->_sendEmail('block', $req->email);
                return redirect('/akun')->with(['success' => $req->email. ' Telah diblokir dan diperbarui !']);
            }else{
                $email = new EmailControl;
                $email->_sendEmail('aktif', $req->email);
                return redirect('/akun')->with(['success' => $req->email. ' Telah diaktifkan dan diperbarui !']);
            }
        }
    }
}
