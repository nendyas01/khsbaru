<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url('assets/dropify/css/') . 'dropify.css'; ?>">
</head>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pengelolaan Pelanggaran
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pengelolaan Pelanggaran</li>
        </ol>
    </section>

    <section class="content">
        <font size="2" face="Arial">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">

                        <header class="panel-heading">Input SSanksi SPJ</header>
                        <div class="panel-body" onload=disableselect();>

                            <form class="form-horizontal tasi-form" method="post" action="bayar_retribusi_submit.php">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" for="inputSuccess">Area</label>
                                    <div class="col-sm-10">
                                        <select class="form-control m-b-10" name="KODEAREA">
                                            <option value>-- Area --</option>
                                            <?php foreach ($areaspj as $na) : ?>
                                                <option value="<?php echo $na->AREA_KODE; ?>"> <?php echo $na->AREA_NAMA; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" for="inputSuccess">Area</label>
                                    <div class="col-sm-10">
                                        <select class="form-control m-b-10" name="spj_no">
                                            <option value>-- NO SPJ --</option>
                                            <?php foreach ($nomorspj as $ns) : ?>
                                                <option value="<?php echo $ns->SPJ_DESKRIPSI; ?>"> <?php echo $ns->SPJ_NO; ?></option>
                                            <?php endforeach; ?>
                                        </select>
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
                                        <label class=" col-sm-4 col-sm-2 control-label">Evidence 1</label>
                                        <div class="col-md-6">

                                            <?= $this->session->flashdata('message'); ?>
                                            <form action="" method="post" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <input type="file" name="image" class="dropify">
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-info" onclick="document.getElementById('submitForm').submit()">Submit</button>
                                    </div>
                                </div>

                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

                                <script src="<?= base_url('assets/bootstrap/jquery/') . 'jquery3.js'; ?>"></script>
                                <script src="<?= base_url('assets/bootstrap/js/') . 'bootstrap.js'; ?>"></script>
                                <script src="<?= base_url('assets/dropify/js/') . 'dropify.js'; ?>"></script>
                                <script>
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
                                </script>


                            </form>
                        </div>
                    </section>
                </div>
            </div>
    </section><!-- /.content -->
</div>



</html>