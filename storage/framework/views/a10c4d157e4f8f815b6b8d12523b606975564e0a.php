
<?php $__env->startSection('content'); ?>

<script type="text/javascript">
  $(document).ready(function() {
      $('#spesialis').select2({
        placeholder: " Pilih...",
        allowClear: true,
        language: "id"
      });
      $('#resep-obat').select2({
        placeholder: " Pilih...",
        allowClear: true,
        language: "id"
    });
  });
 </script>
<div class="content-wrapper">
<div class="page-content fade-in-up">
<div class="col-md">
                        <div class="ibox">
                            <?php if($message = Session::get('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e($message); ?>

                            </div>
                            <?php endif; ?>
                            <?php if($messages = Session::get('error')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e($messages); ?>

                            </div>
                            <?php endif; ?>
                            <div id="print" class="ibox-body">
                                <center><h2>Pembayaran Berhasil</h2></center>
                                <hr>
                                <?php $da = explode(" ",$get_transaksi[0]->created_at); ?>
                                    <p>Hari & Tanggal: <b><?php echo e($get_transaksi[0]->day); ?>, <?php echo e($get_transaksi[0]->created_at); ?></b></p>
                                <h5><b>Detail Pasien</b></h5>
                                <hr>
                                <p>NIK: <?php echo e($get_pasien[0]->nik); ?></p>
                                <p>Nama: <?php echo e($get_pasien[0]->nama); ?></p>
                                <p>Jenis Kelamin: <?php echo e($get_pasien[0]->jenis_kelamin); ?></p>
                                <hr>
                                <h5><b>Detail Transaksi</b></h5>
                                <hr>
                                <?php $json = json_decode($get_transaksi[0]->data);?>
                                    <?php $__currentLoopData = $json; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $c = json_decode($datas); ?>
                                        <p><?php echo e($c->nama_obat); ?> ( Rp.<?php echo e(number_format($c->harga)); ?> ) x ( <?php echo e($c->data); ?> )</p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <p>Lain-Lain: Rp. 0</p>
                                    <hr>
                                    <h5><b>Detail Pembayaran</b></h5>
                                    <hr>
                                    <h5><b>Subtotal : Rp. <?php echo e(number_format($get_transaksi[0]->total)); ?></b></h5>
                                    <h5><b>Cash : Rp. <?php echo e(number_format($get_transaksi[0]->cash)); ?></b></h5>
                                    <h5><b>Kembali : Rp. <?php echo e(number_format($get_transaksi[0]->kembali)); ?></b></h5>
                                    <hr>
                                   

                            </div>
                            
                        </div>
                        <button class="btn btn-primary" onClick="print()">Cetak Invoice</button>
                                    <a href="/dashboard">Kembali</a>
                    </div>
</div>

<script>
   function print()
   {
    var divToPrint = document.getElementById('print');
    var popupWin = window.open('', '_blank');
    popupWin.document.open();
    popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
    popupWin.document.close();
   }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/payment.blade.php ENDPATH**/ ?>