@extends('root.root')
@section('content')

<script type="text/javascript">
  $(document).ready(function() {
      $('#spesialis').select2({
       placeholder: " Pilih...",
    allowClear: true,
    language: "id"
      });
      $('#jadwal').select2({
       placeholder: " Pilih...",
    allowClear: true,
    language: "id"
      });
  });
 </script>
<div class="content-wrapper">
<div class="page-content fade-in-up">
<div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Tambah Antrian</div>
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
                                        <label class="col-sm-2 col-form-label">No Antrian Sebelumnya</label>
                                        <div class="col-sm-10">
                                                <input class="form-control" style="width: 200px;" name="antrian_sebelumnya" value="{{$data_antrian->no_antrian}}" type="number" readonly >  
                                        </div>
                                    </div>  
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">No Antrian Selanjutnya</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" style="width: 200px;" name="antrian_selanjutnya" value="{{ $data_antrian->no_antrian+1}}" type="number">
                                        </div>
                                    </div>             
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <button id="buttons" class="btn btn-success" type="submit">Submit</button>
                                            <a id="buttons" href='/dashboard/antrian'>Kembali</a>
                                            @if($messages = Session::get('print'))
                                            <div class="alert alert-success" role="alert">
                                                <a class="btn btn-primary" href="/dashboard/antrian/print/{{ $messages }}">Print</a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection