@extends('root.root')
@section('content')
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Daftar Purchase Order</div>
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
                                            <th>No</th>
                                            <th>Manufaktur</th>
                                            <th>Jumlah Transaksi</th>
                                            <th>Total Stok</th>
                                            <th>Status</th>
                                            <th>Satuan</th>
                                            <th>Dibuat oleh</th>
                                            <th>Tanggal</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($po as $num => $pos)
                                        <tr>
                                            <td>{{ $po->firstItem() + $num }}</td>
                                            <td>{{ $pos->nama_manufaktur }}</td>
                                            <td>{{ $pos->total_belanja }}</td>
                                            <td>{{ $pos->total_stok }}</td>
                                            <td>{{ $pos->status }}</td>
                                            <td>{{ $pos->make_by }}</td>
                                            <td>{{ $pos->created_at }}</td>
                                            <td><a href="/dashboard/purchase-order/detail/{{ $pos->id }}/{{$pos->nama_manufaktur}}">Detail</a> / <a href="#">Hapus</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                
                
</div>

@endsection