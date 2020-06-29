@extends('root.root')
@section('content')
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Daftar Pasien</div>
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
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Golongan Darah</th>
                                            <th>Ruangan</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                        @foreach($pasien as $pasiens)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $pasiens->nik }}</td>
                                                <td>{{ $pasiens->nama }}</td>
                                                <td>{{ $pasiens->alamat }}</td>
                                                <td>{{ $pasiens->jenis_kelamin }}</td>
                                                <td>{{ $pasiens->golongan_darah }}</td>
                                                <td>{{ $pasiens->ruangan }}</td>
                                                <!-- @if($pasiens->status == "dirawat")
                                                    <td style="color: red">DIRAWAT</td>
                                                @endif
                                                @if($pasiens->status == "sembuh")
                                                    <td style="color: green">SEMBUH</td>
                                                @endif -->
                                                <td style="color: red">{{ $pasiens->status }}</td>
                                                <td><a onClick="return confirm('Yakin ?')" href="/dashboard/pasien/hapus/{{ $pasiens->id_pasien }}">Hapus</a> / <a href="/dashboard/pasien/edit/{{ $pasiens->id_pasien }}">Edit</a></td>
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