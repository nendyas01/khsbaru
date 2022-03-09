<div class="content-wrapper">
    <section class="content">
        <?php foreach ($crud_user as $cu) { ?>
            <form action="<?php echo base_url() . 'crud_user/update'; ?>" method="post">

                <div class="form-group">
                    <label>USERNAME</label>
                    <input type="text" name="USERNAME" class="form-control" value="<?php echo $cu->USERNAME ?>">
                </div>

                <div class="form-group">
                    <label>ID Role</label>
                    <input type="number_format" name="ROLE_ID" class="form-control" value="<?php echo $cu->role_id ?>">
                </div>

                <div class="form-group">
                    <label>Kode Area </label>
                    <input type="number_format" name="AREA_KODE" class="form-control" value="<?php echo $cu->AREA_KODE ?>">
                </div>

                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
        <?php } ?>
    </section>

</div>