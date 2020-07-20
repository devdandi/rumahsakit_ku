@extends('root.root')
@section('content')
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Daftar Obat</div>
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
                                            <th>Nama</th>
                                            <th>Satuan</th>
                                            <th>Kategori</th>
                                            <th>Pemakaian</th>
                                            <th>Kadaluarsa</th>
                                            <th>Jenis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($get_obat as $no => $obat)
                                        <tr>
                                            <td>{{ $get_obat->firstItem() + $no }}</td>
                                            <td>{{ $obat->manufaktur }}</td>
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