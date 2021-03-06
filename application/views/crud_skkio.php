<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Pengelolaan Data Anggaran
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active">Input Data SKKI/O</li>
    </ol>
  </section>


  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <section class="panel">


          <div class="panel-body table-responsive">
            <?php
              $info = $this->session->flashdata('info_edit');
              if (!empty($info)){
                echo '<div class="alert alert-success">'.$this->session->flashdata('info_edit').'</div>';
              }
            ?>
            <div id="pesan-sukses" class="alert alert-success" style="display:none;">
              Data SKKI/O berhasil ditambahkan!
            </div>
            <font size="2" face="Arial">
              <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0">
                <button type="button" class="btn btn-primary" onclick="modal_tambah()"><i class="fa fa-plus"></i> Tambah Data SKKI/O</button>
                <br>
                <br>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>SKKI JENIS</th>
                    <th>SKKI NO</th>
                    <th>NAMA AREA</th>
                    <th>SKKI NILAI</th>
                    <th>SKKI TERPAKAI</th>
                    <th>SKKI TANGGAL</th>
                    <th>Aksi</th>

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
                      <td>
                          <a href ="<?php echo base_url('Crud_skkio/Detail_crud_skkio/' . $cs->SKKI_ID) ?>" class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i> <a>
                          <a href ="<?php echo base_url('Crud_skkio/hapus/' .$cs->SKKI_ID) ?>" onclick="javascript:return confirm('Anda yakin hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> <a>
                          <a href ="<?php echo base_url('Crud_skkio/Edit_crud_skkio/'. $cs->SKKI_ID) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> <a>
                      </td> 
                      
                    </tr>
                  <?php } ?>

                  
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
          <form method="post" action="">

            <div class="form-group">
              <label>No</label>
              <input type="number" name="SKKI_ID" id="SKKI_ID"  class="form-control">
              <small id="SKKI_ID_ERROR" class="text-danger"></small>
            </div>

            <div class="form-group">
              <label>SKKI JENIS</label>
              <select class="form-control" name="SKKI_JENIS" id="SKKI_JENIS">
                <option value="">- Pilih Jenis -</option>
                <option value="SKKI">SKKI </option>
                <option value="SKKO">SKKO </option>
              </select>
              <small id="SKKI_JENIS_ERROR" class="text-danger"></small>
            </div>

            <div class="form-group">
              <label>SKKI NO</label>
              <input type="text" name="SKKI_NO" id="SKKI_NO" class="form-control">
              <small id="SKKI_NO_ERROR" class="text-danger"></small>
            </div>

            <div class="form-group">
              <label>NAMA AREA</label>
              <select class="form-control" name="AREA_KODE" id="AREA_KODE" >
                <option value="">- Pilih Nama Area -</option>
                <?php foreach ($nama_area as $area) : ?>
                  <option value="<?php echo $area->AREA_KODE; ?>"> <?php echo $area->AREA_NAMA; ?></option>
                <?php endforeach; ?>
              </select>
              <small id="AREA_KODE_ERROR" class="text-danger"></small>
            </div>

            <div class="form-group">
              <label>SKKI NILAI</label>
              <input type="number" name="SKKI_NILAI" id="SKKI_NILAI" class="form-control">
              <small id="SKKI_NILAI_ERROR" class="text-danger"></small>
            </div>

            <div class="form-group">
              <label>SKKI TERPAKAI</label>
              <input type="number" name="SKKI_TERPAKAI" id="SKKI_TERPAKAI" class="form-control">
              <small id="SKKI_TERPAKAI_ERROR" class="text-danger"></small>
            </div>

            <div class="form-group">
              <label>SKKI TANGGAL</label>
              <input type="date" name="SKKI_TANGGAL" id="SKKI_TANGGAL" class="form-control">
              <small id="SKKI_TANGGAL_ERROR" class="text-danger"></small>
            </div>

            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="button" class="btn btn-primary" onclick="save()">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
  function save()
  {
    var SKKI_ID = $('#SKKI_ID').val();
    if(SKKI_ID == ''){
      $('#SKKI_ID_ERROR').text('SKKI_ID wajib diisi');
      return false;
    }else{
      $('#SKKI_ID_ERROR').text('');
    }
    var SKKI_JENIS = $('#SKKI_JENIS').val();
    if(SKKI_JENIS == ''){
      $('#SKKI_JENIS_ERROR').text('SKKI_JENIS wajib diisi');
      return false;
    }else{
      $('#SKKI_JENIS_ERROR').text('');
    }
    var SKKI_NO = $('#SKKI_NO').val();
    if(SKKI_NO == ''){
      $('#SKKI_NO_ERROR').text('SKKI_NO wajib diisi');
      return false;
    }else{
      $('#SKKI_NO_ERROR').text('');
    }
    var AREA_KODE = $('#AREA_KODE').val();
    if(AREA_KODE == ''){
      $('#AREA_KODE_ERROR').text('AREA_KODE wajib diisi');
      return false;
    }else{
      $('#AREA_KODE_ERROR').text('');
    }
    var SKKI_NILAI = $('#SKKI_NILAI').val();
    if(SKKI_NILAI == ''){
      $('#SKKI_NILAI_ERROR').text('SKKI_NILAI wajib diisi');
      return false;
    }else{
      $('#SKKI_NILAI_ERROR').text('');
    }
    var SKKI_TERPAKAI = $('#SKKI_TERPAKAI').val();
    if(SKKI_TERPAKAI == ''){
      $('#SKKI_TERPAKAI_ERROR').text('SKKI_TERPAKAI wajib diisi');
      return false;
    }else{
      $('#SKKI_TERPAKAI_ERROR').text('');
    }
    var SKKI_TANGGAL = $('#SKKI_TANGGAL').val();
    if(SKKI_TANGGAL == ''){
      $('#SKKI_TANGGAL_ERROR').text('SKKI_TANGGAL wajib diisi');
      return false;
    }else{
      $('#SKKI_TANGGAL_ERROR').text('');
    }

    $.ajax({
      url: "<?= base_url('Crud_skkio/tambah_aksi')?>",
      type: "POST",
      dataType: "JSON",
      data: {
        SKKI_ID : SKKI_ID,
        SKKI_JENIS : SKKI_JENIS,
        SKKI_NO : SKKI_NO,
        AREA_KODE : AREA_KODE,
        SKKI_NILAI : SKKI_NILAI,
        SKKI_TERPAKAI : SKKI_TERPAKAI,
        SKKI_TANGGAL : SKKI_TANGGAL
      },
      success: function(data) {
        $('#pesan-sukses').show();
        $('#myModal').modal('hide');
        refreshTable();
      }
    });
  }

  function modal_tambah()
  {
    $('#myModal').modal('show');
  }
</script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
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
                      buttons: ['excel', 'pdf', 'print'
                      ]
                    });
  </script>

