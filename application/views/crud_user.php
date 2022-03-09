<div class="content-wrapper">
    <section class="content-header">
        <h1>
            DATA MASTER USER
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Master User</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">


                    <div class="panel-body table-responsive">
                        <font size="2" face="Arial">
                            <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Data User</button>
                                <br>
                                <br>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>ID Role</th>
                                        <th>Kode Area</th>
                                        <th>Nama Area</th>
                                        <th>Area Zone</th>
                                        <th>Status</th>
                                        <th>Konfirmasi</th>
                                        <th colspan="1">Detail</th>
                                        <th>Hapus</th>
                                        <th>Edit</th>
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
                                                <?php  if($cu->USER_STATUS == "0"){ ?>
                                                    <span class="alert alert-danger">Nonaktif</span>
                                                    <?php }else{ ?>
                                                        <span class="alert alert-info">Aktif</span>

                                                        <?php }  ?>

                                            </td>
                                            <td>
                                            <?php  if($cu->USER_STATUS == "0"){ ?>
                                                <a href="crud_user/aktif/<?php echo $cu->USERNAME ?>" class="btn btn-primary">Aktifkan</a>

                                                    <?php }else{ ?>
                                                        <a href="<?php echo base_url("crud_user/non/$cu->USERNAME") ?>" class="btn btn-warning">Nonaktifkan</a>


                                                        <?php }  ?>

                                            </td>
                                            <td><?php echo anchor('crud_user/detail_crud_user/' . $cu->USERNAME, '<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>') ?></td>
                                            <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('crud_user/hapus/' . $cu->USERNAME, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                                            <td><?php echo anchor('crud_user/edit_crud_user/' . $cu->USERNAME, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
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
                    <h4 class="modal-title" id="myModalLabel"> Tambah Data User</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url() . 'crud_user/tambah_aksi'; ?>">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="USERNAME" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>ID Role</label>
                            <input type="number_format" name="role_id" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Kode Area </label>
                            <input type="number_format" name="AREA_KODE" class="form-control">
                        </div>

                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>