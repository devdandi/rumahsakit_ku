@extends('root.root')
@section('content')

<div class="content-wrapper">
<div class="page-content fade-in-up">
<div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Tambah Spesialis</div>
                            </div>
                            @if($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                {{ $message }}
                            </div>
                            @endif
                            @if($messages = Session::get('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ $messages }}
                            </div>
                            @endif
                            <div class="ibox-body">
                                <form class="form-horizontal" method="post" action="">
                                @csrf                        
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Daftar Spesialis</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="spesialis" id="" cols="30" rows="10">Paru-Paru|Ginjal</textarea>
                                            <small style="color: red">Pisahkan setiap spesialis dengan " | "</small>
                                            <p>Jika ada data yang duplikat maka akan otomatis terhapus.</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <button id="buttons" class="btn btn-success" type="submit">Submit</button>
                                            <a id="buttons" href='/dokter'>Kembali</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="page-content fade-in-up">
                        <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Tambah Dokter ( File TXT, EXCEL )</div>
                            </div>
                            @if($message = Session::get('success_file'))
                            <div class="alert alert-success" role="alert">
                                {{ $message }}
                            </div>
                            @endif
                            @if($messages = Session::get('error_file'))
                            <div class="alert alert-danger" role="alert">
                                {{ $messages }}
                            </div>
                            @endif
                            <div class="ibox-body">
                                <form class="form-horizontal" method="post" action="/dashboard/tambah/spesialis/file">
                                @csrf                        
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">File Daftar Spesialis</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="file">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <button id="buttons" class="btn btn-success" type="submit">Submit</button>
                                            <a id="buttons" href='/dokter'>Kembali</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection