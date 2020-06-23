@extends('root.root')
@section('content')
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Daftar Pengguna</div>
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
                                            <th>Level</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach($get_all as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->email }}</td>
                                            @if($data->status == "aktif"){
                                                <td style="color: green;">AKTIF</td>
                                            @endif
                                            @if($data->status == "nonaktif"){
                                                <td style="color: orange">BELUM DIVERIFIKASI</td>
                                            @endif
                                            @if($data->status == "block"){
                                                <td style="color: red">DIBLOKIR</td>
                                            @endif
                                            <td>{{ $data->level }}</td>
                                            <td><a href="/akun/edit/{{ $data->id_user }}">Edit</a> / <a onClick="return confirm('Yakin ingin dihapus ?')" id="a-hapus" href="/akun/hapus/{{ $data->id_user }}">Hapus</a> / <a href="/akun/detail">Detail</a></td>
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