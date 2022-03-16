<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/dropify/css/') . 'dropify.css'; ?>"> -->

</head>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Addendum
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pengelolaan Proses</li>
        </ol>
    </section>

    <section class="content">
        <font size="2" face="Arial">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">

                        <header class="panel-heading">INPUT ADDENDUM</header>
                        <div class="panel-body" onload=disableselect();>

                            <form class="form-horizontal tasi-form" method="post" action="inp_addendum_submit">


                                <!-- no spj -->
                                <!-- <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nomor SPJ</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="spj_no" id="spj_no" placeholder="Masukan nomor SPJ" class="form-control">
                                        <?= form_error('spj_no', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" for="inputSuccess">No SPJ</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">

                                            <input type="text" class="form-control" id="nospj" name="nospj" readonly required autofocus>


                                            <span class="input-group-btn">
                                                <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#modal">Cari</button>
                                            </span>

                                        </div>
                                    </div>

                                </div>


                                <!-- nomor addendum -->
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nomor Addendum</label>
                                    <div class="col-sm-10" id="no_add">
                                        <input type="text" class="form-control" name="var_no_addendum">
                                    </div>
                                </div>

                                <!-- Textbox Nilai SPJ -->
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nilai Addendum (Sebelum PPN)</label>
                                    <div class="col-md-2" form-group>
                                        <input type="text" class="form-control" name="min_ppn" id="min_ppn" placeholder="nilai sebelum ppn">
                                    </div>
                                    <div class="col-md-2" form-group>
                                        <input type="text" class="form-control" name="ppn" id="ppn" placeholder="ppn 10%" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="var_nilai_addendum" id="nilai" placeholder="nilai setelah ppn" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class=" col-sm-2 col-sm-2 control-label">Tanggal Addendum</label>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control" name="var_tanggal_add" id="tgl_amd">
                                        <input type="hidden" name="username" value="<?= $user->USERNAME; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class=" col-sm-2 col-sm-2 control-label">Tanggal Akhir SPJ (Jika Berubah)</label>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control" name="var_tanggal_akhir" id="tgl_add">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">SKKI/O Awal</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="var_skki_awal" id="skki_awal" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">SKKI/O Tujuan</label>
                                    <div class="col-sm-10" id="no_add">
                                        <input type="text" class="form-control" name="var_skki_tujuan" id="var_skki_tujuan" placeholder="Masukan nomor SKKI/O">
                                        <?= form_error('var_skki_tujuan', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                                    <div class="col-sm-3">
                                        <textarea name="var_deskripsi"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10" name="var_deskripsi" id="var_deskripsi">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>

                                <div id="modal" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <center>
                                                    <h3 class="modal-title">Pilih SPJ</h3>
                                                </center>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table id="example1" class=" table-striped table-bordered " cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>NO SPJ</th>
                                                                <th>Nama Manager</th>
                                                                <th>Direksi Pekerjaan</th>
                                                                <th>Direksi Lapangan</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $no = 1;
                                                            foreach ($spj as $data) {

                                                            ?>
                                                                <tr>
                                                                    <td align="center" width="10%"><?php echo $no ?></td>
                                                                    <td><?php echo $data->SPJ_NO ?></td>
                                                                    <td><?php echo $data->NAMA_MANAGER ?></td>
                                                                    <td><?php echo $data->DIREKSI_PEKERJAAN ?></td>
                                                                    <td><?php echo $data->DIREKSI_LAPANGAN ?></td>
                                                                    <td align="center" width="10%" id="spj" data-id="<?= $data->SPJ_NO; ?>" data-skki="<?= $data->SKKI_NO; ?>" onclick="spjmodal()"> <a class="btn btn-info">Pilih</a> </td>
                                                                </tr>
                                                            <?php
                                                                $no++;
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script type='text/javascript'>
                                    $(document).ready(function() {
                                        $('#var_skki_tujuan').autocomplete({
                                            source: "<?php echo site_url('inp_addendum/get_autofill1/?') ?>",

                                        });
                                    });
                                </script>
                                <script>
                                    $(document).ready(function() {
                                        $('#example1').DataTable();
                                    });
                                </script>


                                <script type='text/javascript'>
                                    $(document).ready(function() {
                                        $('#spj').autocomplete({
                                            source: "<?php echo site_url('inp_pel_khs/get_autofill/?') ?>",

                                        });
                                    });
                                </script>

                                <script type='text/javascript'>
                                    $(document).ready(function() {
                                        $('#area').autocomplete({
                                            source: "<?php echo site_url('inp_pel_khs/get_autocomplete') ?>",

                                        });
                                    });
                                </script>


                                <script type="text/javascript">
                                    function spjmodal() {
                                        $(document).on('click', '#spj', function(e) {
                                            document.getElementById("nospj").value = $(this).attr('data-id');
                                            document.getElementById("skki_awal").value = $(this).attr('data-skki');
                                            $('#modal').modal('hide');
                                        });
                                    }
                                </script>
                                <script type="text/javascript">
                                    $("#min_ppn").keyup(function(event) {
                                        //var nilai = $("#min_ppn").val().replace(/,/g,"");
                                        //alert(nilai);
                                        //var ppn = (10 / 100) * nilai;
                                        //var total = nilai + ppn;
                                        $("#ppn").val(Math.floor($("#min_ppn").val().replace(/,/g, "") * 10 / 100).toLocaleString('en'));
                                        $("#nilai").val(Math.floor($("#min_ppn").val().replace(/,/g, "") * 110 / 100).toLocaleString('en'));
                                    })
                                </script>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
    </section>
</div>

</html>