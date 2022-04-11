<div class="content-wrapper">
    <section class="content-header">
        <h1>
            DATA MASTER PENGGUNA
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Data Master Pengguna</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">


                    <div class="panel-body table-responsive">
                        <div id="pesan-sukses" class="alert alert-success" style="display:none;">
                            Data pengguna berhasil ditambahkan!
                        </div>
                        <font size="2" face="Arial">
                            <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Data Pengguna</button>
                                <br>
                                <br>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>ID Role</th>
                                        <th>Kode Area</th>
                                        <th>Nama Area</th>
                                        <th>Area Zone</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($crud_user as $cu) {
                                    ?>
                                        <tr>
                                            <td> <?php echo $no++ ?></td>
                                            <td> <?php echo $cu->USERNAME ?></td>
                                            <td> <?php echo $cu->role_id ?></td>
                                            <td> <?php echo $cu->AREA_KODE ?></td>
                                            <td> <?php echo $cu->AREA_NAMA ?></td>
                                            <td> <?php echo $cu->AREA_ZONE ?></td>
                                            <td>
                                                <?php if ($cu->USER_STATUS == "0") { ?>
                                                    <a href="<?php echo base_url("crud_user/aktif/$cu->USERNAME")  ?>" class="btn btn-danger">Aktif</a>
                                                    <!-- <span class="btn btn-info">Aktif</span> -->

                                                <?php } else { ?>
                                                    <a href="<?php echo base_url("crud_user/non/$cu->USERNAME") ?>" class="btn btn-info">Nonaktif</a>


                                                <?php }  ?>
                                            </td>

                                            <td>
                                                <a href="<?php echo base_url('crud_user/detail_crud_user/' . $cu->USERNAME) ?>" class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i> <a>
                                                        <a href="<?php echo base_url('crud_user/hapus/' . $cu->USERNAME) ?>" onclick="javascript:return confirm('Anda yakin hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> <a>
                                                                <a href="<?php echo base_url('crud_user/edit_crud_user/' . $cu->USERNAME) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> <a>
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


    </section>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> Tambah Data Pengguna</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="USERNAME" id="USERNAME" class="form-control">
                            <small id="USERNAME_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>Nama Role</label>
                            <select class="form-control" id="role_id" name="role_id">
                                <option value="">- Pilih Akses Role -</option>
                                <?php foreach ($role as $r) : ?>
                                    <option value="<?php echo $r->role_id; ?>"> <?php echo $r->role_nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small id="role_id_ERROR" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label>Nama Area </label>
                            <select class="form-control" id="AREA_KODE" name="AREA_KODE">
                                <option value="">- Pilih Nama Area -</option>
                                <?php foreach ($nama_area as $area) : ?>
                                    <option value="<?php echo $area->AREA_KODE; ?>"> <?php echo $area->AREA_NAMA; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small id="AREA_KODE_ERROR" class="text-danger"></small>
                        </div>

                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                        <button type="button" class="btn btn-primary" onclick="save()">Simpan</button>
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
        var USERNAME = $('#USERNAME').val();
        if (USERNAME == '') {
            $('#USERNAME_ERROR').text('USERNAME wajib diisi');
            return false;
        } else {
            $('#USERNAME_ERROR').text('');
        }
        var role_id = $('#role_id').val();
        if (role_id == '') {
            $('#role_id_ERROR').text('role nama wajib diisi');
            return false;
        } else {
            $('#role_id_ERROR').text('');
        }
        var AREA_KODE = $('#AREA_KODE').val();
        if (AREA_KODE == '') {
            $('#AREA_KODE_ERROR').text('AREA_KODE wajib diisi');
            return false;
        } else {
            $('#AREA_KODE_ERROR').text('');
        }
        $.ajax({
            url: "<?= base_url('crud_user/tambah_aksi') ?>",
            type: "POST",
            dataType: "JSON",
            data: {
                USERNAME: USERNAME,
                role_id: role_id,
                AREA_KODE: AREA_KODE
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