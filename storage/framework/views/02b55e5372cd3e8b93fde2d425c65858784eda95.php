
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Daftar Purchase Order</div>
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
                                            <th>Manufaktur</th>
                                            <th>Jumlah Transaksi</th>
                                            <th>Total Stok</th>
                                            <th>Status</th>
                                            <th>Satuan</th>
                                            <th>Dibuat oleh</th>
                                            <th>Tanggal</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $po; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num => $pos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($po->firstItem() + $num); ?></td>
                                            <td><?php echo e($pos->nama_manufaktur); ?></td>
                                            <td><?php echo e($pos->total_belanja); ?></td>
                                            <td><?php echo e($pos->total_stok); ?></td>
                                            <td><?php echo e($pos->status); ?></td>
                                            <td><?php echo e($pos->make_by); ?></td>
                                            <td><?php echo e($pos->created_at); ?></td>
                                            <td><a href="/dashboard/purchase-order/detail/<?php echo e($pos->id); ?>/<?php echo e($pos->nama_manufaktur); ?>">Detail</a> / <a href="#">Hapus</a></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                
                
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/daftar-purchase-order.blade.php ENDPATH**/ ?>