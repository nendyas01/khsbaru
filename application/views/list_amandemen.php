<div class="content-wrapper">
    <section class="content-header">
        <h1>
            List Amandemen
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">LIST AMANDEMEN</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">List Amandemen</header>
                    <!--  <a class="btn btn-danger" href=" <?php echo base_url('list_amandemen/print') ?>"> <i></i>
                </a> -->

                    <div class="panel-body table-responsive">
                        <font size="2" face="Arial">
                            <table id="example" class=" table-striped table-bordered " cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No. SPJ</th>
                                        <th>No. Addendum</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Nilai SPJ</th>
                                        <th>Deskripsi Addendum</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($list_amandemen as $la) {
                                    ?>
                                        <tr>
                                            <td> <?php echo $no++ ?></td>
                                            <td> <?php echo $la->SPJ_NO ?></td>
                                            <td> <?php echo $la->ADDENDUM_NO ?></td>
                                            <td> <?php echo $la->SPJ_TANGGAL_AKHIR ?></td>
                                            <td> <?php echo $la->SPJ_NILAI ?></td>
                                            <td> <?php echo $la->ADDENDUM_DESKRIPSI ?></td>

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
                        </font>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>