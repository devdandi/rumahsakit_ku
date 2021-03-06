        
        <?php $__env->startSection('content'); ?>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="row">
                        <?php if($get_data[0]->level == "Resepsionis"): ?>
                            <div class="col-lg-3 col-md-6">
                            <div class="ibox bg-danger color-white widget-stat">
                                <div class="ibox-body">
                                    <h2 class="m-b-5 font-strong"><?php echo e($antrian->no_antrian+1); ?></h2>
                                    <a style="color: white" href="/dashboard/antrian/tambah" class="m-b-5">Antrian Selanjutnya</a><i class="ti-user widget-stat-icon"></i>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                            <div class="ibox bg-danger color-white widget-stat">
                                <div class="ibox-body">
                                    <h2 class="m-b-5 font-strong"><?php echo e($antrian->no_antrian); ?></h2>
                                    <div class="m-b-5">Antrian Sebelumnya</div><i class="ti-user widget-stat-icon"></i>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                            <div class="ibox bg-danger color-white widget-stat">
                                <div class="ibox-body">
                                    <h2 class="m-b-5 font-strong"><?php echo e($jumlah_antrian-1); ?></h2>
                                    <div class="m-b-5">Jumlah Antrian</div><i class="ti-user widget-stat-icon"></i>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                            <div class="ibox bg-danger color-white widget-stat">
                                <div class="ibox-body">
                                    <h2 class="m-b-5 font-strong"><a class="btn btn-warning" onClick="return confirm('Yakin ingin reset ?, Saat direset data user anda akan disimpan ke database sebagai log agar tidak disalah gunakan.')" href="">Reset</a></h2>
                                    <div class="m-b-5">Reset Antrian</div><i class="ti-user widget-stat-icon"></i>
                                </div>
                            </div>
                    </div>
                    <?php endif; ?>
                                    
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo e($pembayaran); ?></h2>
                                <div class="m-b-5">Pembayaran Berhasil</div><i class="ti-shopping-cart widget-stat-icon"></i>
                                <div><i class="fa fa-level-up m-r-5"></i><small>0% higher</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo e($transaksi_sementara); ?></h2>
                                <div class="m-b-5">Belum Dibayar</div><i class="ti-bar-chart widget-stat-icon"></i>
                                <div><i class="fa fa-level-up m-r-5"></i><small>0% higher</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <h3 class="m-b-5 font-strong">Rp.<?php echo e(number_format($total_uang)); ?></h3>
                                <div class="m-b-5">Keuangan</div><i class="fa fa-money widget-stat-icon"></i>
                                <div><i class="fa fa-level-up m-r-5"></i><small>0% higher</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo e($total_pasien); ?></h2>
                                <div class="m-b-5">Pasien</div><i class="ti-user widget-stat-icon"></i>
                                <div><i class="fa fa-level-down m-r-5"></i><small>-0% Lower</small></div>
                            </div>
                        </div></div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="ibox">
                            <div class="ibox-body">
                                <div class="flexbox mb-4">
                                    <div>
                                        <h3 class="m-0">Grafik Pasien</h3>
                                        <div>Gratik Pasien mingguan</div>
                                    </div>
                                    <div class="d-inline-flex">
                                        <div class="px-3" style="border-right: 1px solid rgba(0,0,0,.1);">
                                            <div class="text-muted">Hari Ini</div>
                                            <div>
                                            
                                                <span class="h2 m-0"><?php echo e(count($date_pasien_harian)); ?></span>
                                                <span class="text-success ml-2"><i class="fa fa-level-up"></i> +25%</span>
                                                
                                            </div>
                                        </div>
                                        <div class="px-3">
                                            <div class="text-muted">Total</div>
                                            <div>
                                                <span class="h2 m-0"><?php echo e($total_pasien); ?></span>
                                                <span class="text-warning ml-2"><i class="fa fa-level-down"></i> -12%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <canvas id="bar_chart" style="height:260px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Status Covid-19</div>
                            </div>
                            <div class="ibox-body">
                                <!-- <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <canvas id="doughnut_chart" style="height:160px;"></canvas>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-b-20 text-success"><i class="fa fa-circle-o m-r-10"></i>Desktop 52%</div>
                                        <div class="m-b-20 text-info"><i class="fa fa-circle-o m-r-10"></i>Tablet 27%</div>
                                        <div class="m-b-20 text-warning"><i class="fa fa-circle-o m-r-10"></i>Mobile 21%</div>
                                    </div>
                                </div> -->
                                <?php $cd = json_decode($covid ?? ''); ?>
                                <ul class="list-group list-group-divider list-group-full">
                                    <li class="list-group-item">Positif
                                        <span class="float-right text-success"><i class="fa fa-caret-up"></i> <?php echo e($cd[0]->positif ?? ''); ?></span>
                                    </li>
                                    <li class="list-group-item">Sembuh
                                        <span class="float-right text-success"><i class="fa fa-caret-up"></i> <?php echo e($cd[0]->sembuh ?? ''); ?></span>
                                    </li>
                                    <li class="list-group-item">Meninggal
                                        <span class="float-right text-danger"><i class="fa fa-caret-down"></i> <?php echo e($cd[0]->meninggal ?? ''); ?></span>
                                    </li>
                                    <li class="list-group-item">Dirawat
                                        <span class="float-right text-danger"><i class="fa fa-caret-down"></i> <?php echo e($cd[0]->dirawat ?? ''); ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            <script>
                

    $(function() {
    var a = {
            labels: ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'],
            datasets: [{
                borderColor: 'rgba(52,152,219,1)',
                backgroundColor: 'rgba(52,152,219,1)',
                pointBackgroundColor: 'rgba(52,152,219,1)',
                data: [
                   <?php echo e(count($date_pasien['senin'])); ?>,
                   <?php echo e(count($date_pasien['selasa'])); ?>,
                   <?php echo e(count($date_pasien['rabu'])); ?>,
                   <?php echo e(count($date_pasien['kamis'])); ?>,
                   <?php echo e(count($date_pasien['jumat'])); ?>,
                   <?php echo e(count($date_pasien['sabtu'])); ?>,
                   <?php echo e(count($date_pasien['minggu'])); ?>,

            ]
            }]
        },
        t = {
            responsive: !0,
            maintainAspectRatio: !1
        },
        e = document.getElementById("bar_chart").getContext("2d");
    new Chart(e, {
        type: "line",
        data: a,
        options: t
    });

  var ctx4 = document.getElementById("doughnut_chart").getContext("2d");
  new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});


});
                
            
            </script>
            
            <?php $__env->stopSection(); ?>
 
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/index.blade.php ENDPATH**/ ?>