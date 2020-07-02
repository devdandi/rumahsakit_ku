<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Antrian as Antrians;
use App\models\User;
use Codedge\Fpdf\Fpdf\Fpdf;

class Antrian extends Controller
{
    public function index()
    {
        $user = new User;
        $get_data = $user->where('email', session()->get('email'))->get();
        $antrian = new Antrians;
        $get_antrian = $antrian->where('status','!=','first_antrian')->paginate(10);
        return view('daftar-antrian',['get_data' => $get_data,'antrian' => $get_antrian]);
    }
    public function tambah()
    {
        $user = new User;
        $antrian = new Antrians;
        $get_data = $user->where('email', session()->get('email'))->get();
        return view('tambah-antrian',['get_data' => $get_data,'data_antrian' => $antrian->all()->last()]);
    }
    public function proses_tambah(Request $req)
    {
        if($req->antrian_selanjutnya <= $req->antrian_sebelumnya)
        {
            return redirect()->back()->with(['error' => 'Aduh, ada kesalahan !']);
        }
        $antrian = new Antrians;
        $c = $antrian->where('no_antrian', $req->antrian_selanjutnya);
        if($c->count() == 0)
        {
            $antrian->no_antrian = $req->antrian_selanjutnya;
            if($antrian->save())
            {
                return redirect()->back()->with(['success' => 'Antrian ditambahkan !','print' => $req->antrian_selanjutnya]);
            }
        }else{
            return redirect()->back()->with(['error' => 'Aduh, no antrian sudah terdaftar !']);
        }
    }
    public function print($id) {
        $fpdf = new FPDF('P','mm',array(57,47,-13)); 
        $fpdf->AddPage();
        $fpdf->SetFont('Courier', 'B', 8);
        $fpdf->Cell(40, 10, 'Nomor Antrian : '. $id);
        $fpdf->Output();
        exit;
    }
}
