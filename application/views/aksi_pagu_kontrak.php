<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Aksi Pagu Kontrak</h3>
                    </div>
                    <form role="form">
                        <div class="box-body">
                            <?php foreach ($aksi_pagu_kontrak as $ak) { ?>
                                <form action="<?php echo base_url() . 'aksi_pagu_kontrak/update'; ?>" method="post">

                                    <div class="form-group">
                                        <label>Vendor</label>
                                        <input type="text" name="VENDOR_NAMA" class="form-control" disabled value="<?php echo $ak->VENDOR_NAMA ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Paket</label>
                                        <input type="text" name="PAKET_JENIS" class="form-control">
                                    </div>

                                    <div class=" form-group">
                                        <label>Pagu Kontrak</label>
                                        <input type="text" name="PAGU_KONTRAK" class="form-control">
                                    </div>
                                    <input type="button" class="btn btn-info" value="Kembali" onclick="history.back(-1)" />
                                    <button type="reset" class="btn btn-danger">Reset</button>

                                    <button type="submit" id="submit" class="btn btn-info">Submit</button>

                                    <script src="<?= base_url('assets/bootstrap/jquery/') . 'jquery3.js'; ?>"></script>
                                    <script src="<?= base_url('assets/bootstrap/js/') . 'bootstrap.js'; ?>"></script>
                                    <script src="<?= base_url('assets/dropify/js/') . 'dropify.js'; ?>"></script>
                                </form>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>