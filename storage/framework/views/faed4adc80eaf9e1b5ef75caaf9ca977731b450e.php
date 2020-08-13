
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Daftar Dokter</div>
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
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
         
                                        <?php $__currentLoopData = $data_dokter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <tr>
                                                <td><?php echo e($data_dokter->firstItem() + $no); ?></td>
                                                <td><?php echo e($data->nik); ?></td>
                                                <td><?php echo e($data->nama); ?></td>
                                                <td><?php echo e($data->email); ?></td>
                                                <td><?php echo e($data->jenis_kelamin); ?></td>
                                                <td><?php echo e($data->alamat); ?></td>
                                                <td><a onClick="return confirm('Yakin dihapus ?' )" href="/dashboard/dokter/hapus/<?php echo e($data->id_dokter); ?>">Hapus</a> / <a href="/dashboard/dokter/edit/<?php echo e($data->id_dokter); ?>">Edit</a> / <a href="/dashboard/dokter/detail/<?php echo e($data->id_dokter); ?>">Detail</a></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php echo e($data_dokter->links()); ?>

                            </div>
                        </div>
                    </div>
                   
                </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/daftar-dokter.blade.php ENDPATH**/ ?>