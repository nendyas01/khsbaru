<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,600italic">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/basic.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="box-header with-border">
                <div class="text-center">
                    <h2 align="center">Tutorial Codeigniter</h2>
                    <h3 class="box-title"><?php echo $title ?></h3>
                </div>
            </div>

            <div class="col-md-12" style="margin: 10px;">
                <div class="box box-solid">
                    <div class="box-body">
                        <blockquote>
                            <p><b>Keterangan!!</b></p>
                            <small><cite title="Source title">Upload Multi File ini disimpan secara otomatis </cite></small>
                        </blockquote>
                    </div>
                </div>
                <div class="dropzone">
                    <div class="dz-message">
                        <h3>Drop dan Drag Disini untuk upload</h3>
                    </div>
                </div>
            </div>
        </div>
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
                url: "<?= base_url('Multiupload/remove_file'); ?>",
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

</body>

</html>