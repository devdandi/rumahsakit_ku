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
                                    <label for="">Cari Nama</label>
                                    <input style="height: 33px; margin-right: 10px; margin-top: 5px;"  type="text" name="manufaktur"><span><button class="btn btn-danger"><i class="fa fa-search"></i></button></span>
                                    
                                </form>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Manufaktur</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($manufaktur as $no => $data)
                                        <tr>
                                            <td>{{ $manufaktur->firstItem() + $no }}</td>
                                            <td>{{ $data->nama_manufaktur }}</td>
                                            @if($data->status == true)
                                                <td style="color: green;">AKTIF</td>
                                            @endif
                                            @if($data->status == false)
                                                <td style="color: red;">BLOCK</td>
                                            @endif

                                            <td><a target="_blank" class="btn bg-yellow text-white" href="/dashboard/manufaktur/detail/{{$data->id_unique}}">Lihat</a> / <a class="btn bg-green text-white" href="#">Edit</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $manufaktur->links() }}
                            </div>
                        </div>
                    </div>
                   
                </div>

@endsection