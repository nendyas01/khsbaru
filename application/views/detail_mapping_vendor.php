<div class="content-wrapper">
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <section class="panel">


          <div class="panel-body table-responsive">
            <font size="2" face="Arial">
              <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0">
                <thead>
                  <tr>
                    <th>Tahun</th>
                    <th>Deskripsi Paket</th>
                    <th>Nama Area</th>
                    <th>Nama Vendor</th>
                    <th>Zona</th>
                  </tr>

                </thead>

                <tbody id="body-table-mapping">
                <?php
                  //$no = 1;
                  foreach ($get as $g) {

                  ?>
                    <tr>
                      <td> <?php echo $g->MAPPING_TAHUN ?></td>
                      <td> <?php echo $g->desc_paket ?></td>
                      <td> <?php echo $g->area_nama ?></button></td>
                      <td> <?php echo $g->vendor_nama ?></span></td>
                      <td> <?php echo $g->ZONE  ?></td>
                      
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

                      $('#body-table-mapping').on('click', '.btn-total-area', function () {
                        $('#mapping-detail').modal('show');
                      });
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

                  <!-- <script type="text/javascript">
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
                  </script> -->
                </tbody>
              </table>
          </div>
        </section>
      </div>
  </section>