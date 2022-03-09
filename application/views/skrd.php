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
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
                            <form class="form-horizontal tasi-form" method="post" action="skrd_input_submit.php">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">No. Surat Ke PTSP</label>
                                    <div class="col-sm-10">
                                        <select class="form-control m-b-10" name="var_no_surat_ptsp">
                                            <option value>-- Pilih No Surat Ke PTSP --</option>
                                            <?php foreach ($skrd as $skrd) : ?>
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
                                        <input type="text" class="form-control" name="var_biaya_retribusi" placeholder="Biaya Retribusi"></input>
                                    </div>
                                </div>

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
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

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

</html>