<div class="content-wrapper">
    <section class="content-header">
        <h1>
            DATA MASTER KONTRAK
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Input Data Pagu Kontrak</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">


                    <div class="panel-body table-responsive">
                        <font size="2" face="Arial">

                            <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Data Pagu Kontrak</button>
                                </hr>
                                <thead>
                                    <tr>
                                        <!-- <th>No</th> -->
                                        <th>ID VENDOR</th>
                                        <th>PAKET JENIS</th>
                                        <th>PAGU KONTRAK</th>
                                        <th>TERPAKAI</th>
                                        <th>RANKING</th>
                                        <th>NO PJN</th>
                                        <th>TANGGAL PJN</th>
                                        <th>NO RKS</th>
                                        <th>TANGGAL RKS</th>
                                        <th>NO SPP</th>
                                        <th>TANGGAL SPP</th>
                                        <th>NO PENAWARAN</th>
                                        <th>TANGGAL PENAWARAN</th>
                                        <th>SANKSI TERAKHIR</th>
                                        <th>ID SANKSI</th>
                                        <th>TANGGAL SANKSI</th>
                                        <th>TANGGAL AKHIR</th>
                                        <th>PUNISHMENT</th>
                                        <th>BLOCKED</th>
                                        <th colspan="1">Detail</th>
                                        <th>Hapus</th>
                                        <th>Edit</th>

                                    </tr>

                                </thead>

                                <tbody>
                                    <?php
                                    //$no = 1;
                                    foreach ($crud_kontrak as $cpk) {
                                    ?>
                                        <tr>
                                            <!--  <td> //echo $no++ 
                                                        </td> -->
                                            <td> <?php echo $cpk->VENDOR_ID ?></td>
                                            <td> <?php echo $cpk->PAKET_JENIS ?></td>
                                            <td> <?php echo 'Rp ' . number_format($cpk->PAGU_KONTRAK, 0, ',', '.') ?></td>
                                            <td> <?php echo 'Rp ' . number_format($cpk->TERPAKAI, 0, ',', '.') ?></td>
                                            <td> <?php echo $cpk->RANKING ?></td>
                                            <td> <?php echo $cpk->NO_PJN ?></td>
                                            <td> <?php echo $cpk->TGL_PJN ?></td>
                                            <td> <?php echo $cpk->NO_RKS ?></td>
                                            <td> <?php echo $cpk->TGL_RKS ?></td>
                                            <td> <?php echo $cpk->NO_SPP ?></td>
                                            <td> <?php echo $cpk->TGL_SPP ?></td>
                                            <td> <?php echo $cpk->NO_PENAWARAN ?></td>
                                            <td> <?php echo $cpk->TGL_PENAWARAN ?></td>
                                            <td> <?php echo $cpk->sanksi_terakhir ?></td>
                                            <td> <?php echo $cpk->id_sanksi ?></td>
                                            <td> <?php echo $cpk->tgl_sanksi ?></td>
                                            <td> <?php echo $cpk->tgl_akhir ?></td>
                                            <td> <?php echo $cpk->punishment ?></td>
                                            <td> <?php echo $cpk->BLOCKED ?></td>

                                            <td><?php echo anchor('crud_kontrak/detail_crud_kontrak/' . $cpk->VENDOR_ID, '<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>') ?></td>
                                            <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('crud_kontrak/hapus/' . $cpk->VENDOR_ID, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                                            <td><?php echo anchor('crud_kontrak/edit_crud_kontrak/' . $cpk->VENDOR_ID, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>

                                        </tr>
                                    <?php } ?>
                                    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
                                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                                    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

                                    <!--  Button untuk copy, csv, excel -->
                                    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
                                    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

                                    <script>
                                        $(document).ready(function() {
                                            $('#example').DataTable();
                                        });
                                    </script>


                                    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
                                    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
                                    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
                                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
                                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
                                    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
                                    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

                                    <script type="text/javascript">
                                        $('#example').DataTable({
                                            dom: 'lBfrtip',
                                            buttons: [{
                                                    extend: 'copy',
                                                    oriented: 'potrait',
                                                    download: 'open',
                                                    widthX: '90px'
                                                },
                                                'csv', 'excel', 'pdf', 'print'
                                            ]
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
                    <h4 class="modal-title" id="myModalLabel"> Tambah Data Pagu Kontrak</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url() . 'crud_kontrak/tambah_aksi'; ?>">
                        <div class="form-group">
                            <label>ID VENDOR</label>
                            <input type="text" name="VENDOR_ID" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>PAKET JENIS</label>
                            <input type="text" name="PAKET_JENIS" class="form-control">

                            <div class="form-group">
                                <label>PAGU KONTRAK</label>
                                <input type="text" name="PAGU_KONTRAK" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>TERPAKAI</label>
                                <input type="text" name="TERPAKAI" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>RANKING</label>
                                <input type="text" name="RANKING" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>NO_PJN</label>
                                <input type="text" name="NO_PJN" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>TGL_PJN</label>
                                <input type="date" name="TGL_PJN" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>NO_RKS</label>
                                <input type="text" name="NO_RKS" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>TGL_RKS</label>
                                <input type="date" name="TGL_RKS" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>NO_SPP</label>
                                <input type="text" name="NO_SPP" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>TGL_SPP</label>
                                <input type="date" name="TGL_SPP" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>NO_PENAWARAN</label>
                                <input type="text" name="NO_PENAWARAN" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>TGL_PENAWARAN</label>
                                <input type="date" name="TGL_PENAWARAN" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>SANKSI TERAKHIR</label>
                                <input type="text" name="sanksi_terakhir" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>ID SANKSI</label>
                                <input type="text" name="id_sanksi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>TANGGAL SANKSI</label>
                                <input type="date" name="tgl_sanksi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>TANGGAL AKHIR</label>
                                <input type="date" name="tgl_akhir" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>PUNISHMENT</label>
                                <input type="text" name="punishment" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>BLOCKED</label>
                                <input type="text" name="BLOCKED" class="form-control">
                            </div>

                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>