
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
                                <?php echo csrf_field(); ?>
                                <p><b>Filter berdasarkan tanggal</b></p>
                                <?php if(isset($data)): ?>
                                 <p style="color: green"><?php echo e($data); ?></p>
                                <?php endif; ?>
                                    <label for="">Dari</label>
                                    <input name="from" type="date">
                                    <label for="">Sampai</label>
                                    <input name="to" type="date">
                                    <button class="btn btn-primary">Submit</button>
                                </form>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Manufaktur</th>
                                            <th>Semua Stok</th>
                                            <th>Harus Dibayar</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $laporan_obat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($laporan_obat->firstItem() + $no); ?></td>
                                        <td><?php echo e($data->manufaktur); ?></td>
                                        <td><?php echo e(number_format($data->semua_stok)); ?></td>
                                        <td>Rp. <?php echo e(number_format($data->harus_dibayar)); ?></td>
                                        <?php $ex_name = str_replace(' ', '-', $data->manufaktur); ?>
                                        <td><a href="/dashboard/report/manufaktur-obat/<?php echo e($ex_name); ?>" class="btn btn-primary">Lihat</a></td>
                                    </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php echo e($laporan_obat->links()); ?>

                            </div>
                        </div>
                    </div>
                   
                </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/daftar-laporan-supplier.blade.php ENDPATH**/ ?>