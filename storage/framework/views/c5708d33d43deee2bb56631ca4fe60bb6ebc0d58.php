
<?php $__env->startSection('content'); ?>

<script type="text/javascript">
var array = []
var array_stok = []
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
                            <?php if($message = Session::get('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e($message); ?>

                            </div>
                            <?php endif; ?>
                            <?php if($messages = Session::get('error')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e($messages); ?>

                            </div>
                            <?php endif; ?>
                            <div class="ibox-body">
                                <form class="form-horizontal" method="post" action="">
                                <?php echo csrf_field(); ?>
                                <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NIK</label>
                                        <input type="text" hidden name="id" value="<?php echo e($data[0]->id_pasien); ?>">
                                        <div class="col-sm-10">
                                            <p><?php echo e($data[0]->nik); ?></p>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <p><?php echo e($data[0]->nama); ?></p>
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <p><?php echo e($data[0]->jenis_kelamin); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Golongan Darah</label>
                                        <div class="col-sm-10">
                                            <p><?php echo e($data[0]->golongan_darah); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <p style="color: red;"><?php echo e($data[0]->status); ?></p>
                                        </div>
                                    </div>
                                    <div id="password-manual" class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                        <p><?php echo e($data[0]->alamat); ?></p>
                                        </div>
                                    </div>
                                    <div id="password-manual" class="form-group row">
                                        <label class="col-sm-2 col-form-label">Penyakit Diderita</label>
                                        <div class="col-sm-10">
                                            <textarea name="penyakit" class="form-control" id="" cols="20" rows="5"></textarea>
                                            <p>Contoh: demam|covid</p>
                                        </div>
                                    </div>
                                    <div id="spesialis-new" class="form-group row">
                                        <label class="col-sm-2 col-form-label">Resep</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="resep[]" style="width: 200px;" id="resep-obat" multiple="multiple" >
                                            <?php $__currentLoopData = $obat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($obats->id_obat); ?>"><?php echo e($obats->nama); ?> Stok ( <?php echo e($obats->jumlah); ?> )</option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="" id="divs"></div>
                                    <div id="spesialis-new" class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pesan</label>
                                        <div class="col-sm-10">
                                            <textarea name="pesan" placeholder="Contoh: Oskadon 1, Nafasin 3" id="" class="form-control" cols="20" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <button id="buttons" class="btn btn-success" type="submit">Submit</button>
                                            <a href="<?php echo e(url('/dashboard')); ?>">Kembali</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
</div>

<script>
    $(document).ready(function(){

})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/edit-pasien.blade.php ENDPATH**/ ?>