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
        <font size="2" face="Arial">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">PERSETUJUAN SURVEY</header>
                        <div class="panel-body" onload=disableselect();>
                            <?php if ($this->session->flashdata('sukses')) : ?>
                                <div class="callout callout-success">
                                    <h4>Sukses!</h4>
                                    <?= $this->session->flashdata('sukses'); ?>
                                </div>
                            <?php elseif ($this->session->flashdata('gagal')) : ?>
                                <div class="callout callout-danger">
                                    <h4>Warning!</h4>
                                    <?= $this->session->flashdata('gagal'); ?>
                                </div>
                            <?php endif; ?>
                            <form class="form-horizontal tasi-form" method="post" action="ba_survey_submit">
                                <!-- <header class="panel-heading">PERSETUJUAN SURVEY</header> -->
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            <label name="var_no_persetujuan" id="no_persetujuan">
                                                <label class="radio-inline">
                                                    <input type="radio" name="option_persetujuan" id="radio_rev" value="1" onchange="disable();">
                                                    Perlu Revisi
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="option_persetujuan" id="radio_ba" value="0" onchange="enable();">
                                                    BA Survey
                                                </label>
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
                                            <?= form_error('var_no_surat_ptsp', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>


                                <header class="panel-heading">BA Survey</header>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class=" col-sm-2 col-sm-2 control-label">Tanggal Survey</label>
                                        <div class="col-md-2">
                                            <input type="date" class="form-control" name="var_tgl_survey" id="datepick">
                                            <?= form_error('var_tgl_survey', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Hasil Survey</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="var_hasil_survey" id="var_hasil_survey" placeholder="Hasil Survey"></textarea>
                                            <?= form_error('var_hasil_survey', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button type="submit" id="submit" class="btn btn-info">Submit</button>
                                        </div>
                                    </div>

                                </div>


                            </form>
                        </div>
                    </section>
                </div>
            </div>
    </section>
</div>