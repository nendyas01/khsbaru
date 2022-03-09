<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url('assets/dropify/css/') . 'dropify.css'; ?>">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/basic.min.css">

</head>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Upload Bukti
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Upload Bukti</li>
        </ol>
    </section>

    <font size="2" face="Arial">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <div class="panel-body">
                            <form class="form-horizontal tasi-form" method="post" action="monitoring_submit.php">
                                <div class="form-group">


                                    <div class="col-md-15" style="margin: 10px;">
                                        <div class="box box-solid">

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

                                    <form action="" method="post" enctype="multipart/form-data">

                                        <div class="form-group">

                                        </div>
                                        <input type="button" class="btn btn-info" value="Kembali" onclick="history.back(-1)" />
                                        <button type="submit" class="btn btn-primary">Submit</button>

                                    </form>

                                    <script src="<?= base_url('assets/bootstrap/jquery/') . 'jquery3.js'; ?>"></script>
                                    <script src="<?= base_url('assets/bootstrap/js/') . 'bootstrap.js'; ?>"></script>
                                    <script src="<?= base_url('assets/dropify/js/') . 'dropify.js'; ?>"></script>
                                </div>
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
            url: "<?= base_url('retribusi/remove_file'); ?>",
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