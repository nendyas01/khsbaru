<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pengeolaan Progres
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Progress Pekerjaan</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">Progress Pekerjaan</header>
                    <div class="panel-body" onload=disableselect();>
                        <form class="form-horizontal tasi-form" method="post" action="inp_progress_kerja_submit.php">

                            <!-- no spj -->
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" for="inputSuccess">Nomor SPJ</label>
                                <div class="col-sm-10">


                                    <input type="text" name="spj" id="spj" placeholder="Masukan nama SPJ" class="form-control">

                                    <!-- <select class="form-control m-b-10" name="spj_no" id="spj_no">
                                        <option selected="0">-- NO SPJ --</option>
                                        <?php foreach ($nomorspj as $ns) : ?>
                                            <option value="<?php echo $ns->SPJ_DESKRIPSI; ?>"> <?php echo $ns->SPJ_NO; ?></option>
                                        <?php endforeach; ?>
                                    </select> -->
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nama Pengawas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="var_nama_pengawas" id="var_nama_pengawas">
                                </div>
                            </div> -->

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label"></label>
                                <div class="col-sm-10">

                                    <div class="col-md-6 form-group">
                                        <div class="alert alert-info" id="spj_data" name="spj_data">
                                            <strong>Silahkan Memilih No SPJ!</strong>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Progress Pekerjaan</label>
                                <div class="col-sm-10">
                                    <!--<input type="text" class="form-control" name="var_progress">-->
                                    <select class="form-control m-b-10" name="var_progress" id="var_progress">
                                        <option selected="0">-- Progres Pekerjaan --</option>
                                        <?php
                                        for ($i = 5; $i <= 100; $i += 5) {
                                            echo "<option value='$i'>$i%</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Realisasi</label>
                                <div class="col-sm-2">
                                    <div class="input-group m-b-10">
                                        <input type="text" class="form-control" name="var_realisasi" id="var_realisasi">
                                        <span class="input-group-addon" id="satuan"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" col-sm-2 col-sm-2 control-label">Tanggal</label>
                                <div class="col-md-2">
                                    <input type="date" class="form-control" name="var_tanggal" id="var_tanggal">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nama Pengawas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="var_nama_pengawas" id="var_nama_pengawas">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Komentar</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="var_keterangan" id="var_keterangan"></textarea>
                                    <!-- <textarea rows="2" cols="123" name="var_deskripsi" id="var_deskripsi"></textarea> -->
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-info" onclick="document.getElementById('submitForm').submit()">Submit</button>
                                </div>
                            </div>

                            <script type='text/javascript'>
                                $(document).ready(function() {
                                    $('#spj').autocomplete({
                                        source: "<?php echo site_url('inp_progres_kerja/get_autofill/?') ?>",

                                    });
                                });
                            </script>

                            <!-- <script>
                                $(document).ready(function() {
                                    $('#SPJ_NO').change(function() {
                                        var id = $(this).val();
                                        $.ajax({
                                            url: "<?php echo base_url(); ?>/inp_progres_kerja/select_spj_no",
                                            method: "POST",
                                            data: {
                                                id: id
                                            },
                                            async: false,
                                            dataType: 'json',
                                            success: function(data) {
                                                var html = '';
                                                var i;
                                                for (i = 0; i < data.length; i++) {
                                                    html += '<option value="' + data[i].SPJ_NO + '">' + data[i].SPJ_DESKRIPSI + '</option>';
                                                }
                                                $('.spj').html(html);

                                            }
                                        });
                                    });

                                    $('.spj').select2();

                                });
                            </script> -->
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section><!-- /.content -->
</div>