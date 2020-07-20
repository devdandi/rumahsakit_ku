@extends('root.root')
@section('content')
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Daftar Antrian</div>
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
                                            <th>No Antrian</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        
                                        @foreach($antrian as $antrians)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ htmlspecialchars($antrians->no_antrian) }}</td>
                                                <td>{{ htmlspecialchars($antrians->status) }}</td>
                                                <td><a href="/dashboard/pasien/tambah/{{$antrians->no_antrian }}">Panggil</a> / <a onClick="return confirm('Yakin') " href="/dashboard/antrian/hapus/{{ $antrians->no_antrian }}">Hapus</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   
</div>
<script>
$(document).ready(function(e){
    setInterval(function(){
        window.location.href='/dashboard/antrian'
    }, 30000);
});
</script>
@endsection