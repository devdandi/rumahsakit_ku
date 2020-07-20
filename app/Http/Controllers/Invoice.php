<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Transaksi;
use App\models\User;
use App\models\Pasien;
use App\models\Obat;
use Codedge\Fpdf\Fpdf\Fpdf;



class Invoice extends Controller
{
    protected $transaksi;
    protected $user;
    protected $pdf;
    protected $pasien;
    protected $obat;
    protected $data = array();
    
    public function __construct()
    {
        $this->transaksi = new Transaksi;
        $this->user = new User; 
        $this->pasien = new Pasien;
        $this->obat = new Obat;
        $this->pdf = new Fpdf('P','mm',array(57, 47));
    }
    public function index($id)
    {
        $get_pasien = $this->pasien->where('id_pasien', $id)->where('status', 'berhasil')->get();
        $get_transaksi = $this->transaksi->where('id_pasien', $id)->get();
        $get_data = $this->user->where('email', session()->get('email'))->get();
        $get_obat = json_decode($get_pasien[0]->resep);
        $this->pdf->AddPage();
        $this->pdf->SetFont('Courier', 'B', 11);
        $this->pdf->Cell(50, 25, 'Detail Pembayaran');  
        $this->pdf->Output();
        exit;
    }
}
