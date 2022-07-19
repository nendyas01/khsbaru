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
            SKRD
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">SKRD</li>
        </ol>
    </section>

    <font size="2" face="Arial">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">Input SKRD</header>
                        <div class="panel-body">
                            <form class="form-horizontal tasi-form" method="post" action="Skrd_submit">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">No. Surat Ke PTSP</label>
                                    <div class="col-sm-10">
                                        <select class="form-control m-b-10" name="var_no_surat_ptsp">
                                            <option value>-- Pilih No Surat Ke PTSP --</option>
                                            <?php foreach ($Skrd as $skrd) : ?>
                                                <option value="<?php echo $skrd->surat_ijin_no; ?>"> <?php echo $skrd->surat_ijin_no; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class=" col-sm-2 col-sm-2 control-label">Tanggal Terbit SKRD</label>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control" name="var_tgl_terbit_skrd" id="datepick">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Biaya Retribusi</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="var_biaya_retribusi" placeholder="Biaya Retribusi"></input>
                                    </div>
                                </div>

                                <div class="col-md-15" style="margin: 20px;">

                                    <div class="box box-solid" name="evidence_ret" id="evidence_ret">
                                        <div class="text-center">
                                            <h3 class="box-title" align="center">Evidence</h3>
                                        </div>
                                    </div>

                                    <div class="dropzone">
                                        <div class="dz-message">
                                            <h3>Drag and drop a file here or click</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-5.5 col-lg-11">
                                        <button type="submit" class="btn btn-primary" align="center" onclick="document.getElementById('submitForm').submit()">Submit</button>
                                    </div>
                                </div>

                                <script src="<?= base_url('assets/bootstrap/jquery/') . 'jquery3.js'; ?>"></script>
                                <script src="<?= base_url('assets/bootstrap/js/') . 'bootstrap.js'; ?>"></script>
                                <script src="<?= base_url('assets/dropify/js/') . 'dropify.js'; ?>"></script>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </section><!-- /.content -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

<script>
    Dropzone.autoDiscover = false;
    var file_upload = new Dropzone('.dropzone', {
        url: "<?= base_url('Multiupload/proses_upload') ?>",
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
            url: "<?= base_url('skrd/remove_file'); ?>",
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



</html>