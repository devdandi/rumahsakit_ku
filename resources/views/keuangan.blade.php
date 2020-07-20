@extends('root.root')
@section('content')
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                    
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Laporan Keuangan</div>
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
                                <form class="form-group" id="forms" method="post" action="">
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
                                    @foreach($datas as $no => $data)
                                        <tr>
                                            <td>{{ $datas->firstItem() + $no }}</td>
                                            <td>{{ $data->id_pasien }}</td>
                                            <td>{{ $data->cash }}</td>
                                            <td>{{ $data->kembali }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>{{ $data->created_at }}</td>
                                            <td><a  href="#">Detail</a> / <a href="#">Hapus</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <p><b>Total: {{ number_format($datas->total()) }}</b></p>
                                {{ $datas->links() }}
                                    <?php }else{ ?> 
                                    <!-- <table class="table" id="tables">
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
  
                                    </tbody>
                                </table> -->
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                   
                </div>
 
@endsection