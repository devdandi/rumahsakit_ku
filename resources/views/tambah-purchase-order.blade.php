@extends('root.root')
@section('content')

<div class="content-wrapper">
<div class="page-content fade-in-up">
<div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Tambah Purchase Order</div>
                            </div>
                            <div class="bungkus">
                            @if($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                {{ $message }}
                                @if($me = Session::get('link_manufaktur'))
                                    <a class="btn btn-primary" href="{{ $me }}">Lihat Manufaktur</a>
                                @endif
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
                                        <label class="col-sm-2 col-form-label">Nama Manufaktur</label>
                                        <div class="col-sm-10">
                                            <select name="manufaktur" class="form-control w-25" id="">
                                                <option value="">Pilih</option>
                                                @foreach($manufaktur as $data)
                                                    <option value="{{$data->id}}">{{ $data->nama_manufaktur }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kirim Ke</label>
                                        <div class="col-sm-10">
                                            <!-- <input class="form-control"  name="nama_obat[]" id="nama_obat"  type="text"> -->
                                            <select name="send_to" class="form-control w-25" id="test">
                                                <option value="">Pilih</option>
                                                @foreach($get_user as $users)
                                                    <option  value="{{ $users->id_user }}">{{ $users->name }} ( {{$users->level}} ) </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <br>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Obat</label>
                                        <div class="col-sm-10">
                                        <span id="get-data" hidden>Mengambil data...</span>
                                            <!-- <input class="form-control w-50" name="nama_obat[]" id="nama_obat"  type="text"> -->
                                            <select name="nama_obat[]" id="nama_obat" class="form-control w-50">
                                                <option value="">pilih</option>
                                                @foreach($get_obat as $obat)
                                                    <option value="{{$obat->id_obat}}|{{ $obat->nama }}">{{ $obat->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Satuan</label>
                                        <div class="col-sm-10">
                                        <select class="form-control w-25" name="satuan[]" id="satuan">
                                                <option>pilih</option>
                                                <option>blister</option>
                                                <option>vial</option>
                                                <option>set</option>
                                                <option>Pc</option>
                                                <option>Tube</option>
                                                <option>Box</option>
                                                <option>pcs</option>
                                                <option>pack</option>
                                                <option>botol</option>
                                                <option>gr</option>
                                                <option>ml</option>
                                                <option>unit</option>
                                                <option>galon</option>
                                                <option>rol</option>
                                                <option>meter</option>
                                                <option>sachet</option>
                                                <option>buah</option>
                                                <option>pasang</option>
                                                <option>amp</option>
                                                <option>liter</option>
                                                <option>fls</option>
                                                <option>flash</option>
                                                <option>flab</option>
                                                <option>ampul</option>
                                                <option>cap</option>
                                                <option>tab</option>
                                                <option>tablet</option>
                                                <option>kapsul</option>
                                                <option>paket</option>
                                                <option>kapsul lunak</option>
                                                <option>kit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">QTY</label>
                                        <div class="col-sm-10">
                                            <input class="form-control w-50"  name="jumlah[]" id="jumlah"  type="text">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Harga Sebelumnya</label>
                                        <div class="col-sm-10">
                                            <input class="form-control w-50" disabled  name="harga[]" id="harga"  type="text">
                                        </div>
                                    </div> -->
                                    <!-- <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Total QTY * Harga</label>
                                        <div class="col-sm-10">
                                            <input class="form-control w-50" disabled  name="total[]" id="total"  type="text">
                                        </div>
                                    </div> -->
                                    <div class="add">

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <button id="buttons" class="btn btn-success" type="submit">Submit</button>
                                            <a id="buttons" href='/dashboard/antrian'>Kembali</a>
                                        </div>
                                    </div>
                                </form>
                                <button id="duplicates" class="btn btn-primary">Tambah Obat Lama</button>
                                <button id="duplicates-new" class="btn btn-danger">Tambah Obat Baru</button> 
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

<script>
    $(document).ready( () => {
        $('#test').on('change', () => {
            var val = $('#test').val()
            $('#harga').val(val)
        })
        $('#duplicates').on('click', () => {
            // e.preventDefault()
            $('.add').append(`
            <br>
            <br>
            <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Obat</label>
                                        <div class="col-sm-10">
                                        <span id="get-data" hidden>Mengambil data...</span>
                                            <!-- <input class="form-control w-50" name="nama_obat[]" id="nama_obat"  type="text"> -->
                                            <select name="nama_obat[]" id="nama_obat" class="form-control w-50">
                                                <option value="">pilih</option>
                                                @foreach($get_obat as $obat)
                                                    <option id="idobat" value="{{$obat->id_obat}}">{{ $obat->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Satuan</label>
                                        <div class="col-sm-10">
                                        <select class="form-control w-25" name="satuan[]" id="satuan">
                                                <option>pilih</option>
                                                <option>blister</option>
                                                <option>vial</option>
                                                <option>set</option>
                                                <option>Pc</option>
                                                <option>Tube</option>
                                                <option>Box</option>
                                                <option>pcs</option>
                                                <option>pack</option>
                                                <option>botol</option>
                                                <option>gr</option>
                                                <option>ml</option>
                                                <option>unit</option>
                                                <option>galon</option>
                                                <option>rol</option>
                                                <option>meter</option>
                                                <option>sachet</option>
                                                <option>buah</option>
                                                <option>pasang</option>
                                                <option>amp</option>
                                                <option>liter</option>
                                                <option>fls</option>
                                                <option>flash</option>
                                                <option>flab</option>
                                                <option>ampul</option>
                                                <option>cap</option>
                                                <option>tab</option>
                                                <option>tablet</option>
                                                <option>kapsul</option>
                                                <option>paket</option>
                                                <option>kapsul lunak</option>
                                                <option>kit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jumlah</label>
                                        <div class="col-sm-10">
                                            <input class="form-control w-50"  name="jumlah[]" id="jumlah"  type="text">
                                        </div>
                                    </div>
                                    `)
        })
        //     $("select[name='nama_obat[]']").on('change', () => {
        //     // alert('ok')
        //     var data = "data="+$('#nama_obat').val()
        //     $.ajax({
        //         url: "{{ route('o-check') }}",
        //         type: "get",
        //         data: data,

        //         success:function(r)
        //         {
        //             $('#harga').val(r.harga)
        //             $('#satuan').val(r.satuan)
        //             $('#jumlah').on('change', () => {
        //                 $('#total').val(r.harga * $('#jumlah').val())
        //             })
        //             // $(".add input[name='total[]']").last().val('Nafasin')
        //         },
        //         beforeSend:function()
        //         {
        //             $('#get-data').removeAttr('hidden','')
        //         },
        //         complete:function()
        //         {
        //             $('#get-data').attr('hidden','')
        //         }
        //     })
        // })
        $('#duplicates-new').on('click', () => {
            $(".add").append(`
            
            <br>
            <br>
            <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Obat</label>
                                        <div class="col-sm-10">
                                        <span id="get-data" hidden>Mengambil data...</span>
                                            <input class="form-control w-50" name="nama_obat[]" id="nama_obat"  type="text">
                                           
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Satuan</label>
                                        <div class="col-sm-10">
                                        <select class="form-control w-25" name="satuan[]" id="satuan">
                                                <option>pilih</option>
                                                <option>blister</option>
                                                <option>vial</option>
                                                <option>set</option>
                                                <option>Pc</option>
                                                <option>Tube</option>
                                                <option>Box</option>
                                                <option>pcs</option>
                                                <option>pack</option>
                                                <option>botol</option>
                                                <option>gr</option>
                                                <option>ml</option>
                                                <option>unit</option>
                                                <option>galon</option>
                                                <option>rol</option>
                                                <option>meter</option>
                                                <option>sachet</option>
                                                <option>buah</option>
                                                <option>pasang</option>
                                                <option>amp</option>
                                                <option>liter</option>
                                                <option>fls</option>
                                                <option>flash</option>
                                                <option>flab</option>
                                                <option>ampul</option>
                                                <option>cap</option>
                                                <option>tab</option>
                                                <option>tablet</option>
                                                <option>kapsul</option>
                                                <option>paket</option>
                                                <option>kapsul lunak</option>
                                                <option>kit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jumlah</label>
                                        <div class="col-sm-10">
                                            <input class="form-control w-50"  name="jumlah[]" id="jumlah"  type="text">
                                        </div>
                    </div>
            `)
        })
    })
</script>
@endsection