<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pengelolaan Pelanggaran
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Pengelolaan Pelanggaran</li>
        </ol>
    </section>

    <section class="content">
        <font size="2" face="Arial">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">

                        <header class="panel-heading">Input Sanksi SPJ</header>
                        <div class="panel-body" onload=disableselect();>

                            <form class="form-horizontal tasi-form" method="post" action="bayar_retribusi_submit.php">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" for="inputSuccess">Area</label>
                                    <div class="col-sm-10">

                                        <input type="text" name="area" id="area" placeholder="Masukan Nama Area" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" for="inputSuccess">Nomor SPJ</label>
                                    <div class="col-sm-10">

                                        <input type="text" name="spj" id="spj" placeholder="Masukan Nomor SPJ" class="form-control">
                                        <!-- <select class="form-control m-b-10" name="spj_no"> -->


                                        <!-- <option value>-- NO SPJ --</option>
                                            <?php foreach ($nomorspj as $ns) : ?>
                                                <option value="<?php echo $ns->SPJ_DESKRIPSI; ?>"> <?php echo $ns->SPJ_NO; ?></option>
                                            <?php endforeach; ?>
                                        </select> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                        <div class="col-md-5 form-group">
                                            <div class="alert alert-info" id="spjdata">
                                                <strong>Silahkan Memilih No SPJ!</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Jenis Sanksi</label>
                                    <div class="col-sm-10" id="no_add">
                                        <input type="radio" name="jenis_sanksi" value="P1-SPJ" checked=""> Tidak Dapat Menyelesaikan Pekerjaan Sesuai Waktu
                                    </div>

                                    <div class="col-sm-10">
                                        <input type="radio" name="jenis_sanksi" value="PUTUS-SPJ"> Mendapat Denda Maksimal SPJ
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class=" col-sm-2 col-sm-2 control-label">Tanggal Kejadian</label>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control" name="tgl_kejadian" id="tgl_kejadian">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="var_keterangan" id="var_keterangan"></textarea>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class=" col-sm-4 col-sm-2 control-label">Evidence</label>
                                        <div class="col-md-6">

                                            <div class="dropzone">
                                                <div class="dz-message">
                                                    <h3>Drop dan Drag Disini untuk upload</h3>
                                                </div>
                                            </div>

                                            <!-- <?= $this->session->flashdata('message'); ?>
                                            <form action="" method="post" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <input type="file" name="image" class="dropify">
                                                </div>

                                            </form> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-info" onclick="document.getElementById('submitForm').submit()">Submit</button>
                                    </div>
                                </div>

                                <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
                                <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

                                <script type='text/javascript' src='<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>'></script>
                                <script type='text/javascript' src='<?php echo base_url() . 'assets/js/bootstrap.js' ?>'></script>
                                <script type='text/javascript' src='<?php echo base_url() . 'assets/js/jquery-ui.js' ?>'></script>

                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

                                <script type='text/javascript'>
                                    $(document).ready(function() {
                                        $('#spj').autocomplete({
                                            source: "<?php echo site_url('inp_sanksi_spj/get_autofill/?') ?>",

                                        });
                                    });
                                </script>

                                <script type='text/javascript'>
                                    $(document).ready(function() {
                                        $('#area').autocomplete({
                                            source: "<?php echo site_url('inp_sanksi_spj/get_autocomplete/?') ?>",

                                        });
                                    });
                                </script>

                                <script>
                                    Dropzone.autoDiscover = false;
                                    var file_upload = new Dropzone('.dropzone', {
                                        url: "<?= base_url('inp_sanksi_spj/proses_upload') ?>",
                                        method: "post",
                                        paramName: "userFile",
                                        maxFiles: 5,
                                        dictMaxFilesExceeded: "Maximum upload file adalah 5",
                                        acceptedFiles: "application/pdf",
                                        dictInvalidFileType: "File ini tidak diizinkan",
                                        maxFilesize: 1, //MB
                                        dictFileTooBig: "File size terlalu besar, upload minimal 1 MB",
                                        addRemoveLinks: true,
                                    });

                                    file_upload.on('sending', function(a, b, c) {
                                        a.token = Math.random();
                                        c.append('token', a.token);
                                        console.log(file_upload);
                                    });

                                    file_upload.on('removedfile', function(a) {
                                        var token = a.token;
                                        $.ajax({
                                            type: "post",
                                            data: {
                                                token: token
                                            },
                                            url: "<?= base_url('inp_sanksi_spj/remove_file'); ?>",
                                            cache: false,
                                            success: function() {
                                                console.log('file berhasil dihapus');
                                            },
                                            error: function() {
                                                console.log('gagal dihapus')
                                            }
                                        })
                                    })
                                </script>

                                <!-- <script>
                                    $(document).ready(function() {
                                        $('.dropify').dropify({
                                            messages: {
                                                default: 'Drag and drop a file here or click',
                                                replace: 'Ganti',
                                                remove: 'Hapus',
                                                error: 'error'
                                            }
                                        });
                                    });
                                </script> -->


                            </form>
                        </div>
                    </section>
                </div>
            </div>
    </section><!-- /.content -->
</div>



</html>