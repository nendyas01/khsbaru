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
            Pengelolaan Pelanggaran
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pengelolaan Pelanggaran</li>
        </ol>
    </section>

    <section class="content">
        <font size="2" face="Arial">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">

                        <header class="panel-heading">Input Pelanggaran KHS</header>
                        <div class="panel-body" onload=disableselect();>

                            <form class="form-horizontal tasi-form" method="post" action="inp_pel_khs_submit">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" for="inputSuccess">Area</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="nopelanggaran" id="area" value="P<?= $kodeotomatis ?>" class="form-control">
                                        <!--  <input type="text" name="area" id="area" placeholder="Masukan Nama Area" class="form-control"> -->

                                        <select class="form-control m-b-10" name="area">
                                            <option value>-- Silahkan Pilih Area --</option>
                                            <?php foreach ($area as $na) : ?>
                                                <option value="<?php echo $na->AREA_KODE; ?>"> <?php echo $na->AREA_NAMA; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" for="inputSuccess">Nomor SPJ</label>
                                    <input type="hidden" name="username" value="<?= $user->USERNAME; ?>">
                                    <div class="col-sm-10">


                                        <input type="text" name="spj" id="spj" placeholder="Masukan Nomor SPJ" class="form-control">

                                        <!-- <select class="form-control m-b-10" name="spj_no" id="spj_no">
                                        <option selected="0">-- NO SPJ --</option>
                                        <?php foreach ($nomorspj as $ns) : ?>
                                            <option value="<?php echo $ns->SPJ_DESKRIPSI; ?>"> <?php echo $ns->SPJ_NO; ?></option>
                                        <?php endforeach; ?>
                                    </select> -->
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                        <div class="col-md-5 form-group">
                                            <div class="alert alert-info" id="spjdata">
                                                <strong>Silahkan Memilih No SPJ!</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->


                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" for="inputSuccess">Jenis Pelanggaran</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="hidden" class="form-control" id="idpelanggaran" name="idpelanggaran" readonly required autofocus>
                                            <input type="text" class="form-control" id="namapelanggaran" name="namapelanggaran" readonly required autofocus>
                                            <input type="hidden" class="form-control" id="idkelpelanggaran" name="idkelpelanggaran" readonly required autofocus>


                                            <span class="input-group-btn">
                                                <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#modal">Cari</button>
                                            </span>

                                        </div>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <label class=" col-sm-2 col-sm-2 control-label">Tanggal Kejadian</label>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control" name="tgl_kejadian" id="tgl_kejadian">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="var_keterangan" id="var_keterangan"></textarea>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class=" col-sm-4 col-sm-2 control-label">Evidence</label>
                                        <div class="col-sm-8">
                                            <div class="dropzone">
                                                <div class="dz-message">
                                                    <h3>Drop dan Drag Disini untuk upload</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-info" onclick="document.getElementById('submitForm').submit()">Submit</button>
                                    </div>
                                </div>

                                <div id="modal" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <center>
                                                    <h3 class="modal-title">Pilih Pelanggaran</h3>
                                                </center>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table id="example1" class=" table-striped table-bordered " cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Pelanggaran</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $no = 1;
                                                            foreach ($pelanggaran as $data) {

                                                            ?>
                                                                <tr>
                                                                    <td align="center" width="10%"><?php echo $no ?></td>
                                                                    <td><?php echo $data->nama_Pelanggaran ?></td>
                                                                    <td align="center" width="10%" id="pelanggaran" data-id="<?= $data->id_Pelanggaran; ?>" data-pelanggaran="<?= $data->nama_Pelanggaran; ?>" data-kel="<?= $data->id_kel_Pelanggaran; ?>" onclick="pelanggaranmodal()"> <a class="btn btn-info">Pilih</a> </td>
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

                                <script>
                                    Dropzone.autoDiscover = false;
                                    var file_upload = new Dropzone('.dropzone', {
                                        url: "<?= base_url('inp_pel_khs/proses_upload') ?>",
                                        method: "post",
                                        paramName: "userFile",
                                        maxFiles: 5,
                                        dictMaxFilesExceeded: "Maximum upload file adalah 5",
                                        acceptedFiles: "application/pdf",
                                        dictInvalidFileType: "File ini tidak diizinkan",
                                        maxFilesize: 1, //MB
                                        dictFileTooBig: "File size terlalu besar, upload minimal 1 MB",
                                        addRemoveLinks: true,
                                    });

                                    file_upload.on('sending', function(a, b, c) {
                                        a.token = Math.random();
                                        c.append('token', a.token);
                                        console.log(file_upload);
                                    });

                                    file_upload.on('removedfile', function(a) {
                                        var token = a.token;
                                        $.ajax({
                                            type: "post",
                                            data: {
                                                token: token
                                            },
                                            url: "<?= base_url('inp_pel_khs/remove_file'); ?>",
                                            cache: false,
                                            success: function() {
                                                console.log('file berhasil dihapus');
                                            },
                                            error: function() {
                                                console.log('gagal dihapus')
                                            }
                                        })
                                    })
                                </script>
                                <script type="text/javascript">
                                    function pelanggaranmodal() {
                                        $(document).on('click', '#pelanggaran', function(e) {
                                            document.getElementById("idpelanggaran").value = $(this).attr('data-id');
                                            document.getElementById("namapelanggaran").value = $(this).attr('data-pelanggaran');
                                            document.getElementById("idkelpelanggaran").value = $(this).attr('data-kel');

                                            $('#modal').modal('hide');
                                        });

                                    }
                                </script>



                                <!-- <script>
                                    $(document).ready(function() {
                                        $('.dropify').dropify({
                                            messages: {
                                                default: 'Drag and drop a file here or click',
                                                replace: 'Ganti',
                                                remove: 'Hapus',
                                                error: 'error'
                                            }
                                        });
                                    });
                                </script>  -->
                            </form>
                        </div>
                    </section>
                </div>
            </div>
    </section><!-- /.content -->
</div>



</html>