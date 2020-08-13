
<?php $__env->startSection('content'); ?>
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
                                        <label class="col-sm-2 col-form-label">NAMA</label>
                                        <input type="text" hidden value=" <?php echo e($get_janji[0]->id_janji); ?> " name="id">
                                        <div class="col-sm-10">
                                            <p><?php echo e($get_janji[0]->nama); ?></p>
                                        </div>
                                    </div>
                                    <div id="spesialis-new" class="form-group row">
                                        <label class="col-sm-2 col-form-label">Keputusan Dokter</label>
                                        <div class="col-sm-10">
                                            <select name="keputusan" id="keputusan">
                                                <option>Pilih</option>
                                                <option>Terima</option>
                                                <option>Tolak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="jadwal-new" hidden class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jadwal Ulang</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="date" class="form-control">
                                            <input type="checkbox" id="checkbox"><span>Jangan buat jadwal ?</span>
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
    $(document).ready( () => {
        $('#keputusan').change( () => {
           var val = $('#keputusan').val()
           if(val == "Tolak")
           {
                $('#jadwal-new').removeAttr('hidden','')
                $('#checkbox').click( () => {
                    $('#jadwal-new').attr('hidden','')
                })
           }else{
                $('#jadwal-new').attr('hidden','')

           }
        })
    })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/edit-janji.blade.php ENDPATH**/ ?>