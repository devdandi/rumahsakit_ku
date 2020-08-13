
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Detail Manufaktur</div>
                                <button onClick="alert('ok')" class="btn btn-primary">Export ke excel</button>
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
                                            <th>Manufaktur</th>
                                            <th>Nama Obat</th>
                                            <th>Stok Awal</th>
                                            <th>Terjual</th>
                                            <th>Sisa Stok</th>
                                            <th>Pendapatan</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $total = 0; ?>
                                    <?php $terjual = 0; ?>

                                    <?php $__currentLoopData = $get_obata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $obat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($get_obata->firstItem() + $no); ?></td>
                                                <td><?php echo e($data['supplier']); ?></td>
                                                <td><?php echo e($data['nama_obat'][$no]); ?></td>
                                                <td><?php echo e($data['stok_awal'][$data['nama_obat'][$no]]); ?></td>
                                                <td><?php echo e($data['detail_stok'][$data['nama_obat'][$no]]); ?></td>
                                                <td><?php echo e($data['stok_asli'][$data['nama_obat'][$no]]); ?></td>
                                                <td>Rp. <?php echo e(number_format($data['detail_stok'][$data['nama_obat'][$no]] * $obat->harga)); ?></td>
                                                <td><?php echo e($data['status'][$data['nama_obat'][$no]]); ?></td>

                                                <?php $terjual += $data['detail_stok'][$data['nama_obat'][$no]]; ?>
                                                <?php $total += $data['detail_stok'][$data['nama_obat'][$no]] * $obat->harga; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <h5><b>Total: Rp.<?php echo e(number_format($total)); ?></b></h5>
                                <h5><b>Terjual: <?php echo e(number_format($terjual)); ?></b></h5>

                                </div>
                            </div>
                        </div>
                    </div>   
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/detail-manufaktur-obat.blade.php ENDPATH**/ ?>