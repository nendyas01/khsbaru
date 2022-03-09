<div class="content-wrapper">
    <section class="content">
        <?php foreach ($crud_vendor as $cv) { ?>
            <form action="<?php echo base_url() . 'crud_vendor/update'; ?>" method="post">

                <div class="form-group">
                    <label>ID</label>
                    <input type="number_format" name="VENDOR_ID" class="form-control" value="<?php echo $cv->VENDOR_ID ?>">
                </div>

                <div class="form-group">
                    <label>Nama Vendor</label>
                    <input type="text" name="VENDOR_NAMA" class="form-control" value="<?php echo $cv->VENDOR_NAMA ?>">
                </div>

                <div class="form-group">
                    <label>Tahun </label>
                    <input type="number_format" name="TAHUN" class="form-control" value="<?php echo $cv->TAHUN ?>">
                </div>

                <div class="form-group">
                    <label>Direksi Vendor </label>
                    <input type="text" name="DIREKSI_VENDOR" class="form-control" value="<?php echo $cv->DIREKSI_VENDOR ?>">
                </div>

                <div class="form-group">
                    <label>Email </label>
                    <input type="text" name="EMAIL" class="form-control" value="<?php echo $cv->EMAIL ?>">
                </div>

                <div class="form-group">
                    <label>Telepon </label>
                    <input type="number_format" name="TELEPON" class="form-control" value="<?php echo $cv->TELEPON ?>">
                </div>

                <div class="form-group">
                    <label>Status </label>
                    <input type="number_format" name="STATUS" class="form-control" value="<?php echo $cv->STATUS ?>">
                </div>

                <div class="form-group">
                    <label>Email_2 </label>
                    <input type="text" name="EMAIL_2" class="form-control" value="<?php echo $cv->EMAIL_2 ?>">
                </div>

                <div class="form-group">
                    <label>Jabatan </label>
                    <input type="text" name="JABATAN" class="form-control" value="<?php echo $cv->JABATAN ?>">
                </div>

                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
        <?php } ?>
    </section>

</div>