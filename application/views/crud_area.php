<div class="content-wrapper">
    <section class="content-header">
        <h1>
            DATA MASTER AREA
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Master Area</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">


                    <div class="panel-body table-responsive">
                        <font size="2" face="Arial">
                            <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Data Area</button>
                                </hr>
                                <br>
                                <br>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Area Kode</th>
                                        <th>Area Nama</th>
                                        <th>Area Zone</th>
                                        <th>Aksi</th>

                                    </tr>

                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($crud_area as $car) {

                                    ?>
                                        <tr id="delete<?php $car->AREA_KODE; ?>">
                                            <td> <?php echo $no++ ?></td>
                                            <td> <?php echo $car->AREA_KODE ?></td>
                                            <td> <?php echo $car->AREA_NAMA ?></td>
                                            <td> <?php echo $car->AREA_ZONE ?></td>


                                            <td>
                                                <a href="<?php echo base_url("crud_area/detail_crud_area/{$car->AREA_KODE}") ?>" data-toggle="tooltip" data-placement="bottom" title="Detail Data" data-original-title="Tooltip on bottom" class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></a>
                                                <a onclick="deletedata(<?php echo $car->AREA_KODE ?>)" data-toggle="tooltip" data-placement="bottom" title="Hapus Data" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                <a href="<?php echo base_url("crud_area/edit_crud_area/{$car->AREA_KODE}") ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Data" data-original-title="Tooltip on bottom" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            </td>

                                            <!-- $tombolhapus = "<button type=\"button\"  class=\"btn btn-danger btn-sm\" title=\"Hapus Data\" onclick=\"hapus('" . $car->AREA_KODE . "')\">
                                            <i class=\"fa fa-trash\"></i>
                                            </button>"; -->

                                            <!-- echo base_url=\"crud_area/hapus\" -->
                                            <!-- "<?php echo base_url("crud_area/hapus/{$car->AREA_KODE}") ?>" -->

                                            <!-- <td>
                                                <a href="<?php echo base_url('crud_area/detail_crud_area/' . $car->AREA_KODE) ?>" class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></a>
                                                <a href="<?php echo base_url('crud_area/hapus/' . $car->AREA_KODE) ?>" onclick="hapus(. $car->AREA_KODE .)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> <a>
                                                        <a href="<?php echo base_url('crud_area/edit_crud_area/' . $car->AREA_KODE) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            </td> -->


                                            <!-- <td><?php echo anchor('crud_area/detail_crud_area/' . $car->AREA_KODE, '<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>') ?></td> -->
                                            <!--  <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('crud_area/hapus/' . $car->AREA_KODE, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td> -->
                                            <!-- <td> <?php echo $tombolhapus ?></td>
                                            <td><?php echo anchor('crud_area/edit_crud_area/' . $car->AREA_KODE, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td> -->

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
                                                    align: 'center',
                                                    extend: 'copy',
                                                    oriented: 'potrait',
                                                    download: 'open',
                                                    widthX: '90px'
                                                },
                                                'csv', 'excel', 'pdf', 'print'
                                            ]
                                        });

                                        /* function hapus(AREA_KODE) {

                                            Swal.fire({
                                                title: 'Hapus',
                                                text: 'Yakin ingin menghapus data area?',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Ya, Hapus',
                                                cancelButtonText: 'Tidak'
                                            }).then((result) => {
                                                if (result.value) {
                                                    $.ajax({
                                                        type: "post",
                                                        url: "<?= site_url('crud_area/hapus') ?>",
                                                        data: {
                                                            AREA_KODE: AREA_KODE,
                                                        },
                                                        dataType: "json",
                                                        success: function(response) {

                                                            if (response.sukses) {
                                                                Swal.fire({
                                                                    icon: 'success',
                                                                    title: 'Konfirmasi',
                                                                    text: response.sukses
                                                                });
                                                                redirect(crud_area());
                                                            }
                                                        }
                                                    });
                                                }
                                            }) 
                                        }*/

                                        function deletedata(AREA_KODE) {
                                            //swal("sukses");

                                            swal({
                                                    title: "Anda Yakin?",
                                                    text: "Data <?php echo $car->AREA_KODE ?> Akan Dihapus Secara Permanen",
                                                    type: "warning",
                                                    showCancelButton: true,
                                                    // confirmButtonColor: "#DD6B55",
                                                    confirmButtonText: "Yes, delete it!",
                                                    closeOnConfirm: false
                                                },
                                                function() {
                                                    $.ajax({
                                                        url: "<?php echo base_url('crud_area/hapus') ?>",
                                                        type: "post",
                                                        data: {
                                                            AREA_KODE: AREA_KODE
                                                        },
                                                        success: function() {
                                                            swal('Data Berhasil Di Hapus', '', 'success');
                                                            //$('#example').DataTable().ajax.reload();
                                                            $("#delete" + AREA_KODE).fadeTo("slow", 0.7, function() {
                                                                $(this).remove();
                                                            })
                                                        },
                                                        error: function() {
                                                            swal('data gagal di hapus', 'error');
                                                        }
                                                    });
                                                });
                                        }
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
                    <h4 class="modal-title" id="myModalLabel"> Tambah Data Area</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url() . 'crud_area/tambah_aksi'; ?>">
                        <div class="form-group">
                            <label>AREA KODE</label>
                            <input type="text" name="AREA_KODE" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>AREA NAMA</label>
                            <input type="text" name="AREA_NAMA" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>AREA ZONE</label>
                            <input type="text" name="AREA_ZONE" class="form-control">
                            <!--  <select name="AREA_ZONE" id="AREA_ZONE" class="form-control">
                                <option selected="0">- Pilih Zona Area -</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select> -->
                        </div>

                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>