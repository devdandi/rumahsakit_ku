@extends('root.root')
@section('content')
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Detail Purchase Order #{{$nama}}</div>
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
                                            <th>Satuan</th>
                                            <th>Jumlah</th>
                                            <th>Harga ( Sebelumnya )</th>
                                            <!-- <th>Generate by</th> -->
                                            <th>Status</th>
                                            <!-- <th>Send to</th> -->
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($get_list as $num => $datas)
                                            <tr>
                                                <td>{{ $get_list->firstItem() + $num }}</td>
                                                <td>{{ $datas->nama_manufaktur }}</td>
                                            </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>   
</div>

@endsection