
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="page-content fade-in-up">
                    <div class="col-md">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Status Covid Indonesia</div>
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
                                            <th>Nama Negara</th>
                                            <th>Positif</th>
                                            <th>Sembuh</th>
                                            <th>Meninggal Dunia</th>
                                            <th>Dirawat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $json = json_decode($status_covid); ?>
                                        <tr>
                                            <td><?php echo e($json[0]->name); ?></td>
                                            <td><?php echo e($json[0]->positif); ?></td>
                                            <td><?php echo e($json[0]->sembuh); ?></td>
                                            <td><?php echo e($json[0]->meninggal); ?></td>
                                            <td><?php echo e($json[0]->dirawat); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/status-covid.blade.php ENDPATH**/ ?>