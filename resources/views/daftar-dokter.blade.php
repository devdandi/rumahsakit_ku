@extends('root.root')
@section('content')
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Daftar Dokter</div>
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
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                        @foreach($data_dokter as $data) 
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->nik }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->jenis_kelamin }}</td>
                                                <td>{{ $data->alamat }}</td>
                                                <td><a onClick="return confirm('Yakin dihapus ?' )" href="/dashboard/dokter/hapus/{{ $data->id_dokter }}">Hapus</a> / <a href="/dashboard/dokter/edit/{{ $data->id_dokter }}">Edit</a> / <a href="/dashboard/dokter/detail/{{ $data->id_dokter }}">Detail</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $data_dokter->links() }}
                            </div>
                        </div>
                    </div>
                   
                </div>
</div>

@endsection