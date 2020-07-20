@extends('root.root')
@section('content')
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                    
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Laporan Keuangan</div>
                                <p><b>Jumlah Data: {{ number_format($datas->total()) }}</b></p>
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
                                <div hidden class="alert alert-danger" id="alerts" role="alert">
                                    Periksa tanggal !
                                </div>
                                <p style="color: green;" hidden id="waits">Mohon tunggu...</p>
                                <form class="form-group" id="forms" method="post" action="/dashboard/keuangan">
                                @csrf
                                    <label for="">Dari</label>
                                    <input type="date" name="dari" id="dari">
                                    <label for="">Sampai</label>
                                    <input type="date" name="sampai" id="sampai">
                                    <button id="btns" class="btn btn-warning">Proses</button>
                                </form>
                                <?php if(isset($datas)){ ?>
                                    <table class="table" id="tables">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID Pasien</th>
                                            <th>CASH</th>
                                            <th>KEMBALI</th>
                                            <th>STATUS</th>
                                            <th>TANGGAL</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; $total = 0;?>
                                    @foreach($datas as $no => $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $data->id_pasien }}</td>
                                            <td>{{ $data->cash }}</td>
                                            <td>{{ $data->kembali }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>{{ $data->created_at }}</td>
                                            <td><a  href="#">Detail</a> / <a href="#">Hapus</a></td>
                                            <?php $total += $data->cash - $data->kembali; ?>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                {{ $datas->links() }}
                                    <?php } ?> 
                                
                            </div>
                        </div>
                    </div>
                   
                </div>
 
@endsection