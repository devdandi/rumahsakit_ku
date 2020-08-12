@extends('root.root')
@section('content')

<div class="content-wrapper">
<div class="page-content fade-in-up">
<div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Tambah Manufaktur</div>
                            </div>
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
                                            <input class="form-control"  name="manufaktur" id="manufaktur"  type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input class="form-control"  name="email" id="emails"  type="text">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Obat</label>
                                        <div class="col-sm-10">
                                            <input class="form-control"  name="nama_obat[]" id="nama_obat"  type="text">
                                        </div>
                                    </div> -->
                                    <!-- <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Satuan</label>
                                        <div class="col-sm-10">
                                        <select name="satuan[]" id="satuan">
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
                                     -->
                                    <!-- <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-10">
                                            <input class="form-control"  name="kategori[]" id="kategori"  type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jumlah</label>
                                        <div class="col-sm-10">
                                            <input class="form-control"  name="jumlah[]" id="jumlah"  type="text">
                                        </div>
                                    </div>
                                    <div class="add">

                                    </div> -->
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <button id="buttons" class="btn btn-success" type="submit">Submit</button>
                                            <a id="buttons" href='/dashboard/antrian'>Kembali</a>
                                        </div>
                                    </div>
                                </form>
                                <!-- <button id="duplicates" class="btn btn-primary">Tambah Lainnya</button> -->
                            </div>
                        </div>
                    </div>
                </div>

<script>
    $(document).ready( () => {
        $('#duplicates').on('click', () => {
            // e.preventDefault()
            $('.add').append(`
            <div class="del">
            <span id="hapus" onclick="$(this).closest('.del').remove()" class="btn btn-danger"><i class="fa fa-close"></i></span>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Obat</label>
                                        <div class="col-sm-10">
                                            <input class="form-control"  name="nama_obat[]" id="nama_obat"  type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Satuan</label>
                                        <div class="col-sm-10">
                                        <select name="satuan[]" id="satuan">
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
                                        <label class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-10">
                                            <input class="form-control"  name="kategori[]" id="kategori"  type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jumlah</label>
                                        <div class="col-sm-10">
                                            <input class="form-control"  name="jumlah[]" id="jumlah"  type="text">
                    </div>
                </div>
                </div>
            `)
        })
    })
</script>
@endsection