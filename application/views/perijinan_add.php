<div class="content-wrapper">
    <section class="content">
        <?php foreach ($perijinan_add as $pa) { ?>
            <form action="<?php echo base_url() . 'perijinan_add/update'; ?>" method="post">

                <!-- no spj -->
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">No. SPJ</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="spj_no" id="spj_no" value="<?php echo $pa->spj_no ?>">
                    </div>
                </div>

                <!-- no surat ke ptsp -->
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">No. Surat Ke PTSP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="surat_ijin_no" id="surat_ijin_no" placeholder="No. Surat Ke PTSP">
                    </div>
                </div>

                <!-- tanggal surat -->
                <div class="form-group">
                    <label class=" col-sm-2 col-sm-2 control-label">Tanggal Surat</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tgl_surat" id="datepick">
                    </div>
                </div>

                <!-- Pekerjaan -->
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Pekerjaan</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan"></div>
                </div>

                <!-- Kota Administrasi -->
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Kota Administrasi</label>
                    <div class="col-sm-10">
                        <select class="form-control m-b-10" name="kota_adm">
                            <option value="">- Pilih Kota Administrasi -</option>
                            <option value="JAKARTA BARAT">Jakarta Barat</option>
                            <option value="JAKARTA PUSAT">Jakarta Pusat</option>
                            <option value="JAKARTA SELATAN">Jakarta Selatan</option>
                            <option value="JAKARTA TIMUR">Jakarta Timur</option>
                            <option value="JAKARTA UTARA">Jakarta Utara</option>
                            <option value="KEP. SERIBU">Kepulauan Seribu</option>
                        </select>
                    </div>
                </div>

                <!-- lokasi -->
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Lokasi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="lokasi" placeholder="Lokasi"></textarea>
                    </div>
                </div>

                <?php
                if (isset($err)) {
                ?>
                    <tr>
                        <td colspan='4'>
                            <font color="red"><?php echo $err; ?></font>
                        </td>
                    </tr>
                <?php
                }
                ?>

                <input type="button" class="btn btn-info" value="Kembali" onclick="history.back(-1)" />
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>

        <?php } ?>
    </section>
</div>