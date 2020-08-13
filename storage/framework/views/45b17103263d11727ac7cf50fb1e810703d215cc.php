
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Daftar Antrian</div>
                            </div>
                            <div class="ibox-body">
                                <?php if($message_ok = Session::get('success')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo e($message_ok); ?>

                                </div>
                                <?php endif; ?>
                                <?php if($message_g = Session::get('error')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo e($message_g); ?>

                                </div>
                                <?php endif; ?>
                                <div class="tablesa" id="tablesa">
                                <table class="table" id="tablese">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No Antrian</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        
                                        <?php $__currentLoopData = $antrian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $antrians): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($no++); ?></td>
                                                <td><?php echo e(htmlspecialchars($antrians->no_antrian)); ?></td>
                                                <td><?php echo e(htmlspecialchars($antrians->status)); ?></td>
                                                <td><a href="/dashboard/pasien/tambah/<?php echo e($antrians->no_antrian); ?>">Panggil</a> / <a onClick="return confirm('Yakin') " href="/dashboard/antrian/hapus/<?php echo e($antrians->no_antrian); ?>">Hapus</a></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   
</div>
<script>
$(document).ready(function(e){
    setInterval(function(){
        window.location.href='/dashboard/antrian'
    }, 30000);
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/daftar-antrian.blade.php ENDPATH**/ ?>