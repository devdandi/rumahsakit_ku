@extends('root.root')
@section('content')

<script type="text/javascript">
  $(document).ready(function() {
      $('#spesialis').select2({
        placeholder: " Pilih...",
        allowClear: true,
        language: "id"
      });
      $('#resep-obat').select2({
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
                                <div class="ibox-title">Checkout</div>
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
                                        <label class="col-sm-2 col-form-label">NIK</label>
                                        
                                        <div class="col-sm-10">
                                            <p>{{ $get_pasien[0]->nik }}</p>
                                            <input type="text" hidden name="id" value="{{$get_pasien[0]->id_pasien }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama</label>
                                        
                                        <div class="col-sm-10">
                                            <p>{{ $get_pasien[0]->nama }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Penyakit</label>
                                        
                                        <div class="col-sm-10">
                                            <p>{{ $get_pasien[0]->penyakit }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Resep</label>
                                        
                                        <div class="col-sm-10">
                                            <?php $subtotal = 0; ?>
                                            @foreach($get_tr as $tr)
                                                <li style="color: red">{{ $tr->nama_obat }} Rp.{{ number_format($tr->harga) }} ( x {{ $tr->data }} )</li>
                                                <?php $subtotal += $tr->harga * $tr->data; ?>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Subtotal</label>
                                        
                                        <div class="col-sm-10">
                                            <p>Rp. {{ number_format($subtotal) }}</p>
                                            <span id="span" hidden>{{$subtotal}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Uang Pasien</label>
                                        <input type="text" hidden value="{{ $subtotal }}" name="subtotal">
                                        <div class="col-sm-10">
                                        <small style="color: red" hidden id="err">Pastikan jumlah yang anda masukan benar !</small>
                                           <input type="number" class="form-control" id="uang" name="uang">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <button id="buttons" class="btn btn-success"  type="submit">Bayar</button>
                                            <a href="{{ url('/dashboard') }}">Kembali</a>
                                        </div>
                                    </div>
                                </form>
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
        $('#btn-lock').on('click', function(){
            $('#input-nik').removeAttr('readonly','')
            $('#btn-lock').attr('hidden','')
            $('#btn-unlock').removeAttr('hidden','')
        })
        $('#btn-unlock').on('click', function(){
            $('#input-nik').attr('readonly','')
            $('#btn-lock').removeAttr('hidden','')
            $('#btn-unlock').attr('hidden','')

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
        $('#uang').change(function(){
            var total = parseInt($('#span').text())
            if($('#uang').val() < total) {
                $('#err').removeAttr('hidden','')
                $('#buttons').attr('disabled','')
            }else{
                $('#buttons').removeAttr('disabled','')
                $('#err').attr('hidden','')
            }
        })
    })
</script>
@endsection