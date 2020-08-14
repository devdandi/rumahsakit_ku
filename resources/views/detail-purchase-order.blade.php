@extends('root.root')
@section('content')
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Detail Purchase Order #{{$nama}}</div>
                                <a class="btn btn-primary" onclick="return confirm('Setujui semua ? ')" href="/dashboard/purchase-order/approve/{{ $id }}">Setujui</a>
                            </div>
                            <div class="ibox-body">
                                @if($message_ok = Session::get('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ $message_ok }}
                                </div>
                                @endif
                                @if($message_g = Session::get('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ $message_g }}
                                </div>
                                @endif
                                <div class="tablesa" id="tablesa">
                                <table class="table" id="tablese">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Manufaktur</th>
                                            <th>Nama Obat</th>
                                            <th>Satuan</th>
                                            <th>QTY ( Jumlah Beli )</th>
                                            <th>Harga ( Sebelumnya )</th>
                                            <th>Total</th>
                                            <!-- <th>Generate by</th> -->
                                            <th>Status</th>
                                            <!-- <th>Send to</th> -->
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $subtotal = 0; ?>
                                        @foreach($get_list as $num => $datas)
  
                                            <tr>
                                                <td>{{ $get_list->firstItem() + $num }}</td>
                                                <td>{{ $nama }}</td>
                                                @if($datas->id_obat == 0)
                                                    <td style="color: blue">{{ $datas->nama_obat }}</td>
                                                @endif
                                                @if($datas->id_obat != 0)
                                                    <td>{{ $dataa['details'][$datas->id_obat] }}</td>
                                                @endif
                                                <td>{{ $datas->satuan }}</td>
                                                <td>{{ $datas->jumlah }}</td>
                                                @if(in_array($datas->id_obat, $dataa['details']['details_id'], TRUE))
                                                    <td>Rp. {{ number_format($dataa['details']['harga'][$datas->id_obat]) }}</td>
                                                @endif
                                                @if(!in_array($datas->id_obat, $dataa['details']['details_id'], TRUE))
                                                    <td style="color: blue">Rp. 0</td>
                                                @endif


                                                @if(in_array($datas->id_obat, $dataa['details']['details_id'], TRUE))
                                                    <td>Rp. {{ number_format($dataa['details']['harga'][$datas->id_obat] * $datas->jumlah) }}</td>
                                                    <?php $subtotal += $dataa['details']['harga'][$datas->id_obat] * $datas->jumlah; ?>
                                                @endif
                                                @if(!in_array($datas->id_obat, $dataa['details']['details_id'], TRUE))
                                                    <td style="color: blue">Rp. 0</td>
                                                @endif
                                                <td>{{ $datas->status }}</td>
                                                <td><a href="/dashboard/purchase-order/edit/{{ $datas->id }}">Edit</a> / <a onclick="return confirm('Hapus ?') " href="/dashboard/purchase-order/hapus/{{ $datas->id }}">Hapus</a></td>
                                            </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                                <h5><b>Subtotal: Rp {{ number_format($subtotal) }}</b></h5>
                                {{ $get_list->links() }}
                                </div>
                                <small style="color: red">* Warna biru adalah obat yang baru atau tidak ditemukan di database !</small>
                            </div>
                        </div>
                    </div>   
</div>

@endsection