@extends('root.root')
@section('content')

<script type="text/javascript">
  $(document).ready(function() {
      $('#spesialis').select2({
        placeholder: " Pilih...",
        allowClear: true,
        language: "id"
      });
      $('#resep-obat').select2({
        placeholder: " Pilih...",
        allowClear: true,
        language: "id"
    });
  });
 </script>
<div class="content-wrapper">
<div class="page-content fade-in-up">
<div class="col-md">
                        <div class="ibox">
                            @if($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                {{ $message }}
                            </div>
                            @endif
                            @if($messages = Session::get('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ $messages }}
                            </div>
                            @endif
                            <div id="print" class="ibox-body">
                                <center><h2>Pembayaran Berhasil</h2></center>
                                <hr>
                                <?php $da = explode(" ",$get_transaksi[0]->created_at); ?>
                                    <p>Hari & Tanggal: <b>{{ $get_transaksi[0]->day }}, {{ $get_transaksi[0]->created_at }}</b></p>
                                <h5><b>Detail Pasien</b></h5>
                                <hr>
                                <p>NIK: {{ $get_pasien[0]->nik }}</p>
                                <p>Nama: {{ $get_pasien[0]->nama }}</p>
                                <p>Jenis Kelamin: {{ $get_pasien[0]->jenis_kelamin }}</p>
                                <hr>
                                <h5><b>Detail Transaksi</b></h5>
                                <hr>
                                <?php $json = json_decode($get_transaksi[0]->data);?>
                                    @foreach($json as $datas)
                                        <?php $c = json_decode($datas); ?>
                                        <p>{{ $c->nama_obat }} ( Rp.{{ number_format($c->harga) }} ) x ( {{ $c->data }} )</p>
                                    @endforeach
                                    <p>Lain-Lain: Rp. 0</p>
                                    <hr>
                                    <h5><b>Detail Pembayaran</b></h5>
                                    <hr>
                                    <h5><b>Subtotal : Rp. {{ number_format($get_transaksi[0]->total) }}</b></h5>
                                    <h5><b>Cash : Rp. {{ number_format($get_transaksi[0]->cash) }}</b></h5>
                                    <h5><b>Kembali : Rp. {{ number_format($get_transaksi[0]->kembali) }}</b></h5>
                                    <hr>
                                   

                            </div>
                            
                        </div>
                        <button class="btn btn-primary" onClick="print()">Cetak Invoice</button>
                                    <a href="/dashboard">Kembali</a>
                    </div>
</div>

<script>
   function print()
   {
    var divToPrint = document.getElementById('print');
    var popupWin = window.open('', '_blank');
    popupWin.document.open();
    popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
    popupWin.document.close();
   }
</script>
@endsection