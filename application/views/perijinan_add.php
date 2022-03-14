<div class="content-wrapper">
    <section class="content">
        <?php foreach ($perijinan_add as $pa) { ?>
            <form action="<?php echo base_url() . 'perijinan/perijinan_add/'; ?>" method="post">

                <div class="form-group">

                    <label class="col-sm-2 col-sm-2 control-label">No. SPJ</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="spj_no" id="spj_no" disabled value="<?php echo $pa->spj_no ?>">
                    </div>

                </div>



                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">No. Surat Ke PTSP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="var_no_surat_ptsp" id="var_no_surat_ptsp" placeholder="No. Surat Ke PTSP">
                    </div>
                </div>

                <div class="form-group">
                    <label class=" col-sm-2 col-sm-2 control-label">Tanggal Surat</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="var_tgl_surat" id="datepick">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Pekerjaan</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="var_pekerjaan" placeholder="Pekerjaan"></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Kota Administrasi</label>
                    <div class="col-sm-10">
                        <select class="form-control m-b-10" name="var_kota_adm">
                            <option value="">- Pilih Kota Administrasi -</option>
                            <option value="JAKARTA BARAT">Jakarta Barat</option>
                            <option value="JAKARTA PUSAT">Jakarta Pusat</option>
                            <option value="JAKARTA SELATAN">Jakarta Selatan</option>
                            <option value="JAKARTA TIMUR">Jakarta Timur</option>
                            <option value="JAKARTA UTARA">Jakarta Utara</option>
                            <option value="KEP. SERIBU">Kepulauan Seribu</option>
                        </select>
                        </di v>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Lokasi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="var_lokasi" placeholder="Lokasi"></textarea>
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

                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="button" class="btn btn-info" value="Kembali" onclick="history.back(-1)" />
                        <tr>
                            <td colspan='4'><button type="submit" class="btn btn-info" onclick="document.getElementById('submitForm').submit()">Submit</button></td>
                        </tr>

                    </form>
                </div>
            </form>

        <?php } ?>
    </section>
</div>