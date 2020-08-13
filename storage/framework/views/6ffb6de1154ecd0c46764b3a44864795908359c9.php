
<?php $__env->startSection('content'); ?>

<script type="text/javascript">
  $(document).ready(function() {
      $('#spesialis').select2({
       placeholder: " Pilih...",
    allowClear: true,
    language: "id"
      });
      $('#jadwal').select2({
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
                            <div class="ibox-head">
                                <div class="ibox-title">Tambah Pasien</div>
                            </div>
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
                            <div id="pasien_baru" class="ibox-body">
                            
                                <form class="form-horizontal" method="post" action="">
                                <?php echo csrf_field(); ?>           
                                <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="nik" type="number" placeholder="NIK">
                                        </div>
                                    </div>   
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">No Antrian</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="no_antrian" readonly type="number" value="<?php echo e($no_antrian); ?>" placeholder="No antrian yang dipanggil">
                                        </div>
                                    </div>             
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="nama" type="text" placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea name="alamat" class="form-control" id="" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Penyakit</label>
                                        <div class="col-sm-10">
                                            <textarea name="penyakit" class="form-control" id="" cols="30" rows="3">Pisahkan setiap penyakit yang diderita dengan ' , '</textarea>
                                        </div>
                                    </div> -->
                                    <!-- <div id="spesialis-new" class="form-group row">
                                        <label class="col-sm-2 col-form-label">Ruangan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="ruangan" style="width: 200px;" id="jadwal">
                                            <?php $__currentLoopData = $ruangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ruangan1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($ruangan1->nama); ?>"><?php echo e($ruangan1->nama); ?> ( <?php echo e($ruangan1->jenis); ?> )</option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <p>Data yang ditampilkan adalah ruangan yang kosong.</p>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select name="jenis_kelamin" id="">
                                                <option>Pilih...</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Golongan Darah</label>
                                        <div class="col-sm-10">
                                            <select name="golongan_darah" id="">
                                                <option>Pilih...</option>
                                                <option>None</option>
                                                <option>A</option>
                                                <option>B</option>
                                                <option>AB</option>
                                                <option>O</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <button id="buttons" class="btn btn-success" type="submit">Submit</button>
                                            <a id="buttons" href='/dokter'>Kembali</a>
                                        </div>
                                    </div>
                                </form>
                                <input id="check_lama" type="checkbox">
                                <label for="">Pasien lama ?</label>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready( () => {
                        
                    })
                </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/pasien-tambah.blade.php ENDPATH**/ ?>