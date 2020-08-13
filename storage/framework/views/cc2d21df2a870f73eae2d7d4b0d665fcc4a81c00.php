
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                        
                            <div class="ibox-head">
                                <div class="ibox-title">Daftar Manufaktur</div>

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
                                <form action="" method="post">
                                    <label for="">Cari Nama</label>
                                    <input style="height: 33px; margin-right: 10px; margin-top: 5px;"  type="text" name="manufaktur"><span><button class="btn btn-danger"><i class="fa fa-search"></i></button></span>
                                    
                                </form>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Manufaktur</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $manufaktur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($manufaktur->firstItem() + $no); ?></td>
                                            <td><?php echo e($data->nama_manufaktur); ?></td>
                                            <?php if($data->status == true): ?>
                                                <td style="color: green;">AKTIF</td>
                                            <?php endif; ?>
                                            <?php if($data->status == false): ?>
                                                <td style="color: red;">BLOCK</td>
                                            <?php endif; ?>

                                            <td><a target="_blank" class="btn bg-yellow text-white" href="/dashboard/manufaktur/detail/<?php echo e($data->id_unique); ?>">Lihat</a> / <a class="btn bg-green text-white" href="#">Edit</a></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php echo e($manufaktur->links()); ?>

                            </div>
                        </div>
                    </div>
                   
                </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/manufaktur-daftar.blade.php ENDPATH**/ ?>