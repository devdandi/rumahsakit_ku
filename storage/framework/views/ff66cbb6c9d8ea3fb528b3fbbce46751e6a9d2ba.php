
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Aktifitas Pengguna</div>
                            </div>
                            <div class="ibox-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Email</th>
                                            <th>Pesan</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    
                                        <?php $__currentLoopData = $log; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no++); ?></td>
                                            <td><?php echo e($logs->email); ?></td>
                                            <td><?php echo e($logs->pesan); ?></td>
                                            <td><?php echo e($logs->created_at); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/log.blade.php ENDPATH**/ ?>