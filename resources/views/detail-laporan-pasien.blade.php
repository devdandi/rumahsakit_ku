@extends('root.root')
@section('content')
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Detail Pasien</div>
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
                                            <th>Nama</th>
                                            <th>Penyakit</th>
                                            <th>Nama Obat</th>
                                            <th>Jumlah Beli</th>
                                            <th>Total</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($get_pasien as $no => $data)
                                        <tr>
                                            <td>{{ $get_pasien->firstItem() + $no }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->penyakit }}</td>
                                            <td>{{ $data->nama_obat }}</td>
                                            <td>{{ $data->jumlah_beli }}</td>
                                            <td>{{ $data->total }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->status }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $get_pasien->links() }}
                                </div>
                            </div>
                        </div>
                    </div>   
</div>

@endsection