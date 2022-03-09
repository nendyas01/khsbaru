<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Pengelolaan Data Anggaran
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Input Data SKKI/O</li>
    </ol>
  </section>


  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <section class="panel">


          <div class="panel-body table-responsive">
            <font size="2" face="Arial">
              <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Data SKKI/O</button>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>SKKI JENIS</th>
                    <th>SKKI NO</th>
                    <th>NAMA AREA</th>
                    <th>SKKI NILAI</th>
                    <th>SKKI TERPAKAI</th>
                    <th>SKKI TANGGAL</th>
                    <th colspan="1">Detail</th>
                    <th>Hapus</th>
                    <th>Edit</th>

                  </tr>

                </thead>

                <tbody>
                  <?php
                  // $no = 1;
                  // var_dump($crud_skkio);
                  foreach ((array)$crud_skkio as $cs) {
                  ?>
                    <tr>
                      <td> <?php echo $cs->SKKI_ID ?></td>
                      <td> <?php echo $cs->SKKI_JENIS ?></td>
                      <td> <?php echo $cs->SKKI_NO ?></td>
                      <td> <?php echo $cs->nama_area ?></td>
                      <td> <?php echo 'Rp ' . number_format($cs->SKKI_NILAI, 0, ',', '.') ?></td>
                      <td> <?php echo 'Rp ' . number_format($cs->SKKI_TERPAKAI, 0, ',', '.') ?></td>
                      <td> <?php echo $cs->SKKI_TANGGAL  ?></td>
                      <td><?php echo anchor('crud_skkio/detail_crud_skkio/' . $cs->SKKI_ID, '<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>') ?></td>
                      <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('crud_skkio/hapus/' . $cs->SKKI_ID, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                      <td><?php echo anchor('crud_skkio/edit_crud_skkio/' . $cs->SKKI_ID, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>

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
          <h4 class="modal-title" id="myModalLabel"> Tambah Data SKKI/O</h4>
        </div>

        <div class="modal-body">
          <form method="post" action="<?php echo base_url() . 'crud_skkio/tambah_aksi'; ?>">

            <div class="form-group">
              <label>No</label>
              <input type="number_format" name="SKKI_ID" class="form-control">
            </div>

            <div class="form-group">
              <label>SKKI JENIS</label>
              <select class="form-control" name="SKKI_JENIS" id="SKKI_JENIS">
                <option selected="0">- Pilih Jenis -</option>

                <option value="SKKI">SKKI </option>
                <option value="SKKO">SKKO </option>
              </select>
            </div>
            <div class="form-group">
              <label>SKKI NO</label>
              <input type="text" name="SKKI_NO" class="form-control">
            </div>

            <div class="form-group">
              <label>NAMA AREA</label>
              <select class="form-control" id="AREA_KODE" name="AREA_KODE">
                <option selected="0">- Pilih Nama Area -</option>
                <?php foreach ($nama_area as $area) : ?>
                  <option value="<?php echo $area->AREA_KODE; ?>"> <?php echo $area->AREA_NAMA; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label>SKKI NILAI</label>
              <input type="number_format" name="SKKI_NILAI" class="form-control">
            </div>

            <div class="form-group">
              <label>SKKI TERPAKAI</label>
              <input type="number_format" name="SKKI_TERPAKAI" class="form-control">
            </div>

            <div class="form-group">
              <label>SKKI TANGGAL</label>
              <input type="date" name="SKKI_TANGGAL" class="form-control">
            </div>

            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>