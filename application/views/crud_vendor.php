<div class="content-wrapper">
    <section class="content-header">
        <h1>
            DATA MASTER VENDOR
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Data Master Vendor</li>
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
                            Data pengguna berhasil ditambahkan!
                        </div>
                        <font size="2" face="Arial">
                            <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0">
                                <button type="button" class="btn btn-primary" onclick="modal_tambah()"><i class="fa fa-plus"></i> Tambah Data Vendor</button>
                                <br>
                                <br>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Vendor</th>
                                        <th>Tahun</th>
                                        <th>Direksi Vendor</th>
                                        <th>Email</th>
                                        <!--  <th>Telepon</th> -->
                                        <th>Status</th>
                                        <!-- <th>Email_2</th>
                                        <th>Jabatan</th> -->
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($crud_vendor as $cv) {
                                    ?>
                                        <tr>
                                            <td> <?php echo $cv->VENDOR_ID ?></td>
                                            <td> <?php echo $cv->VENDOR_NAMA ?></td>
                                            <td> <?php echo $cv->TAHUN ?></td>
                                            <td> <?php echo $cv->DIREKSI_VENDOR ?></td>
                                            <td> <?php echo $cv->EMAIL ?></td>
                                            <td>
                                                <?php if ($cv->STATUS == "1") { ?>
                                                    <a href="<?php echo base_url("crud_vendor/aktif/$cv->VENDOR_ID")  ?>" class="btn btn-danger">Aktif</a>
                                                    <!-- <span class="btn btn-info">Aktif</span> -->

                                                <?php } else { ?>
                                                    <a href="<?php echo base_url("crud_vendor/non/$cv->VENDOR_ID") ?>" class="btn btn-info">Nonaktif</a>


                                                <?php }  ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('crud_vendor/detail_crud_vendor/' . $cv->VENDOR_ID) ?>" class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i> <a>
                                                        <a href="<?php echo base_url('crud_vendor/hapus/' . $cv->VENDOR_ID) ?>" onclick="javascript:return confirm('Anda yakin hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> <a>
                                                                <a href="<?php echo base_url('crud_vendor/edit_crud_vendor/' . $cv->VENDOR_ID) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> <a>
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
                    <h4 class="modal-title" id="myModalLabel"> Tambah Data Vendor</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" name="VENDOR_ID" id="VENDOR_ID" class="form-control">
                            <small id="VENDOR_ID_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>Nama Vendor</label>
                            <input type="text" name="VENDOR_NAMA" id="VENDOR_NAMA" class="form-control">
                            <small id="VENDOR_NAMA_ERROR" class="text-danger"></small>

                            <div class="form-group">
                                <label>Tahun </label>
                                <input type="text" name="TAHUN" id="TAHUN" class="form-control">
                                <small id="TAHUN_ERROR" class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label>Direksi Vendor</label>
                                <input type="text" name="DIREKSI_VENDOR" id="DIREKSI_VENDOR" class="form-control">
                                <small id="DIREKSI_VENDOR_ERROR" class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="EMAIL" id="EMAIL" class="form-control">
                                <small id="EMAIL_ERROR" class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="text" name="TELEPON" id="TELEPON" class="form-control">
                                <small id="TELEPON_ERROR" class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" name="STATUS" id="STATUS" class="form-control">
                                <small id="STATUS_ERROR" class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label>Email_2</label>
                                <input type="text" name="EMAIL_2" id="EMAIL_2" class="form-control">
                                <small id="EMAIL_2_ERROR" class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="JABATAN" id="JABATAN" class="form-control">
                                <small id="JABATAN_ERROR" class="text-danger"></small>
                            </div>


                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
    function save() {
        var VENDOR_ID = $('#VENDOR_ID').val();
        if (VENDOR_ID == '') {
            $('#VENDOR_ID_ERROR').text('VENDOR ID wajib diisi');
            return false;
        } else {
            $('#VENDOR_ID_ERROR').text('');
        }

        var VENDOR_NAMA = $('#VENDOR_NAMA').val();
        if (VENDOR_NAMA == '') {
            $('#VENDOR_NAMA_ERROR').text('VENDOR NAMA wajib diisi');
            return false;
        } else {
            $('#VENDOR_NAMA_ERROR').text('');
        }
        var TAHUN = $('#TAHUN').val();
        if (TAHUN == '') {
            $('#TAHUN_ERROR').text('TAHUN wajib diisi');
            return false;
        } else {
            $('#TAHUN_ERROR').text('');
        }
        var DIREKSI_VENDOR = $('#DIREKSI_VENDOR').val();
        if (DIREKSI_VENDOR == '') {
            $('#DIREKSI_VENDOR_ERROR').text('DIREKSI VENDOR wajib diisi');
            return false;
        } else {
            $('#DIREKSI_VENDOR_ERROR').text('');
        }
        var EMAIL = $('#EMAIL').val();
        if (EMAIL == '') {
            $('#EMAIL_ERROR').text('EMAIL wajib diisi');
            return false;
        } else {
            $('#EMAIL_ERROR').text('');
        }
        var TELEPON = $('#TELEPON').val();
        if (TELEPON == '') {
            $('#TELEPON_ERROR').text('TELEPON wajib diisi');
            return false;
        } else {
            $('#TELEPON_ERROR').text('');
        }
        var STATUS = $('#STATUS').val();
        if (STATUS == '') {
            $('#STATUS_ERROR').text('STATUS wajib diisi');
            return false;
        } else {
            $('#STATUS_ERROR').text('');
        }
        var EMAIL_2 = $('#EMAIL_2').val();
        if (EMAIL_2 == '') {
            $('#EMAIL_2_ERROR').text('EMAIL 2 wajib diisi');
            return false;
        } else {
            $('#EMAIL_2_ERROR').text('');
        }
        var JABATAN = $('#JABATAN').val();
        if (JABATAN == '') {
            $('#JABATAN_ERROR').text('JABATAN wajib diisi');
            return false;
        } else {
            $('#JABATAN_ERROR').text('');
        }
        $.ajax({
            url: "<?= base_url('crud_vendor/tambah_aksi') ?>",
            type: "POST",
            dataType: "JSON",
            data: {
                VENDOR_ID: VENDOR_ID,
                VENDOR_NAMA: VENDOR_NAMA,
                TAHUN: TAHUN,
                EMAIL: EMAIL,
                TELEPON: TELEPON,
                STATUS: STATUS,
                EMAIL_2: EMAIL_2,
                JABATAN: JABATAN,

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