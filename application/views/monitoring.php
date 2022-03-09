<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Monitoring Perizinan
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">BA Survey</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">Monitoring Perizinan</header>
                    <!--  <a class="btn btn-danger" href=" <?php echo base_url('monitoring_add') ?>"> <i></i>
                </a> -->

                    <div class="panel-body table-responsive">
                        <font size="2" face="Arial">
                            <table id="example" class=" table-striped table-bordered " cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No. SPJ</th>
                                        <th>Lokasi Perizinan</th>
                                        <th>No. Surat PTSP</th>
                                        <th>Tanggal Keluar Surat PTSP</th>
                                        <th>Hasil Survey</th>
                                        <th>Tanggal Survey</th>
                                        <th>Tanggal Keluar SKRD</th>
                                        <th>Pembayaran Retribusi</th>
                                        <!--isinya dibayar tgl berapa-->
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($monitoring as $m) {

                                        $terpakai = 0;
                                    ?>
                                        <tr>
                                            <td> <?php echo $no++ ?></td>
                                            <td> <?php echo $m->spj_no ?></td>
                                            <td> <?php echo $m->lokasi ?></td>
                                            <td> <?php echo $m->surat_ijin_no ?></td>
                                            <td> <?php echo $m->tgl_surat_keluar ?></td>
                                            <td> <?php echo $m->hasil_survey ?></td>
                                            <td> <?php echo $m->tgl_survey ?> </td>
                                            <td> <?php echo $m->tgl_terbit_skrd ?></td>
                                            <td> <?php echo $m->biaya_retribusi ?></td>
                                            <td><?php echo anchor('monitoring/monitoring_add/' . $m->spj_no, '<div><a href="monitoring_add">Upload</a></div>') ?></td>
                                        </tr>
                                    <?php } ?>

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
        </div>
    </section>
    </section>
</div>