<div class="content-wrapper">
    <section class="content">
        <?php foreach ($crud_area as $car) { ?>
            <form action="<?php echo base_url() . 'crud_area/update'; ?>" method="post">

                <div class="form-group">
                    <label>AREA KODE</label>
                    <input type="text" name="AREA_KODE" class="form-control" value="<?php echo $car->AREA_KODE ?>">
                </div>

                <div class="form-group">
                    <label>AREA NAMA</label>
                    <input type="text" name="AREA_NAMA" class="form-control" value="<?php echo $car->AREA_NAMA ?>">
                </div>

                <div class="form-group">
                    <label>AREA ZONE</label>
                    <input type="text" name="AREA_ZONE" class="form-control" value="<?php echo $car->AREA_ZONE ?>">
                </div>

                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
        <?php } ?>
    </section>

</div>