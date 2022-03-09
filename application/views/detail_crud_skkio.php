<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

                  <!--  Button untuk copy, csv, excel -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

                  <!-- <script>
                    $(document).ready(function() {
                      $('#example').DataTable();
                    });
                  </script> -->


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Detail Data SKKI/O
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
   
    </ol>
  </section>


  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <section class="panel">


          <div class="panel-body table-responsive">
            <font size="2" face="Arial">
              <?php $key=$this->db->query("select * from tb_skko_i where SKKI_ID='$ID'");
              $row = $key->row();?>
              <table class="table table-striped">
                <tr>
                  <td>No</td>
                  <td><?php echo $row->SKKI_ID ?></td>
                </tr>
                <tr>
                  <td>SKKI JENIS</td>
                  <td><?php echo $row->SKKI_JENIS ?></td>
                </tr>
                <tr>
                  <td>SKKI NO</td>
                  <td><?php echo $row->SKKI_NO ?></td>
                </tr>
                <tr>
                  <td>NAMA AREA</td>
                  <td><?php echo $row->AREA_KODE ?></td>
                </tr>
                <tr>
                  <td>SKKI NILAI</td>
                  <td><?php echo 'Rp ' . number_format($row->SKKI_NILAI, 0, ',', '.') ?></td>
                </tr>
                <tr>
                  <td>SKKI TERPAKAI</td>
                  <td><?php echo 'Rp ' . number_format($row->SKKI_TERPAKAI, 0, ',', '.') ?></td>
                </tr>
                <tr>
                  <td>SKKI TANGGAL</td>
                  <td><?php echo $row->SKKI_TANGGAL ?></td>
                </tr>
              </table>
              <table id="example" class="table table-striped table-bordered table-responsive mb-5" cellspacing="0">
                <h5>Tabel History sebelumnya</h5>
                
                <thead>
                  <tr>
                    <th>No</th>
                    <th>SKKI JENIS</th>
                    <th>SKKI NO</th>
                    <th>NAMA AREA</th>
                    <th>SKKI NILAI</th>  
                    <th>SKKI TANGGAL</th>
                    <th>TANGGAL UPDATE</th>
                  </tr>

                </thead>

                <tbody>
                  <?php
                  $no = 1;
                  
                  foreach ($history->result() as $cs) {
                  ?>
                    <tr>
                      <td> <?php echo $no ?></td>
                      <td> <?php echo $cs->hjenis ?></td>
                      <td> <?php echo $cs->hno ?></td>
                      <td> <?php echo $cs->AREA_NAMA ?></td>
                      <td> <?php echo 'Rp ' . number_format($cs->hnilai, 0, ',', '.') ?></td>
                      <td> <?php echo $cs->SKKI_TANGGAL  ?></td>
                      <td><?php echo date("d-M-Y G:i:s", $cs->DATE) ?></td>

                    </tr>
                  <?php $no++;} ?>
  
                </tbody>
              </table>
          </div>
        </section>
      </div>
    </div>
  </sectio>
</div>
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
                  <script type="text/javascript">
                    $('#history').DataTable({
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

