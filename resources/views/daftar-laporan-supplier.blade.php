@extends('root.root')
@section('content')
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Daftar Manufaktur</div>
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
                                <form action="" method="post">
                                @csrf
                                <p><b>Filter berdasarkan tanggal</b></p>
                                @if(isset($data))
                                 <p style="color: green">{{$data}}</p>
                                @endif
                                    <label for="">Dari</label>
                                    <input name="from" type="date">
                                    <label for="">Sampai</label>
                                    <input name="to" type="date">
                                    <button class="btn btn-primary">Submit</button>
                                </form>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Manufaktur</th>
                                            <th>Semua Stok</th>
                                            <th>Harus Dibayar</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($laporan_obat as $no => $data)
                                    <tr>
                                        <td>{{ $laporan_obat->firstItem() + $no }}</td>
                                        <td>{{ $data->manufaktur }}</td>
                                        <td>{{ number_format($data->semua_stok) }}</td>
                                        <td>Rp. {{ number_format($data->harus_dibayar) }}</td>
                                        <?php $ex_name = str_replace(' ', '-', $data->manufaktur); ?>
                                        <td><a href="/dashboard/report/manufaktur-obat/{{$ex_name}}" class="btn btn-primary">Lihat</a></td>
                                    </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                                {{ $laporan_obat->links() }}
                            </div>
                        </div>
                    </div>
                   
                </div>

@endsection