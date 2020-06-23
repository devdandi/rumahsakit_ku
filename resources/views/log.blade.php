@extends('root.root')
@section('content')
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Aktifitas Pengguna</div>
                            </div>
                            <div class="ibox-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Email</th>
                                            <th>Pesan</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    
                                        @foreach($log as $logs)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $logs->email }}</td>
                                            <td>{{ $logs->pesan }}</td>
                                            <td>{{ $logs->created_at }}</td>
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