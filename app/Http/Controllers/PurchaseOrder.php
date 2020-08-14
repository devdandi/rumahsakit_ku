<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Dokter;
use App\models\Obat;
use DB;

use App\models\PurchaseOrder as s;


class PurchaseOrder extends Controller
{
    private $user;
    private $po;
    public $obat;
    function __construct(User $user, Dokter $dokter, s $po, Obat $o)
    {
        
        if(session('level') == "dokter")
        {
            $this->user = $dokter;
        }else{
            $this->user = $user;
        }
        $this->po = $po;
        $this->obat = $o;
    } 
    function getEmail()
    {
        return session('email');
    }  
    function isTrue()
    {
        return session('level');
    }
    public function index()
    {
        $get_data = $this->user->where('email', session('email'))->get();
        $po = $this->po->getList();
        return view('daftar-purchase-order', compact('get_data','po'));
    }
    public function ajaxObat()
    {
        $data = $_GET['data'];
        if(isset($data))
        {
            $ex = $this->obat->where('id_obat', $data)->get();
            foreach($ex as $c)
            {
                return $c;
            }
        }
    }
    public function detailPO($id, $nama)
    {
        $dataa = array();
        if($id == null || $id == '')
        {
            return redirect()->back()->with([
                'error' => 'Error'
            ]);
            
        }
        $get_data = $this->user->where('email', session('email'))->get();
        $get_list = $this->po->where('id_manufaktur', $id)->paginate(10);

        foreach($get_list as $a)
        {
            $c = $this->obat->where('id_obat', $a->id_obat)->get();

            foreach($c as $ac)
            {
                $dataa['details'][$ac->id_obat] = $ac->nama;
                $dataa['details']['harga'][$ac->id_obat] = $ac->harga;
                $dataa['details']['details_id'][$ac->id_obat] = $ac->id_obat;
             }
        }
        return view('detail-purchase-order', compact('get_data','get_list','nama','dataa', 'id'));
    }
    public function edit($id)
    {
        $get_list = '';
        if($id == null)
        {
            return redirect()->back()->with([
                'error' => 'Something Went Wrong !'
            ]);
        }
        $get_data = $this->user->where('email', session('email'))->get();

        $get_list = $this->po->where('id', $id)->get();
        
        return view('edit-purchase-order', compact('get_data','get_list'));
    }
    public function proses_edit(Request $req, $id)
    {
        if($id == null)
        {
            return redirect()->back()->with([
                'error' => 'Error'
            ]);
        }
        // dd($req->input());
        $save = $this->po->where('id', $id)->update([
            'satuan' => $req->satuan,
            'nama_obat' => $req->nama_obat,
            'jumlah' => $req->qty
        ]);
        if($save)
        {
            return redirect()->back()->with([
                'success' => 'Data diperbarui !'
            ]);
        }else{
            return redirect()->back()->with([
                'error' => 'Data gagal diperbarui !'
            ]);
        }
    }
    function hapus($id)
    {
        if($id == null)
        {
            return redirect()->back()->with([
                'error' => 'Something went wrong'
            ]);
        }
        $del = $this->po->where('id', $id)->delete();
        if($del)
        {
            return redirect()->back()->with([
                'success' => 'Data dihapus !'
            ]);
        }else{
            return redirect()->back()->with([
                'error' => 'Something went wrong'
            ]);
        }
    }
}
