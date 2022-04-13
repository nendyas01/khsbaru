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
                        <font size="2" face="Arial">
                            <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Data Paket</button>
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

                                    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
                                    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
                                    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
                                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

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
                    <form method="post" action="<?php echo base_url() . 'crud_vendor/tambah_aksi'; ?>">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" name="VENDOR_ID" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Vendor</label>
                            <input type="text" name="VENDOR_NAMA" class="form-control">

                            <div class="form-group">
                                <label>Tahun </label>
                                <input type="text" name="TAHUN" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Direksi Vendor</label>
                                <input type="text" name="DIREKSI_VENDOR" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="EMAIL" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="text" name="TELEPON" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" name="STATUS" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email_2</label>
                                <input type="text" name="EMAIL_2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="JABATAN" class="form-control">
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