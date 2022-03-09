<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Perizinan
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">PERIZINAN</li>
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
                                        <th>No</th>
                                        <th>No. SPJ</th>
                                        <th>Surat SPJ yang telah dibuat</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>



                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($perijinan as $p) {
                                    ?>
                                        <tr>
                                            <td> <?php echo $no++ ?></td>
                                            <td> <?php echo $p->spj_no ?></td>
                                            <td> <?php echo $p->jumlah_dok ?></td>
                                            <td><?php echo anchor('perijinan/perijinan_add/' . $p->spj_no, '<div><a href="perijinan_add">Add</a></div>') ?></td>


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



                            </table>
                    </div>
                </section>
            </div>
        </div>
    </section>

</div>