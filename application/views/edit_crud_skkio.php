<div class="content-wrapper">
    <section class="content">
        <?php foreach ($crud_skkio as $cs) { ?>
            <form action="<?php echo base_url() . 'crud_skkio/update/'.$SKKI_ID; ?>" method="post">
            <input type="hidden" name="h_jenis" value="<?php echo $cs->SKKI_JENIS ?>">
            <input type="hidden" name="h_no" value="<?php echo $cs->SKKI_NO ?>">
            <input type="hidden" name="h_area" value="<?php echo $cs->AREA_KODE; ?>">
            <input type="hidden" name="h_nilai" value="<?php echo $cs->SKKI_NILAI?>">
            <input type="hidden" name="h_tanggal" value="<?php echo $cs->SKKI_TANGGAL ?>">
                <div class="form-group">
                    <label>No</label>
                    <input type="text" name="SKKI_ID" class="form-control" value="<?php echo $cs->SKKI_ID ?>">
                </div>
                <div class="form_group">
                    <label>SKKI JENIS</label>
                    <input type="text" name="SKKI_JENIS" class="form-control" value="<?php echo $cs->SKKI_JENIS ?>" readonly>
                </div>

                <div class="form-group">
                    <label>SKKI NO</label>
                    <input type="text" name="SKKI_NO" class="form-control" value="<?php echo $cs->SKKI_NO ?>">
                </div>

                <div class="form-group">
                    <label>KODE AREA</label>
                    <input type="text" name="AREA_KODE" id="AREA_KODE "class="form-control" value="<?php echo $cs->AREA_KODE ?>" readonly>
                    
                </div>

                <div class="form-group">
                    <label>SKKI NILAI</label>
                    <input type="number_format" name="SKKI_NILAI" class="form-control" value="<?php echo $cs->SKKI_NILAI?>">
                </div>

                <div class="form-group">
                    <label>SKKI_TERPAKAI</label>
                    <input type="number_format" name="SKKI_TERPAKAI" class="form-control" value="<?php echo $cs->SKKI_TERPAKAI?>">
                </div>

                <div class="form-group">
                    <label>SKKI TANGGAL</label>
                    <input type="date" name="SKKI_TANGGAL" class="form-control" value="<?php echo $cs->SKKI_TANGGAL ?>">
                </div>

                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
        <?php } ?>
    </section>

</div>