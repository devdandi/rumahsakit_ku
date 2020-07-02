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
                                            <th>Nama</th>
                                            <th>No Antrian</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Golongan Darah</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                        @foreach($pasien as $pasiens)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $pasiens->nama }}</td>
                                                <td>{{ $pasiens->no_antrian }}</td>
                                                <td>{{ $pasiens->jenis_kelamin }}</td>
                                                <td>{{ $pasiens->golongan_darah }}</td>
                                                <!-- @if($pasiens->status == "dirawat")
                                                    <td style="color: red">DIRAWAT</td>
                                                @endif
                                                @if($pasiens->status == "sembuh")
                                                    <td style="color: green">SEMBUH</td>
                                                @endif -->
                                                <td style="color: red">{{ $pasiens->status }}</td>
                                                <?php if($get_data[0]->level == "Dokter" || $get_data[0]->level == "Suster") { ?>
                                                    <td><a class="btn btn-warning" href="/dashboard/pasien/edit/{{ $pasiens->id_pasien }}">Periksa</a></td>
                                                <?php }else{ ?>
                                                    <td>Tidak ada akses</td>
                                                <?php } ?>
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