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
                                <div class="ibox-title">Edit Purchase Order</div>
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
                                        <label class="col-sm-2 col-form-label">Nama Obat</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="nama_obat" value="{{ $get_list[0]->nama_obat }}" type="text" id="nama_obat">
                                            <small>Jika obat telah ada sebelumnya, tidak akan bisa di edit nama !</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Satuan</label>
                                        <div class="col-sm-10">
                                        <select class="form-control w-25" name="satuan" id="satuan">
                                                <option value="{{ $get_list[0]->satuan }}">{{ $get_list[0]->satuan }}</option>
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
                                        <label class="col-sm-2 col-form-label">Edit QTY</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="qty" value="{{ $get_list[0]->jumlah }}" type="number" id="qty">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <p>{{ $get_list[0]->status }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <button onclick="return confirm('Simpan ?')" id="buttons" class="btn btn-success" type="submit">Submit</button>
                                            <a href="{{ url('/dashboard/purchase-order/list') }}">Kembali</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
</div>

<script>
    $(document).ready( () => {
        if($('#nama_obat').val() == 'null' || $('#nama_obat').val() == null)
        {
            $('#nama_obat').attr('readonly','')
        }else{
            $('#nama_obat').removeAttr('readonly','')
        }
    })
</script>
@endsection