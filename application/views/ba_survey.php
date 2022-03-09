<div class="content-wrapper">
    <section class="content-header">

        <h1>
            BA Survey
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">BA Survey</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body">
                        <font size="2" face="Arial">
                            <form class="form-horizontal tasi-form" method="post">

                                <form class="form-horizontal tasi-form" method="post" action="ba_survey_submit.php">
                                    <section class="panel">
                                        <header class="panel-heading">PERSETUJUAN SURVEY</header>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <div class="col-lg-10">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="option_persetujuan" id="radio_rev" value="1" onchange="disable();">
                                                        Perlu Revisi
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="option_persetujuan" id="radio_ba" value="0" onchange="enable();">
                                                        BA Survey
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">No. Surat Ke PTSP</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control m-b-10" name="var_no_surat_ptsp">
                                                        <option value>-- Pilih No Surat Ke PTSP --</option>
                                                        <?php foreach ($ba_survey as $ijin) : ?>
                                                            <option value="<?php echo $ijin->surat_ijin_no; ?>"> <?php echo $ijin->surat_ijin_no; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="panel">
                                        <header class="panel-heading">BA Survey</header>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class=" col-sm-2 col-sm-2 control-label">Tanggal Survey</label>
                                                <div class="col-md-2">
                                                    <input type="date" class="form-control" name="var_tgl_survey" id="datepick">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Hasil Survey</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="var_hasil_survey" id="var_hasil_survey" placeholder="Hasil Survey"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button type="submit" class="btn btn-info" onclick="document.getElementById('submitForm').submit()">Submit</button>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                </form>
                            </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>