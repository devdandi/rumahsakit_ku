@extends('root.root')
@section('content')
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Detail Manufaktur</div>
                                <button onClick="alert('ok')" class="btn btn-primary">Export ke excel</button>
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
                                            <th>Stok Awal</th>
                                            <th>Terjual</th>
                                            <th>Sisa Stok</th>
                                            <th>Pendapatan</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $total = 0; ?>
                                    <?php $terjual = 0; ?>

                                    @foreach($get_obata as $no => $obat)
                                            <tr>
                                                <td>{{ $get_obata->firstItem() + $no }}</td>
                                                <td>{{ $data['supplier'] }}</td>
                                                <td>{{ $data['nama_obat'][$no] }}</td>
                                                <td>{{ $data['stok_awal'][$data['nama_obat'][$no]] }}</td>
                                                <td>{{ $data['detail_stok'][$data['nama_obat'][$no]] }}</td>
                                                <td>{{ $data['stok_asli'][$data['nama_obat'][$no]] }}</td>
                                                <td>Rp. {{ number_format($data['detail_stok'][$data['nama_obat'][$no]] * $obat->harga)}}</td>
                                                <td>{{ $data['status'][$data['nama_obat'][$no]] }}</td>

                                                <?php $terjual += $data['detail_stok'][$data['nama_obat'][$no]]; ?>
                                                <?php $total += $data['detail_stok'][$data['nama_obat'][$no]] * $obat->harga; ?>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h5><b>Total: Rp.{{ number_format($total) }}</b></h5>
                                <h5><b>Terjual: {{ number_format($terjual) }}</b></h5>

                                </div>
                            </div>
                        </div>
                    </div>   
</div>

@endsection