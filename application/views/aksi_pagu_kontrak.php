<div class="content-wrapper">
    <section class="content">
        <?php foreach ($aksi_pagu_kontrak as $ak) { ?>
            <form action="<?php echo base_url() . 'aksi_pagu_kontrak/update'; ?>" method="post">

                <div class="form-group">
                    <label>Vendor</label>
                    <input type="text" name="VENDOR_NAMA" class="form-control" disabled value="<?php echo $ak->VENDOR_NAMA ?>">
                </div>

                <div class="form-group">
                    <label>Paket</label>
                    <input type="text" name="PAKET_JENIS" class="form-control" value="<?php echo $ak->PAKET_JENIS ?>">
                </div>

                <div class="form-group">
                    <label>Pagu Kontrak</label>
                    <input type="text" name="PAGU_KONTRAK" class="form-control" value="<?php echo $ak->PAGU_KONTRAK ?>">
                </div>

                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
        <?php } ?>
    </section>

</div>