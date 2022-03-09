<div class="content-wrapper">
    <section class="content">
        <?php foreach ($crud_kontrak as $cpk) { ?>
            <form action="<?php echo base_url() . 'crud_kontrak/update'; ?>" method="post">

                <div class="form-group">
                    <label>VENDOR ID</label>
                    <input type="text" name="VENDOR_ID" class="form-control" value="<?php echo $cpk->VENDOR_ID ?>">
                </div>

                <div class="form-group">
                    <label>PAKET JENIS</label>
                    <input type="text" name="PAKET_JENIS" class="form-control" value="<?php echo $cpk->PAKET_JENIS ?>">
                </div>

                <div class="form-group">
                    <label>PAGU KONTRAK</label>
                    <input type="number_format" name="PAGU_KONTRAK" class="form-control" value="<?php echo 'Rp ' . number_format($cpk->PAGU_KONTRAK, 0, ',', '.') ?>">
                </div>

                <div class="form-group">
                    <label>TERPAKAI</label>
                    <input type="number_format" name="TERPAKAI" class="form-control" value="<?php echo 'Rp ' . number_format($cpk->TERPAKAI, 0, ',', '.') ?>">
                </div>

                <div class="form-group">
                    <label>RANKING</label>
                    <input type="text" name="RANKING" class="form-control" value="<?php echo $cpk->RANKING ?>">
                </div>

                <div class="form-group">
                    <label>NO PJN</label>
                    <input type="text" name="NO_PJN" class="form-control" value="<?php echo $cpk->NO_PJN ?>">
                </div>

                <div class="form-group">
                    <label>TANGGAL PJN</label>
                    <input type="date" name="TGL_PJN" class="form-control" value="<?php echo $cpk->TGL_PJN ?>">
                </div>

                <div class="form-group">
                    <label>NO RKS</label>
                    <input type="text" name="NO_RKS" class="form-control" value="<?php echo $cpk->NO_RKS ?>">
                </div>

                <div class="form-group">
                    <label>TANGGAL RKS</label>
                    <input type="date" name="TGL_RKS" class="form-control" value="<?php echo $cpk->TGL_RKS ?>">
                </div>

                <div class="form-group">
                    <label>NO SPP</label>
                    <input type="text" name="NO_SPP" class="form-control" value="<?php echo $cpk->NO_SPP ?>">
                </div>

                <div class="form-group">
                    <label>TANGGAL SPP</label>
                    <input type="date" name="TGL_SPP" class="form-control" value="<?php echo $cpk->TGL_SPP ?>">
                </div>

                <div class="form-group">
                    <label>NO PENAWARAN</label>
                    <input type="text" name="NO_PENAWARAN" class="form-control" value="<?php echo $cpk->NO_PENAWARAN ?>">
                </div>

                <div class="form-group">
                    <label>TANGGAL PENAWARAN</label>
                    <input type="date" name="TGL_PENAWARAN" class="form-control" value="<?php echo $cpk->TGL_PENAWARAN ?>">
                </div>

                <div class="form-group">
                    <label>SANKSI TERAKHIR</label>
                    <input type="text" name="sanksi_terakhir" class="form-control" value="<?php echo $cpk->sanksi_terakhir ?>">
                </div>

                <div class="form-group">
                    <label>ID SANKSI</label>
                    <input type="text" name="id_sanksi" class="form-control" value="<?php echo $cpk->id_sanksi ?>">
                </div>

                <div class="form-group">
                    <label>TANGGAL SANKSI</label>
                    <input type="date" name="tgl_sanksi" class="form-control" value="<?php echo $cpk->tgl_sanksi ?>">
                </div>

                <div class="form-group">
                    <label>TANGGAL AKHIR</label>
                    <input type="date" name="tgl_akhir" class="form-control" value="<?php echo $cpk->tgl_akhir ?>">
                </div>

                <div class="form-group">
                    <label>PUNISHMENT</label>
                    <input type="text" name="punishment" class="form-control" value="<?php echo $cpk->punishment ?>">
                </div>

                <div class="form-group">
                    <label>BLOCKED</label>
                    <input type="text" name="BLOCKED" class="form-control" value="<?php echo $cpk->BLOCKED ?>">
                </div>

                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
        <?php } ?>
    </section>
</div>