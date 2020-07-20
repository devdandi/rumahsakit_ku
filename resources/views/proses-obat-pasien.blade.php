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
                                <div class="ibox-title">Periksa Pasien</div>
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
                                        <input type="text" hidden name="id" value="{{ $data[0]->id_pasien }}">
                                        <div class="col-sm-10">
                                            <p>{{ $data[0]->nik }}</p>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <p>{{ $data[0]->nama }}</p>
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <p>{{ $data[0]->jenis_kelamin }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Golongan Darah</label>
                                        <div class="col-sm-10">
                                            <p>{{ $data[0]->golongan_darah }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <p style="color: red;">{{ $data[0]->status }}</p>
                                        </div>
                                    </div>
                                    <div id="password-manual" class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                        <p>{{ $data[0]->alamat }}</p>
                                        </div>
                                    </div>
                                    <div id="password-manual" class="form-group row">
                                        <label class="col-sm-2 col-form-label">Penyakit Diderita</label>
                                        <div class="col-sm-10">
                                            <?php $explode_obat = explode("|", $data[0]->penyakit); ?>
                                                @foreach($explode_obat as $obat_pasien)
                                                    <li style="color:green">{{ $obat_pasien }}</li>
                                                @endforeach
                                        </div>
                                    </div>
                                    <div id="password-manual" class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pesan Dokter</label>
                                        <div class="col-sm-10">
                                            <p style="color: red">{{ $data[0]->pesan }}</p>
                                        </div>
                                    </div>
                                    <div id="spesialis-new" class="form-group row">
                                        <label class="col-sm-2 col-form-label">Resep</label>
                                        <div class="col-sm-10">
                                            <?php $total = 0; ?>
                                            @foreach($data_obat as $obat_pasien)
                                                <li style="color: green">{{ $obat_pasien[0]->nama }}  (Rp. {{ number_format($obat_pasien[0]->harga) }} )</li>
                                                    <select name="qty[]" id="qty">
                                                        @for($i = 1; $i < 20; $i++)
                                                            <option value="{{$i}}|{{ $obat_pasien[0]->nama }}|{{$obat_pasien[0]->harga}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                    <?php  $total += $obat_pasien[0]->harga; ?>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <button id="buttons" class="btn btn-success" type="submit">Submit</button>
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
        $('#qty').change(function(){
            console.log($('#qty').val())
        })
    })
</script>
@endsection