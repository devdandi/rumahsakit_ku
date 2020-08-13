
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Daftar Pengguna</div>
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
                                            <th>Level</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php $__currentLoopData = $get_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no++); ?></td>
                                            <td><?php echo e($data->nama); ?></td>
                                            <td><?php echo e($data->email); ?></td>
                                            <?php if($data->status == "aktif"): ?>{
                                                <td style="color: green;">AKTIF</td>
                                            <?php endif; ?>
                                            <?php if($data->status == "nonaktif"): ?>{
                                                <td style="color: orange">BELUM DIVERIFIKASI</td>
                                            <?php endif; ?>
                                            <?php if($data->status == "block"): ?>{
                                                <td style="color: red">DIBLOKIR</td>
                                            <?php endif; ?>
                                            <td><?php echo e($data->level); ?></td>
                                            <td><a href="/akun/edit/<?php echo e($data->id_user); ?>">Edit</a> / <a onClick="return confirm('Yakin ingin dihapus ?')" id="a-hapus" href="/akun/hapus/<?php echo e($data->id_user); ?>">Hapus</a> / <a href="/akun/detail">Detail</a></td>
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
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/daftar-akun.blade.php ENDPATH**/ ?>