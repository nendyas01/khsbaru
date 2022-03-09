<div class="content-wrapper">
    <section class="content">

        <div class="row">
            <div class="col-md-12 ">
                <section class="panel">



                    <div class="panel-body">

                        <form action="<?php echo base_url() . 'perijinan_add/update'; ?>" method="post">

                            <div class="form-group">
                                <?php foreach ($perijinan_add as $pa) { ?>
                                    <label class="col-sm-2 col-sm-2 control-label">No. SPJ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="var_no_spj" id="var_no_spj" disabled value="<?php echo $pa->spj_no ?>">
                                    </div>
                                <?php } ?>
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
                                        <option value="">- Pilih Kota Administrasi -</option>>
                                        <option value="JAKARTA BARAT">Jakarta Barat</option>
                                        <option value="JAKARTA PUSAT">Jakarta Pusat</option>
                                        <option value="JAKARTA SELATAN">Jakarta Selatan</option>
                                        <option value="JAKARTA TIMUR">Jakarta Timur</option>
                                        <option value="JAKARTA UTARA">Jakarta Utara</option>
                                        <option value="KEP. SERIBU">Kepulauan Seribu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Lokasi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="var_lokasi" placeholder="Lokasi"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button name="Submit" type="submit" class="btn btn-info">Submit</button>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-1 col-lg-10">
                                    <button onclick="goBack() " class="btn btn-info">Kembali</button>
                                    <script>
                                        function goBack() {
                                            window.history.back();
                                        }
                                    </script>

                                </div>
                            </div>
                        </form>
                    </div>

                </section>
            </div>
        </div>
    </section>
</div>