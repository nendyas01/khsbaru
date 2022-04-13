<div class="content-wrapper">
    <section class="content-header">
        <h1>
            DATA MASTER PAKET
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Data Master Paket</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">


                    <div class="panel-body table-responsive">
                        <?php
                        $info = $this->session->flashdata('info_edit');
                        if (!empty($info)) {
                            echo '<div class="alert alert-success">' . $this->session->flashdata('info_edit') . '</div>';
                        }
                        ?>
                        <div id="pesan-sukses" class="alert alert-success" style="display:none;">
                            Data paket berhasil ditambahkan!
                        </div>
                        <font size="2" face="Arial">
                            <table id="example" class="table table-striped table-bordered" cellspacing="0">
                                <button type="button" class="btn btn-primary" onclick="modal_tambah()"><i class="fa fa-plus"></i> Tambah Data Paket</button>
                                <br>
                                <br>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <!-- <th>Paket Jenis</th> -->
                                        <th>Paket Deskripsi</th>
                                        <th>Satuan</th>
                                        <th>Paket Deskripsi 2</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($crud_paket as $cp) {
                                    ?>
                                        <tr>
                                            <td> <?php echo $no++ ?></td>
                                            <td> <?php echo $cp->PAKET_DESKRIPSI ?></td>
                                            <td> <?php echo $cp->SATUAN ?></td>
                                            <td> <?php echo $cp->PAKET_DESKRIPSI2 ?></td>
                                            <td>
                                                <?php if ($cp->STATUS == "1") { ?>
                                                    <a href="<?php echo base_url("crud_paket/aktif/$cp->PAKET_JENIS")  ?>" class="btn btn-danger">Aktif</a>
                                                    <!-- <span class="btn btn-info">Aktif</span> -->

                                                <?php } else { ?>
                                                    <a href="<?php echo base_url("crud_paket/non/$cp->PAKET_JENIS") ?>" class="btn btn-info">Nonaktif</a>


                                                <?php }  ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('crud_paket/detail_crud_paket/' . $cp->PAKET_JENIS) ?>" class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i> <a>
                                                        <a href="<?php echo base_url('crud_paket/hapus/' . $cp->PAKET_JENIS) ?>" onclick="javascript:return confirm('Anda yakin hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> <a>
                                                                <a href="<?php echo base_url('crud_paket/edit_crud_paket/' . $cp->PAKET_JENIS) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> <a>
                                            </td>
                                        </tr>
                                    <?php } ?>



                                    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
                                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                                    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

                                    <script>
                                        $(document).ready(function() {
                                            $('#example').DataTable();
                                        });
                                    </script>

                                </tbody>
                            </table>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> Tambah Data Paket</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Paket Jenis</label>
                        <input type="text" name="PAKET_JENIS" id="PAKET_JENIS" class="form-control">
                        <small id="PAKET_JENIS_ERROR" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label>Paket Deskripsi</label>
                        <input type="text" name="PAKET_DESKRIPSI" id="PAKET_DESKRIPSI" class="form-control">
                        <small id="PAKET_DESKRIPSI_ERROR" class="text-danger"></small>

                        <div class="form-group">
                            <label>Satuan </label>
                            <input type="text" name="SATUAN" id="SATUAN" class="form-control">
                            <small id="SATUAN_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>Paket Deskripsi 2</label>
                            <input type="text" name="PAKET_DESKRIPSI2" id="PAKET_DESKRIPSI2" class="form-control">
                            <small id="PAKET_DESKRIPSI2_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="STATUS" id="STATUS" class="form-control">
                            <small id="STATUS_ERROR" class="text-danger"></small>
                        </div>

                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                        <button type="submit" class="btn btn-primary" onclick="save()">Simpan</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
    function save() {
        var PAKET_JENIS = $('#PAKET_JENIS').val();
        if (PAKET_JENIS == '') {
            $('#PAKET_JENIS_ERROR').text('PAKET JENIS wajib diisi');
            return false;
        } else {
            $('#PAKET_JENIS_ERROR').text('');
        }
        var PAKET_DESKRIPSI = $('#PAKET_DESKRIPSI').val();
        if (PAKET_DESKRIPSI == '') {
            $('#PAKET_DESKRIPSI_ERROR').text('PAKET DESKRIPSI wajib diisi');
            return false;
        } else {
            $('#PAKET_DESKRIPSI_ERROR').text('');
        }
        var SATUAN = $('#SATUAN').val();
        if (SATUAN == '') {
            $('#SATUAN_ERROR').text('SATUAN wajib diisi');
            return false;
        } else {
            $('#SATUAN_ERROR').text('');
        }
        var PAKET_DESKRIPSI2 = $('#PAKET_DESKRIPSI2').val();
        if (PAKET_DESKRIPSI2 == '') {
            $('#PAKET_DESKRIPSI2_ERROR').text('PAKET_DESKRIPSI2 wajib diisi');
            return false;
        } else {
            $('#PAKET_DESKRIPSI2_ERROR').text('');
        }
        var STATUS = $('#STATUS').val();
        if (STATUS == '') {
            $('#STATUS_ERROR').text('STATUS wajib diisi');
            return false;
        } else {
            $('#STATUS_ERROR').text('');
        }
        $.ajax({
            url: "<?= base_url('crud_paket/tambah_aksi') ?>",
            type: "POST",
            dataType: "JSON",
            data: {
                PAKET_JENIS: PAKET_JENIS,
                PAKET_DESKRIPSI: PAKET_DESKRIPSI,
                SATUAN: SATUAN,
                PAKET_DESKRIPSI2: PAKET_DESKRIPSI2,
                STATUS: STATUS
            },
            success: function(data) {
                $('#pesan-sukses').show();
                $('#myModal').modal('hide');
                refreshTable();

            }
        });
    }

    function modal_tambah() {
        $('#myModal').modal('show');
    }
</script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<!--  Button untuk copy, csv, excel -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>