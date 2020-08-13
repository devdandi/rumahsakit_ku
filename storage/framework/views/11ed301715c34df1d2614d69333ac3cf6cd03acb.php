
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Daftar Pasien</div>
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
                                            <th>No Antrian</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Golongan Darah</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <?php $__currentLoopData = $pasien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $pasiens): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                            <tr>
                                                <td><?php echo e($pasien->firstItem() + $no); ?></td>
                                                <td><?php echo e($pasiens->nama); ?></td>
                                                <td><?php echo e($pasiens->no_antrian); ?></td>
                                                <td><?php echo e($pasiens->jenis_kelamin); ?></td>
                                                <td><?php echo e($pasiens->golongan_darah); ?></td>
                                                <!-- <?php if($pasiens->status == "dirawat"): ?>
                                                    <td style="color: red">DIRAWAT</td>
                                                <?php endif; ?>
                                                <?php if($pasiens->status == "sembuh"): ?>
                                                    <td style="color: green">SEMBUH</td>
                                                <?php endif; ?> -->
                                                <td style="color: red"><?php echo e($pasiens->status); ?></td>
                                                <?php if($get_data[0]->level == "Dokter" || $get_data[0]->level == "Suster") { ?>
                                                    <td><a class="btn btn-warning" href="/dashboard/pasien/edit/<?php echo e($pasiens->id_pasien); ?>">Periksa</a></td>
                                                <?php }else{ ?>
                                                    <td>Tidak ada akses</td>
                                                <?php } ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                                <?php echo e($pasien->links()); ?>


                            </div>
                        </div>
                    </div>
                
                
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/daftar-pasien.blade.php ENDPATH**/ ?>