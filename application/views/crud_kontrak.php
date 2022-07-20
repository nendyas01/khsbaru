<div class="content-wrapper">
    <section class="content-header">
        <h1>
            DATA MASTER PAGU KONTRAK
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Data Master Pagu Kontrak</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">

                    <div class="flash-data" id="flash2" data-flash="<?= $this->session->flashdata('sukses'); ?>"></div>
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

                            <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0">
                                <button type="button" class="btn btn-primary" onclick="modal_tambah()"><i class="fa fa-plus"></i> Tambah Data Pagu Kontrak</button>
                                </hr>
                                <br>
                                <br>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID VENDOR</th>
                                        <th>PAKET JENIS</th>
                                        <th>PAGU KONTRAK</th>
                                        <th>TERPAKAI</th>
                                        <th>RANKING</th>
                                        <!-- <th>NO PJN</th> -->
                                        <th>TANGGAL PJN</th>
                                        <!-- <th>NO RKS</th>
                                        <th>TANGGAL RKS</th>
                                        <th>NO SPP</th>
                                        <th>TANGGAL SPP</th>
                                        <th>NO PENAWARAN</th>
                                        <th>TANGGAL PENAWARAN</th>
                                        <th>SANKSI TERAKHIR</th>
                                        <th>ID SANKSI</th>
                                        <th>TANGGAL SANKSI</th>
                                        <th>TANGGAL AKHIR</th>
                                        <th>PUNISHMENT</th> -->
                                        <!-- <th>BLOCKED</th> -->
                                        <!-- <th colspan="1">Detail</th>
                                        <th>Hapus</th>
                                        <th>Edit</th> -->
                                        <th>AKSI</th>

                                    </tr>

                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($crud_kontrak as $cpk) {
                                    ?>
                                        <tr id="delete<?php $cpk->VENDOR_ID; ?>">
                                            <td> <?php echo $no++ ?></td>
                                            <td> <?php echo $cpk->VENDOR_ID ?></td>
                                            <td> <?php echo $cpk->PAKET_JENIS ?></td>
                                            <td> <?php echo 'Rp ' . number_format($cpk->PAGU_KONTRAK, 0, ',', '.') ?></td>
                                            <td> <?php echo 'Rp ' . number_format($cpk->TERPAKAI, 0, ',', '.') ?></td>
                                            <td> <?php echo $cpk->RANKING ?></td>
                                            <!-- <td> <?php echo $cpk->NO_PJN ?></td> -->
                                            <td> <?php echo $cpk->TGL_PJN ?></td>
                                            <!-- <td> <?php echo $cpk->NO_RKS ?></td>
                                            <td> <?php echo $cpk->TGL_RKS ?></td>
                                            <td> <?php echo $cpk->NO_SPP ?></td>
                                            <td> <?php echo $cpk->TGL_SPP ?></td>
                                            <td> <?php echo $cpk->NO_PENAWARAN ?></td>
                                            <td> <?php echo $cpk->TGL_PENAWARAN ?></td>
                                            <td> <?php echo $cpk->sanksi_terakhir ?></td>
                                            <td> <?php echo $cpk->id_sanksi ?></td>
                                            <td> <?php echo $cpk->tgl_sanksi ?></td>
                                            <td> <?php echo $cpk->tgl_akhir ?></td>
                                            <td> <?php echo $cpk->punishment ?></td> -->
                                            <!-- <td> <?php echo $cpk->BLOCKED ?></td> -->

                                            <!-- <td><?php echo anchor('crud_kontrak/detail_crud_kontrak/' . $cpk->VENDOR_ID, '<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>') ?></td>
                                            <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('crud_kontrak/hapus/' . $cpk->VENDOR_ID, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                                            <td><?php echo anchor('crud_kontrak/edit_crud_kontrak/' . $cpk->VENDOR_ID, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td> -->

                                            <td>
                                                <a href="<?php echo base_url("crud_kontrak/detail_crud_kontrak/{$cpk->VENDOR_ID}") ?>" data-toggle="tooltip" data-placement="bottom" title="Detail Data" data-original-title="Tooltip on bottom" class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></a>
                                                <!-- <a onclick="deletedata(<?php echo $cpk->VENDOR_ID ?>)" data-toggle="tooltip" data-placement="bottom" title="Hapus Data" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> -->
                                                <a id="hapuskontrak" class="btn btn-sm btn-danger" href="<?php echo site_url('/crud_kontrak/hapus/' . $cpk->VENDOR_ID) ?>"><i class="fa fa-trash"></i></a>
                                                <a href="<?php echo base_url("crud_kontrak/edit_crud_kontrak/{$cpk->VENDOR_ID}") ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Data" data-original-title="Tooltip on bottom" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            </td>

                                        </tr>
                                    <?php } ?>

                                    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
                                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                                    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

                                    <!-- Button untuk copy, csv, excel
                                    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
                                    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"> -->

                                    <script>
                                        $(document).ready(function() {
                                            $('#example').DataTable();
                                        });
                                    </script>


                                    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
                                    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
                                    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
                                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
                                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
                                    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
                                    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script> -->

                                    <!-- <script type="text/javascript">
                                        // $('#example').DataTable({
                                        //     dom: 'lBfrtip',
                                        //     buttons: [{
                                        //             extend: 'copy',
                                        //             oriented: 'potrait',
                                        //             download: 'open',
                                        //             widthX: '90px'
                                        //         },
                                        //         'csv', 'excel', 'pdf', 'print'
                                        //     ]
                                        // });

                                        function deletedata(VENDOR_ID) {
                                            //swal("sukses");

                                            swal({
                                                    title: "Anda Yakin?",
                                                    text: "Data Pagu Kontrak Akan Dihapus Secara Permanen",
                                                    type: "warning",
                                                    showCancelButton: true,
                                                    // confirmButtonColor: "#DD6B55",
                                                    confirmButtonText: "Yes, delete it!",
                                                    closeOnConfirm: false
                                                },
                                                function() {
                                                    $.ajax({
                                                        url: "<?php echo base_url('crud_kontrak/hapus') ?>",
                                                        type: "post",
                                                        data: {
                                                            VENDOR_ID: VENDOR_ID
                                                        },
                                                        success: function() {
                                                            swal('Data Berhasil Di Hapus', '', 'success');
                                                            //$('#example').DataTable().ajax.reload();
                                                            $("#delete" + VENDOR_ID).fadeTo("slow", 0.7, function() {
                                                                $(this).remove();
                                                            })
                                                        },
                                                        error: function() {
                                                            swal('data gagal di hapus', 'error');
                                                        }
                                                    });
                                                });
                                        }
                                    </script> -->
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
                    <form method="post" action="">
                        <div class="form-group">
                            <label>ID VENDOR</label>
                            <input type="text" name="VENDOR_ID" id="VENDOR_ID" class="form-control">
                            <small id="VENDOR_ID_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>PAKET JENIS</label>
                            <input type="text" name="PAKET_JENIS" id="PAKET_JENIS" class="form-control">
                            <small id="PAKET_JENIS_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>PAGU KONTRAK</label>
                            <input type="text" name="PAGU_KONTRAK" id="PAGU_KONTRAK" class="form-control">
                            <small id="PAGU_KONTRAK_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>TERPAKAI</label>
                            <input type="text" name="TERPAKAI" id="TERPAKAI" class="form-control">
                            <small id="TERPAKAI_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>RANKING</label>
                            <input type="text" name="RANKING" id="RANKING" class="form-control">
                            <small id="RANKING_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>NO_PJN</label>
                            <input type="text" name="NO_PJN" id="NO_PJN" class="form-control">
                            <small id="NO_PJN_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>TGL_PJN</label>
                            <input type="date" name="TGL_PJN" id="TGL_PJN" class="form-control">
                            <small id="TGL_PJN_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>NO_RKS</label>
                            <input type="text" name="NO_RKS" id="NO_RKS" class="form-control">
                            <small id="NO_RKS_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>TGL_RKS</label>
                            <input type="date" name="TGL_RKS" id="TGL_RKS" class="form-control">
                            <small id="TGL_RKS_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>NO_SPP</label>
                            <input type="text" name="NO_SPP" id="NO_SPP" class="form-control">
                            <small id="NO_SPP_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>TGL_SPP</label>
                            <input type="date" name="TGL_SPP" id="TGL_SPP" class="form-control">
                            <small id="TGL_SPP_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>NO_PENAWARAN</label>
                            <input type="text" name="NO_PENAWARAN" id="NO_PENAWARAN" class="form-control">
                            <small id="NO_PENAWARAN_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>TGL_PENAWARAN</label>
                            <input type="date" name="TGL_PENAWARAN" id="TGL_PENAWARAN" class="form-control">
                            <small id="TGL_PENAWARAN_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>SANKSI TERAKHIR</label>
                            <input type="text" name="sanksi_terakhir" id="sanksi_terakhir" class="form-control">
                            <small id="sanksi_terakhir_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>ID SANKSI</label>
                            <input type="text" name="id_sanksi" id="id_sanksi" class="form-control">
                            <small id="id_sanksi_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>TANGGAL SANKSI</label>
                            <input type="date" name="tgl_sanksi" id="tgl_sanksi" class="form-control">
                            <small id="tgl_sanksi_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>TANGGAL AKHIR</label>
                            <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control">
                            <small id="tgl_akhir_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>PUNISHMENT</label>
                            <input type="text" name="punishment" id="punishment" class="form-control">
                            <small id="punishment_ERROR" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>BLOCKED</label>
                            <input type="text" name="BLOCKED" id="BLOCKED" class="form-control">
                            <small id="BLOCKED_ERROR" class="text-danger"></small>
                        </div>

                        <button type="reset" class="btn btn-danger">Reset</button>
                        <!-- <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button> -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
        var PAKET_JENIS = $('#PAKET_JENIS').val();
        if (PAKET_JENIS == '') {
            $('#PAKET_JENIS_ERROR').text('PAKET JENIS wajib diisi');
            return false;
        } else {
            $('#PAKET_JENIS_ERROR').text('');
        }
        var PAGU_KONTRAK = $('#PAGU_KONTRAK').val();
        if (PAGU_KONTRAK == '') {
            $('#PAGU_KONTRAK_ERROR').text('PAGU KONTRAK wajib diisi');
            return false;
        } else {
            $('#PAGU_KONTRAK_ERROR').text('');
        }
        var TERPAKAI = $('#TERPAKAI').val();
        if (TERPAKAI == '') {
            $('#TERPAKAI_ERROR').text('TERPAKAI wajib diisi');
            return false;
        } else {
            $('#TERPAKAI_ERROR').text('');
        }
        var RANKING = $('#RANKING').val();
        if (RANKING == '') {
            $('#RANKING_ERROR').text('RANKING wajib diisi');
            return false;
        } else {
            $('#RANKING_ERROR').text('');
        }
        var NO_PJN = $('#NO_PJN').val();
        if (NO_PJN == '') {
            $('#NO_PJN_ERROR').text('NO PJN wajib diisi');
            return false;
        } else {
            $('#NO_PJN_ERROR').text('');
        }
        var TGL_PJN = $('#TGL_PJN').val();
        if (TGL_PJN == '') {
            $('#TGL_PJN_ERROR').text(' TGL PJN wajib diisi');
            return false;
        } else {
            $('#TGL_PJN_ERROR').text('');
        }
        var NO_RKS = $('#NO_RKS').val();
        if (NO_RKS == '') {
            $('#NO_RKS_ERROR').text('NO RKS wajib diisi');
            return false;
        } else {
            $('#NO_RKS_ERROR').text('');
        }
        var TGL_RKS = $('#TGL_RKS').val();
        if (TGL_RKS == '') {
            $('#TGL_RKS_ERROR').text('TGL RKS wajib diisi');
            return false;
        } else {
            $('#TGL_RKS_ERROR').text('');
        }
        var NO_SPP = $('#NO_SPP').val();
        if (NO_SPP == '') {
            $('#NO_SPP_ERROR').text('NO SPP wajib diisi');
            return false;
        } else {
            $('#NO_SPP_ERROR').text('');
        }
        var TGL_SPP = $('#TGL_SPP').val();
        if (TGL_SPP == '') {
            $('#TGL_SPP_ERROR').text('TGL SPP wajib diisi');
            return false;
        } else {
            $('#TGL_SPP_ERROR').text('');
        }
        var NO_PENAWARAN = $('#NO_PENAWARAN').val();
        if (NO_PENAWARAN == '') {
            $('#NO_PENAWARAN_ERROR').text('NO PENAWARAN wajib diisi');
            return false;
        } else {
            $('#NO_PENAWARAN_ERROR').text('');
        }
        var TGL_PENAWARAN = $('#TGL_PENAWARAN').val();
        if (TGL_PENAWARAN == '') {
            $('#TGL_PENAWARAN_ERROR').text('TGL PENAWARAN wajib diisi');
            return false;
        } else {
            $('#TGL_PENAWARAN_ERROR').text('');
        }
        var sanksi_terakhir = $('#sanksi_terakhir').val();
        if (sanksi_terakhir == '') {
            $('#sanksi_terakhir_ERROR').text('sanksi terakhir wajib diisi');
            return false;
        } else {
            $('#sanksi_terakhir_ERROR').text('');
        }
        var id_sanksi = $('#id_sanksi').val();
        if (id_sanksi == '') {
            $('#id_sanksi_ERROR').text('id sanksi wajib diisi');
            return false;
        } else {
            $('#id_sanksi_ERROR').text('');
        }
        var tgl_sanksi = $('#tgl_sanksi').val();
        if (tgl_sanksi == '') {
            $('#tgl_sanksi_ERROR').text('tgl sanksi wajib diisi');
            return false;
        } else {
            $('#tgl_sanksi_ERROR').text('');
        }
        var tgl_akhir = $('#tgl_akhir').val();
        if (tgl_akhir == '') {
            $('#tgl_akhir_ERROR').text('tgl akhir wajib diisi');
            return false;
        } else {
            $('#tgl_akhir_ERROR').text('');
        }
        var punishment = $('#punishment').val();
        if (punishment == '') {
            $('#punishment_ERROR').text('punishment wajib diisi');
            return false;
        } else {
            $('#punishment_ERROR').text('');
        }
        var BLOCKED = $('#BLOCKED').val();
        if (BLOCKED == '') {
            $('#BLOCKED_ERROR').text('BLOCKED wajib diisi');
            return false;
        } else {
            $('#BLOCKED_ERROR').text('');
        }
        $.ajax({
            url: "<?= base_url('crud_kontrak/tambah_aksi') ?>",
            type: "POST",
            dataType: "JSON",
            data: {
                VENDOR_ID: VENDOR_ID,
                PAKET_JENIS: PAKET_JENIS,
                PAGU_KONTRAK: PAGU_KONTRAK,
                TERPAKAI: TERPAKAI,
                RANKING: RANKING,
                NO_PJN: NO_PJN,
                TGL_PJN: TGL_PJN,
                NO_RKS: NO_RKS,
                TGL_RKS: TGL_RKS,
                NO_SPP: NO_SPP,
                TGL_SPP: TGL_SPP,
                NO_PENAWARAN: NO_PENAWARAN,
                TGL_PENAWARAN: TGL_PENAWARAN,
                sanksi_terakhir: sanksi_terakhir,
                id_sanksi: id_sanksi,
                tgl_sanksi: tgl_sanksi,
                tgl_akhir: tgl_akhir,
                punishment: punishment,
                BLOCKED: BLOCKED,
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
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<!--  Button untuk copy, csv, excel -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    $('#example').DataTable({
        dom: 'lBfrtip',
        buttons: ['excel', 'pdf', 'print']
    });
</script>