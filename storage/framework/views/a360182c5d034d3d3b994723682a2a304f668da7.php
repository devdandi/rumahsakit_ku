
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Detail Purchase Order #<?php echo e($nama); ?></div>
                                <a class="btn btn-primary" onclick="return confirm('Setujui semua ? ')" href="/dashboard/purchase-order/approve/<?php echo e($id); ?>">Setujui</a>
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
                                            <th>QTY ( Jumlah Beli )</th>
                                            <th>Harga ( Sebelumnya )</th>
                                            <th>Total</th>
                                            <!-- <th>Generate by</th> -->
                                            <th>Status</th>
                                            <!-- <th>Send to</th> -->
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $subtotal = 0; ?>
                                        <?php $__currentLoopData = $get_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num => $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
                                            <tr>
                                                <td><?php echo e($get_list->firstItem() + $num); ?></td>
                                                <td><?php echo e($nama); ?></td>
                                                <?php if($datas->id_obat == 0): ?>
                                                    <td style="color: blue"><?php echo e($datas->nama_obat); ?></td>
                                                <?php endif; ?>
                                                <?php if($datas->id_obat != 0): ?>
                                                    <td><?php echo e($dataa['details'][$datas->id_obat]); ?></td>
                                                <?php endif; ?>
                                                <td><?php echo e($datas->satuan); ?></td>
                                                <td><?php echo e($datas->jumlah); ?></td>
                                                <?php if(in_array($datas->id_obat, $dataa['details']['details_id'], TRUE)): ?>
                                                    <td>Rp. <?php echo e(number_format($dataa['details']['harga'][$datas->id_obat])); ?></td>
                                                <?php endif; ?>
                                                <?php if(!in_array($datas->id_obat, $dataa['details']['details_id'], TRUE)): ?>
                                                    <td style="color: blue">Rp. 0</td>
                                                <?php endif; ?>


                                                <?php if(in_array($datas->id_obat, $dataa['details']['details_id'], TRUE)): ?>
                                                    <td>Rp. <?php echo e(number_format($dataa['details']['harga'][$datas->id_obat] * $datas->jumlah)); ?></td>
                                                    <?php $subtotal += $dataa['details']['harga'][$datas->id_obat] * $datas->jumlah; ?>
                                                <?php endif; ?>
                                                <?php if(!in_array($datas->id_obat, $dataa['details']['details_id'], TRUE)): ?>
                                                    <td style="color: blue">Rp. 0</td>
                                                <?php endif; ?>
                                                <td><?php echo e($datas->status); ?></td>
                                                <td><a href="/dashboard/purchase-order/edit/<?php echo e($datas->id); ?>">Edit</a> / <a onclick="return confirm('Hapus ?') " href="/dashboard/purchase-order/hapus/<?php echo e($datas->id); ?>">Hapus</a></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </tbody>
                                </table>
                                <h5><b>Subtotal: Rp <?php echo e(number_format($subtotal)); ?></b></h5>
                                <?php echo e($get_list->links()); ?>

                                </div>
                                <small style="color: red">* Warna biru adalah obat yang baru atau tidak ditemukan di database !</small>
                            </div>
                        </div>
                    </div>   
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/detail-purchase-order.blade.php ENDPATH**/ ?>