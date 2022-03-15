<div class="content-wrapper">
    <section class="content">
        <?php foreach ($aksi_pagu_rating as $ar) { ?>
            <form action="<?php echo base_url() . 'aksi_pagu_rating/update'; ?>" method="post">

                <div class="form-group">
                    <label>Vendor</label>
                    <input type="text" name="VENDOR_ID" class="form-control" disabled value="<?php echo $ar->VENDOR_ID ?>">
                </div>

                <div class="form-group">
                    <label>Rating</label>
                    <input type="text" name="RATING_LAPORAN_AUDIT" class="form-control" value="<?php echo $ar->RATING_LAPORAN_AUDIT ?>">
                </div>

                <div class="form-group">
                    <label>Limit</label>
                    <input type="text" name="FIN_LIMIT" class="form-control" value="<?php echo 'Rp ' . number_format($ar->FIN_LIMIT, 0, ',', '.') ?>">
                </div>

                <input type="button" class="btn btn-info" value="Kembali" onclick="history.back(-1)" />
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
        <?php } ?>
    </section>

</div>