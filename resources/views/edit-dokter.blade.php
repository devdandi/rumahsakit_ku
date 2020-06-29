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
                                <div class="ibox-title">Edit Dokter</div>
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
                                            <input class="form-control" readonly name="nik" value="{{ $data[0]->nik }}" type="text" id="input-nik" placeholder="Nama Lengkap">
                                            <input type="text" hidden name="id" value="{{$data[0]->id_dokter}}">
                                            <a id="btn-lock" onClick="return confirm('Yakin ?')" class="btn btn-warning mt-1">Buka</a>
                                            <a id="btn-unlock" hidden class="btn btn-warning mt-1">Tutup</a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="nama" value="{{ $data[0]->nama }}" type="text" placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                        <small id="checking" hidden="">Checking...</small>
                                        <small id="status-ada" style="color:red" hidden="">Email telah terdaftar</small>
                                        <small id="status-a" style="color:green" hidden="">Email tersedia</small>
                                            <input class="form-control" name="email" id="email" value="{{ $data[0]->email }}" type="text" placeholder="Email">
                                        </div>
                                    </div>
                                         <div id="spesialis-new" class="form-group row">
                                        <label class="col-sm-2 col-form-label">Spesialis</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="spesialis[]" style="width: 200px;" id="spesialis" multiple="multiple">
                                                @foreach($spesialis as $spesialis1)
                                                    <option value="{{ $spesialis1->spesialis }}">{{ $spesialis1->spesialis }}</option>
                                                @endforeach
                                            </select>
                                            <!-- <p>Spesialis Sebelumnya {{ $data[0]->spesialis }}</p> -->
                                            <?php $data_sp = json_decode($data[0]->spesialis) ?>
                                            @foreach($data_sp as $data_sp1)
                                                <li style="color: green">{{ htmlspecialchars($data_sp1) }}</li>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div id="jadwaldokter-new" class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jadwal Dokter</label>
                                    <div class="col-sm-10">
                                            <select class="form-control" name="jadwal_dokter[]" style="width: 200px;" id="jadwal" multiple="multiple">
                                                @foreach($jadwal_dokter as $jadwal_dokter1)
                                                    <option value="{{ $jadwal_dokter1->hari }}">{{ $jadwal_dokter1->hari }}</option>
                                                @endforeach
                                            </select>
                                            <?php $data_jd = json_decode($data[0]->jadwal_dokter) ?>
                                            @foreach($data_jd as $data_jd1)
                                                <li style="color: green">{{ htmlspecialchars($data_jd1) }}</li>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jam Kerja</label>
                                        <div class="col-sm-10">
                                            <span>Dari</span>
                                            <select name="dari_jam" id="">
                                                <option>01</option>
                                                <option>02</option>
                                                <option>03</option>
                                                <option>04</option>
                                                <option>05</option>
                                                <option>06</option>
                                                <option>06</option>
                                                <option>07</option>
                                                <option>08</option>
                                                <option>09</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                                <option>13</option>
                                                <option>14</option>
                                                <option>15</option>
                                                <option>16</option>
                                                <option>17</option>
                                                <option>18</option>
                                                <option>19</option>
                                                <option>20</option>
                                                <option>21</option>
                                                <option>22</option>
                                                <option>23</option>
                                                <option>24</option>
                                            </select>
                                            <span>Sampai</span>
                                            <select name="sampai_jam" id="">
                                                <option>01</option>
                                                <option>02</option>
                                                <option>03</option>
                                                <option>04</option>
                                                <option>05</option>
                                                <option>06</option>
                                                <option>06</option>
                                                <option>07</option>
                                                <option>08</option>
                                                <option>09</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                                <option>13</option>
                                                <option>14</option>
                                                <option>15</option>
                                                <option>16</option>
                                                <option>17</option>
                                                <option>18</option>
                                                <option>19</option>
                                                <option>20</option>
                                                <option>21</option>
                                                <option>22</option>
                                                <option>23</option>
                                                <option>24</option>
                                            </select>
                                            <p style="color: green">Jam Sebelumnya {{ $data[0]->dari_jam }} - {{ $data[0]->sampai_jam }}</p>

                                        </div>
                                    </div>  
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select name="jenis_kelamin" id="">
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="password-manual" class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea name="alamat" class="form-control" id="" cols="20" rows="5">{{ $data[0]->alamat }}</textarea>
                                        </div>
                                    </div>
                                    <div id="password-manual" class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input id="password-input-manual" class="form-control" name="password" type="password" value="{{ $data[0]->password }}" placeholder="Password">
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
                                            <a href="{{ url('/dashboard') }}">Kembali</a>
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
    })
</script>
@endsection