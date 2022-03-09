<div class="content-wrapper">
    <section class="content">
        <?php foreach ($crud_paket as $cp) { ?>
            <form action="<?php echo base_url() . 'crud_paket/update'; ?>" method="post">

                <div class="form-group">
                    <label>Paket Jenis</label>
                    <input type="number_format" name="PAKET_JENIS" class="form-control" value="<?php echo $cp->PAKET_JENIS ?>">
                </div>

                <div class="form-group">
                    <label>Paket Deskripsi</label>
                    <input type="text" name="PAKET_DESKRIPSI" class="form-control" value="<?php echo $cp->PAKET_DESKRIPSI ?>">
                </div>

                <div class="form-group">
                    <label>Satuan </label>
                    <input type="text" name="SATUAN" class="form-control" value="<?php echo $cp->SATUAN ?>">
                </div>

                <div class="form-group">
                    <label>Paket Deskripsi </label>
                    <input type="text" name="PAKET_DESKRIPSI2" class="form-control" value="<?php echo $cp->PAKET_DESKRIPSI2 ?>">
                </div>

                <div class="form-group">
                    <label>Status </label>
                    <input type="number_format" name="STATUS" class="form-control" value="<?php echo $cp->STATUS ?>">
                </div>

                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
        <?php } ?>
    </section>

</div>