@extends('root.root')
@section('content')

<script type="text/javascript">
  $(document).ready(function() {
      $('#spesialis').select2({
       placeholder: "Pilih...",
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
                                <div class="ibox-title">Tambah Akun</div>
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
                                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="nama" type="text" placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                        <small id="checking" hidden="">Checking...</small>
                                        <small id="status-ada" style="color:red" hidden="">Email telah terdaftar</small>
                                        <small id="status-a" style="color:green" hidden="">Email tersedia</small>
                                            <input class="form-control" name="email" id="email" type="text" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Level</label>
                                        <div class="col-sm-10">
                                            <select name="level" id="" class="form-contol">
                                            <option value="">Pilih</option>
                                                <option>Administrator</option>
                                                <option>Pengguna</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="password-manual" class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input id="password-input-manual" class="form-control" name="password" type="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Foto</label>
                                        <div class="col-sm-10">
                                            <img src="{{ url('assets/img/admin-avatar.png') }}" alt="">
                                            <p style="color: red;"><i>Foto tidak dapat diubah, hanya dapat diubah oleh pemilik akun !</i></p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <button id="buttons" class="btn btn-success" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
</div>

<script>
    $(document).ready(function(){
        $('#password-manual-c').click(function(){
            $('#password-manual').attr('hidden','')
            $('#password-otomatis').removeAttr('hidden','')
        })
        $('#password-otomatis-c').click(function(){
            $('#password-manual').removeAttr('hidden','')
            $('#password-otomatis').attr('hidden','')
        })
        $('#jabatan').change(function(){
            if(this.value == "Dokter")
            {
                $('#spesialis-new').removeAttr('hidden','')
            }else{
                $('#spesialis-new').attr('hidden','')

            }
        })
        $('#email').change(function(){
            if(this.value == ''){
                $('#status-ada').attr('hidden','')
                $('#checking').attr('hidden','')
                $('#status-a').attr('hidden','')
            }else{
                let data = "email=" + $('#email').val()
                $.ajax({

                    url: '/akun/check',   // sending ajax request to this url
                    type: 'get',
                    data: data,

                // before ajax request
                beforeSend: function() {
                    $('#checking').removeAttr('hidden','')

                },	

                // on success response
                success:function(response) {
                    if(response == 1) {
                        $('#buttons').attr('disabled','')
                        $('#status-ada').removeAttr('hidden','')
                        $('#checking').attr('hidden','')
                    }else{
                        $('#buttons').removeAttr('disabled','')

                        $('#checking').attr('hidden','')
                        $('#status-a').removeAttr('hidden','')

                    }
                },

                // error response
                error:function(e) {
                    $("#result").html("Some error encountered.");
                }

                });
            }
        })
    })
</script>
@endsection