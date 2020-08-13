
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                    
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Laporan Keuangan</div>
                                <p><b>Jumlah Data: <?php echo e(number_format($datas->total())); ?></b></p>
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
                                <div hidden class="alert alert-danger" id="alerts" role="alert">
                                    Periksa tanggal !
                                </div>
                                <p style="color: green;" hidden id="waits">Mohon tunggu...</p>
                                <form class="form-group" id="forms" method="post" action="/dashboard/keuangan">
                                <?php echo csrf_field(); ?>
                                    <label for="">Dari</label>
                                    <input type="date" name="dari" id="dari">
                                    <label for="">Sampai</label>
                                    <input type="date" name="sampai" id="sampai">
                                    <button id="btns" class="btn btn-warning">Proses</button>
                                </form>
                                <?php if(isset($datas)){ ?>
                                    <table class="table" id="tables">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID Pasien</th>
                                            <th>CASH</th>
                                            <th>KEMBALI</th>
                                            <th>STATUS</th>
                                            <th>TANGGAL</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; $total = 0;?>
                                    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php echo e($data->id_pasien); ?></td>
                                            <td><?php echo e($data->cash); ?></td>
                                            <td><?php echo e($data->kembali); ?></td>
                                            <td><?php echo e($data->status); ?></td>
                                            <td><?php echo e($data->created_at); ?></td>
                                            <td><a  href="#">Detail</a> / <a href="#">Hapus</a></td>
                                            <?php $total += $data->cash - $data->kembali; ?>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>

                                <?php echo e($datas->links()); ?>

                                    <?php } ?> 
                                
                            </div>
                        </div>
                    </div>
                   
                </div>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/result-keuangan.blade.php ENDPATH**/ ?>