
<?php $__env->startSection('content'); ?>

<script type="text/javascript">
  $(document).ready(function() {
      $('#spesialis').select2({
       placeholder: "Pilih...",
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
                                <div class="ibox-title">Edit Akun</div>
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
                            <div class="ibox-body">
                                <form class="form-horizontal" method="post" action="">
                                <?php echo csrf_field(); ?>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="nama" value="<?php echo e($data[0]->name); ?>" type="text" placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                        <small id="checking" hidden="">Checking...</small>
                                        <small id="status-ada" style="color:red" hidden="">Email telah terdaftar</small>
                                        <small id="status-a" style="color:green" hidden="">Email tersedia</small>
                                            <input class="form-control" name="email" id="email" value="<?php echo e($data[0]->email); ?>" type="text" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Level</label>
                                        <div class="col-sm-10">
                                            <select name="level" id="" class="form-contol">
                                            <option value="">Pilih</option>
                                                <option>Administrator</option>
                                                <option>Pengguna</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <select name="jabatan" id="jabatan" class="form-contol">
                                            <option value="">Pilih</option>
                                                <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jabatan1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($jabatan1->jabatan); ?>"><?php echo e($jabatan1->jabatan); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                         <div hidden="" id="spesialis-new" class="form-group row">
                                        <label class="col-sm-2 col-form-label">Spesialis</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="spesialis[]" style="width: 200px;" id="spesialis" multiple="multiple">
                                                <?php $__currentLoopData = $spesialis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spesialis1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($spesialis1->spesialis); ?>"><?php echo e($spesialis1->spesialis); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="password-manual" class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status Akun</label>
                                        <div class="col-sm-10">
                                            <select name="status" id="">
                                                <option value="<?php echo e($data[0]->status); ?>"><?php echo e($data[0]->status); ?></option>
                                                <option value="block">block</option>
                                                <option value="aktif">aktif</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div id="password-manual" class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input id="password-input-manual" class="form-control" name="password" type="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Foto</label>
                                        <div class="col-sm-10">
                                            <img src="<?php echo e(url('assets/img/admin-avatar.png')); ?>" alt="">
                                            <p style="color: red;"><i>Foto tidak dapat diubah, hanya dapat diubah oleh pemilik akun !</i></p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <button id="buttons" class="btn btn-success" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
</div>

<script>
    $(document).ready(function(){
        $('#password-manual-c').click(function(){
            $('#password-manual').attr('hidden','')
            $('#password-otomatis').removeAttr('hidden','')
        })
        $('#password-otomatis-c').click(function(){
            $('#password-manual').removeAttr('hidden','')
            $('#password-otomatis').attr('hidden','')
        })
        $('#jabatan').change(function(){
            if(this.value == "Dokter")
            {
                $('#spesialis-new').removeAttr('hidden','')
            }else{
                $('#spesialis-new').attr('hidden','')

            }
        })
        $('#email').change(function(){
            if(this.value == ''){
                $('#status-ada').attr('hidden','')
                $('#checking').attr('hidden','')
                $('#status-a').attr('hidden','')
            }else{
                let data = "email=" + $('#email').val()
                $.ajax({

                    url: '/akun/check',   // sending ajax request to this url
                    type: 'get',
                    data: data,

                // before ajax request
                beforeSend: function() {
                    $('#checking').removeAttr('hidden','')

                },	

                // on success response
                success:function(response) {
                    if(response == 1) {
                        $('#buttons').attr('disabled','')
                        $('#status-ada').removeAttr('hidden','')
                        $('#checking').attr('hidden','')
                    }else{
                        $('#buttons').removeAttr('disabled','')

                        $('#checking').attr('hidden','')
                        $('#status-a').removeAttr('hidden','')

                    }
                },

                // error response
                error:function(e) {
                    $("#result").html("Some error encountered.");
                }

                });
            }
        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('root.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\rumahsakit\resources\views/edit-akun.blade.php ENDPATH**/ ?>