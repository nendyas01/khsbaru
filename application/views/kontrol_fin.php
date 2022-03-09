<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Kontrol Finansial
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Kontrol Finansial</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">DATA FINANSIAL VENDOR</header>
                    <!--  <a class="btn btn-danger" href=" <?php echo base_url('kontrol_fin/print') ?>"> <i></i>
                </a> -->


                    <div class="panel-body table-responsive">
                        <font size="2" face="Arial">
                            <table id="example" class=" table-striped table-bordered " cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Tahun</th>
                                        <th>Vendor</th>
                                        <th>Jenis Pekerjaan</th>
                                        <th>Zona</th>
                                        <th>Pagu Finansial</th>
                                        <th>Sisa Finansial</th>
                                        <th>% Pagu Finansial</th>
                                        <th>Pagu Kontrak</th>
                                        <th>% Kontrak</th>
                                        <th>Total Area</th>
                                        <th>Actions Pagu Kontrak</th>
                                        <th>Actions Pagu Rating</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kontrol_fin as $kf) {
                                        $sisa = $kf->fin_limit - $kf->fin_current;
                                        $terpakai = 0;
                                    ?>
                                        <tr>
                                            <td> <?php echo $kf->tahun ?></td>
                                            <td> <?php echo $kf->vendor_nama ?></td>
                                            <td> <?php echo $kf->paket_deskripsi ?></td>
                                            <td> <?php echo $kf->zone ?></td>
                                            <td> <?php echo 'Rp ' . number_format($kf->fin_limit, 0, ',', '.') ?></td>
                                            <td> <?php echo 'Rp ' . number_format($sisa, 0, ',', '.') ?></td>
                                            <td> <?php echo floor($sisa / $kf->fin_limit * 100) . '%' ?> </td>
                                            <td> <?php echo 'Rp ' . number_format($kf->PAGU_KONTRAK, 0, ',', '.') ?></td>
                                            <td> <?php echo floor($kf->PERSEN_KONTRAK) . '%' ?>
                                            <td> <?php echo $kf->jumlah_area ?></td>
                                            <td> <?php echo anchor('kontrol_fin/aksi_pagu_kontrak/' . $kf->tahun, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
                                            <td> <?php echo anchor('kontrol_fin/aksi_pagu_rating/' . $kf->tahun, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
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
</div>