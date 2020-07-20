@extends('root.root')
@section('content')
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Daftar Janji</div>
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
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Dokter</th>
                                            <th>Tanggal</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_janji as $no => $data_janjis)
                                            <tr>
                                                <td>{{ $data_janji->firstItem() + $no }}</td>
                                                <td>{{ $data_janjis->nama }}</td>
                                                <td>{{ $data_janjis->email }}</td>
                                                <td>{{ $data_janjis->status }}</td>
                                                <td>{{ $data_janjis->dokter }}</td>
                                                <td>{{ $data_janjis->tanggal }}</td>
                                                <td><a class="btn btn-warning" href="/dashboard/janji/edit/{{$data_janjis->id_janji }}">Proses</a></td>
                                            </tr>
                                        @endforeach

                                        
                                    </tbody>
                                </table>
                                {{ $data_janji->links() }}
                            </div>
                        </div>
                    </div>
                   
                </div>

@endsection