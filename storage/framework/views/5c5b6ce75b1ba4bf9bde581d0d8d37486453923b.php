
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Daftar Janji</div>
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
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Dokter</th>
                                            <th>Tanggal</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $data_janji; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $data_janjis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($data_janji->firstItem() + $no); ?></td>
                                                <td><?php echo e($data_janjis->nama); ?></td>
                                                <td><?php echo e($data_janjis->email); ?></td>
                                                <td><?php echo e($data_janjis->status); ?></td>
                                                <td><?php echo e($data_janjis->dokter); ?></td>
                                                <td><?php echo e($data_janjis->tanggal); ?></td>
                                                <td><a class="btn btn-warning" href="/dashboard/janji/edit/<?php echo e($data_janjis->id_janji); ?>">Proses</a></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        
                                    </tbody>
                                </table>
                                <?php echo e($data_janji->links()); ?>

                            </div>
                        </div>
                    </div>
                   
                </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/daftar-janji.blade.php ENDPATH**/ ?>