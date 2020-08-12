@extends('root.root')
@section('content')
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Detail Manufaktur <b>#{{$id}}</b></div>
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
                                            <th>Kategori</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($manufaktur as $no => $data)
                                            <tr>
                                                <td>{{ $manufaktur->firstItem() + $no }}</td>
                                                <td>{{ $data->nama_manufaktur }}</td>
                                                <td>{{ $data->nama_obat }}</td>
                                                <td>{{ $data->satuan }}</td>
                                                <td>{{ $data->kategori }}</td>
                                                <td>{{ $data->jumlah }}</td>
                                                <td>{{ $data->status }}</td>
                                                <td>{{ date('Y-m-d', strtotime($data->created_at)) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $manufaktur->links() }}
                                </div>
                            </div>
                        </div>
                    </div>   
</div>

@endsection