
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Detail Purchase Order #<?php echo e($nama); ?></div>
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
                                            <th>Satuan</th>
                                            <th>Jumlah</th>
                                            <th>Harga ( Sebelumnya )</th>
                                            <!-- <th>Generate by</th> -->
                                            <th>Status</th>
                                            <!-- <th>Send to</th> -->
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $get_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num => $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($get_list->firstItem() + $num); ?></td>
                                                <td><?php echo e($datas->nama_manufaktur); ?></td>
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
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/detail-purchase-order.blade.php ENDPATH**/ ?>