@extends('root.root')
@section('content')
<?php $id = 0; ?>
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
                                            <th>Nama Manufaktur</th>
                                            <th>Total Transaksi</th>
                                            <th>QTY</th>
                                            <th>Status</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Tanggal</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($get_list as $num => $data)
                                        <tr>
                                        <?php $id = $data->id_manufaktur; ?>
                                            <td>{{ $get_list->firstItem() + $num }}</td>
                                            <td>{{ $data->nama_manufaktur }}</td>
                                            <td>{{ $data->total_transaksi }}</td>
                                            <td>{{ $data->total_stok }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>{{ $data->make_by }}</td>
                                            <td>{{ $data->created_at }}</td>
                                            <td><button id="tanggal" class="btn btn-primary">Export Excel</button></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                
                
</div>

<script>
    $(document).ready( () => {
        $('#tanggal').on('click', (e) => {
            e.preventDefault()
            let tanggal = prompt('Masukan tanggal yang ingin di export')
            if(tanggal != null || tanggal != '')
            {
                window.location.href='{{ url("dashboard/print/pembelian/excel") }}' + '/'  + {{ $id }} + '/' + tanggal
            }

        })
    })
</script>

@endsection