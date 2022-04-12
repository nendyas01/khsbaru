<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<link href="<?php echo base_url() ?>assets/bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/select2/dist/js/select2.min.js"></script>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      DATA MAPPING VENDOR
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Tambah Data Mapping Vendor</li>
    </ol>
  </section>


  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <section class="panel">


          <div class="panel-body table-responsive">
            <div id="pesan-sukses" class="alert alert-success" style="display:none;">
              Data Mapping Vendor berhasil ditambahkan!
            </div>
            <font size="2" face="Arial">
              <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0">
                <button type="button" class="btn btn-primary" onclick="modal_tambah()"><i class="fa fa-plus"></i> Tambah Data</button>
                <br>
                <br>
                <thead>
                  <tr>
                    <th>Tahun</th>
                    <th>Deskripsi Paket</th>
                    <th>Total Vendor</th>
                    <th>Total Area</th>
                    <th>Zona</th>
                    <th>Aksi</th>

                  </tr>

                </thead>

                <tbody id="body-table-mapping">
                  <?php
                  //$no = 1;
                  foreach ($mapping_vendor as $mv) {

                  ?>
                    <tr>
                      <td> <?php echo $mv->MAPPING_TAHUN ?></td>
                      <td> <?php echo $mv->desc_paket ?></td>
                      <td> <button class="btn btn-default btn x-s" onclick="modal_detail(<?php echo $mv->MAPPING_ID ?>)"><?php echo $mv->total_vendor?></button></td>
                      <td> <button class="btn btn-default btn x-s" onclick="modal_detail_area(<?php echo $mv->MAPPING_ID?>)"><?php echo $mv->total_area?></button></td>
                      <td> <?php echo $mv->ZONE ?></td>
                      <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('mapping_vendor/hapus/' . $mv->MAPPING_ID, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                    </tr>
                  <?php } ?>

                  


                  <script>
                    $(document).ready(function() {
                      $('#example').DataTable();

                      $('#body-table-mapping').on('click', '.btn-total-area', function() {
                        $('#mapping-detail').modal('show');
                      });
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
          <h4 class="modal-title" id="myModalLabel"> Tambah Data Mapping Vendor</h4>
        </div>

        <div class="panel-body">

          <form method="post" action="">

            <div class="form-group">
              <label>TAHUN</label>
              <select class="form-control m-b-10" id="MAPPING_TAHUN" name="MAPPING_TAHUN">
                <option value="">-- Pilih Tahun --</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
              </select>
              <small id="MAPPING_TAHUN_ERROR" class="text-danger"></small>
            </div>

            <div class="form-group">
              <label>Paket</label>
              <select class="form-control m-b-10" name="jns_paket" id="PAKET_JENIS">
                <option selected="0">-- Paket Deskripsi --</option>
                <?php foreach ($jenis_paket as $jp) : ?>
                  <option value="<?php echo $jp->PAKET_JENIS; ?>"> <?php echo $jp->PAKET_DESKRIPSI; ?></option>
                <?php endforeach; ?>
              </select>
              <small id="PAKET_JENIS_ERROR" class="text-danger"></small>
            </div>

            <div class="form-group">
              <label>VENDOR</label><br />
              <select class="vendor form-control m-b-10" id="VENDOR_ID" style="width:100%;" name="vendor[]" multiple>
                <option selected="0"></option>
              </select>
              <small id="VENDOR_ID_ERROR" class="text-danger"></small>
            </div>

            <div class="form-group">
              <label>NAMA AREA</label>
              <select class="area form-control m-b-10" style="width:100%;" id="AREA_KODE" name="nama_area[]" multiple>
                <?php foreach ($nama_area as $na) : ?>
                  <option value="<?php echo $na->AREA_KODE; ?>"> <?php echo $na->AREA_NAMA; ?></option>
                <?php endforeach; ?>
              </select>
              <small id="AREA_KODE_ERROR" class="text-danger"></small>
            </div>

            <div class="form-group">
              <label>ZONA</label>
              <select class="form-control m-b-10"id="ZONE" name="ZONA">
                <option value="">-- Pilih Zona --</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
              <small id="ZONE_ERROR" class="text-danger"></small>
              <!-- <input type="text" name="mapping_id"> -->
            </div>
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="button" class="btn btn-primary" onclick="save()">Simpan</button>

            <link rel="stylesheet" href="//select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">

            <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /> -->

            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->
            <style>
              .select2-container--default .select2-selection--multiple .select2-selection__choice {
                background-color: blue;
                border: 1px solid hsl(0, 0%, 66.7%);

              }
            </style>
            
            <script>
              $(document).ready(function() {
                $('#PAKET_JENIS').change(function() {
                  var id = $(this).val();
                  $.ajax({
                    url: "<?php echo base_url(); ?>/mapping_vendor/get_vendor",
                    method: "POST",
                    data: {
                      id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                      var html = '';
                      var i;
                      for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].VENDOR_ID + '">' + data[i].VENDOR_NAMA + '</option>';
                      }
                      $('.vendor').html(html);

                    }
                  });
                });

                $('.vendor').select2();

              });
            </script>

            <script>
              $(document).ready(function() {
                $('#AREA_KODE').change(function() {
                  var id = $(this).val();
                  $.ajax({
                    url: "<?php echo base_url(); ?>/mapping_vendor/getarea",
                    method: "POST",
                    data: {
                      id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                      var html = '';
                      var i;
                      for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].AREA_KODE + '">' + data[i].AREA_NAMA + '</option>';
                      }
                      $('.area').html(html);

                    }
                  });
                });

                $('.area').select2();

              });
            </script>

            <script>
              $(document).on('click', '#select', function() {
                var nama_area = $(this).data('NAMA_AREA');
                $('#nama_area').val(nama_area);
                $('#modal-detail').modal('hide');
              });
            </script>

          </form>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="modal fade" id="modal_detail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">List Nama Vendor</h4>
      </div>
      <div class="modal-body">
      <table class="table table-striped" style="width:100%"> 
          <thead> 
            <tr> 
              <td>NO</td> 
            <td>NAMA VENDOR</td> 
            </tr> 
          </thead> 
          <tbody id="list_vendor"></tbody> 
      </table>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
       
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>

<div class="modal fade" id="modal_detail_area">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">List Nama Area</h4>
      </div>
      <div class="modal-body">
      <table class="table table-striped" style="width:100%"> 
          <thead> 
            <tr> 
              <td>NO</td> 
            <td>NAMA AREA</td> 
            </tr> 
          </thead> 
          <tbody id="list_area"></tbody> 
      </table>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>

  <script>
    function modal_detail(mapping_id){
      $.ajax({
        url: "<?= base_url('mapping_vendor/vendor_name/') ?>"+mapping_id,
        method: "GET",
        dataType: "JSON",
        success: function (response) {
          var html = ''; 
          $.each(response,function(index,value){
            console.log(value); 
            html+='<tr>'+ 
                '<td>'+(index+1)+'</td>'+ 
                '<td>'+value.vendor_nama+'</td>'+ 
                '</tr>'; 
          }); 
            $('#modal_detail').modal('show');
            $('#list_vendor').html(html);
        }
      });      
    }
    
    function modal_detail_area(mapping_id){
      // alert(mapping_id);
      $.ajax({
        url: "<?= base_url('mapping_vendor/area_name/') ?>"+mapping_id,
        method: "GET",
        dataType: "JSON",
        success: function (response) {
          var html = ''; 
          $.each(response,function(index,value){
            console.log(value); 
            html+='<tr>'+ 
                '<td>'+(index+1)+'</td>'+ 
                '<td>'+value.area_nama+'</td>'+ 
                '</tr>'; 
          }); 
          $('#list_area').html(html);
          $('#modal_detail_area').modal('show');
        }
      });      
    }
  </script>

<script>
  function save()
  {
    var MAPPING_TAHUN = $('#MAPPING_TAHUN').val();
    var PAKET_JENIS = $('#PAKET_JENIS').val();
    var VENDOR_ID = $('#VENDOR_ID').val();
    var AREA_KODE = $('#AREA_KODE').val();
    var ZONE = $('#ZONE').val();

    if(MAPPING_TAHUN == ''){
      $('#MAPPING_TAHUN_ERROR').text('Tahun wajib diisi');
      return false;
    }
    else if(PAKET_JENIS == ''){
      $('#PAKET_JENIS_ERROR').text('PAKET_JENIS wajib diisi');
      return false;
    }
    else if (VENDOR_ID == ''){
      $('#VENDOR_ID_ERROR').text('Nama Vendor wajib diisi');
      return false;
    }
    else if (AREA_KODE == ''){
      $('#AREA_KODE_ERROR').text('Nama Area wajib diisi');
      return false;
    }
    else if(ZONE == ''){
      $('#ZONE_ERROR').text('ZONA wajib diisi');
      return false;
    }
    else{
      $.ajax({
        url: "<?= base_url('mapping_vendor/tambah_aksi')?>",
        type: "POST",
        dataType: "JSON",
        data: {
          MAPPING_TAHUN : MAPPING_TAHUN,
          PAKET_JENIS : PAKET_JENIS,
          VENDOR_ID : VENDOR_ID,
          AREA_KODE : AREA_KODE,
          ZONE : ZONE
        },
        success: function(data) {
          $('#pesan-sukses').show();
          $('#myModal').modal('hide');
        }
      });
    }
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

