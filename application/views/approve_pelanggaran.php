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
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">Approve Pelanggaran</header>

                    <div class="panel-body table-responsive">
                        <font size="2" face="Arial">
                            <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Pelanggaran</th>
                                        <th>Vendor</th>
                                        <th>Tanggal</th>
                                        <th>Area</th>
                                        <th>No SPJ</th>
                                        <th>No KHS</th>
                                        <th>Paket</th>
                                        <th>Jenis Pelanggaran</th>
                                        <th>Evidence 1</th>
                                        <th>Evidence 2</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($approve_pelanggaran as $ap) {
                                    ?>
                                        <tr>
                                            <td> <?php echo $no++ ?></td>
                                            <td> <?php echo $ap->no_pelanggaran ?></td>
                                            <td> <?php echo $ap->VENDOR_NAMA ?></td>
                                            <td> <?php echo $ap->tgl_kejadian ?></td>
                                            <td> <?php echo $ap->AREA_NAMA ?></td>
                                            <td> <?php echo $ap->no_spj ?></td>
                                            <td> <?php echo $ap->no_KHS ?></td>
                                            <td> <?php echo $ap->PAKET_DESKRIPSI ?></td>
                                            <td> <?php echo $ap->nama_kel_pelanggaran ?></td>
                                            <td> <?php echo $ap->evidence2 ?></td>
                                            <td> <?php echo $ap->evidence1 ?></td>

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
                                            dom: 'Bfrtip',
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
                        </font>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>