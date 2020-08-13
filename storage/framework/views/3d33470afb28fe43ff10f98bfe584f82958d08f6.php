
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Daftar Pasien Menunggu Obat</div>
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
                                            <th>Jenis Kelamin</th>
                                            <th>Golongan Darah</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                        <?php $__currentLoopData = $data_pasien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <tr>
                                                <td><?php echo e($no++); ?></td>
                                                <td><?php echo e($data->nik); ?></td>
                                                <td><?php echo e($data->nama); ?></td>
                                                <td><?php echo e($data->jenis_kelamin); ?></td>
                                                <td><?php echo e($data->golongan_darah); ?></td>
                                                <td><?php echo e($data->alamat); ?></td>
                                                <td style="color: red"><?php echo e($data->status); ?></td>
                                                <td><a class="btn btn-warning" href="/dashboard/pasien/obat/<?php echo e($data->id_pasien); ?>">Proses</a></td>
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
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/obat-pasien.blade.php ENDPATH**/ ?>