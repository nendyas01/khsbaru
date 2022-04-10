<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<div class="content-wrapper">
  <section class="content-header">

      <h1>
        Data Chart
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Data Chart</li>
      </ol>
  </section>
    <section class="content">
        
        <!-- general form elements -->
        <div class="box box-dark">
            <div class="box-header with-border">
              <div class="row">
                <!-- <div class="col-md-6">
                  <h3 class="box-title">Grafik Pencapaian</h3>
                </div> -->
                
              </div>
            </div>

    
            <!-- /.box-header -->
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6">
                    <select name="area_kode" class="form-control area_kode_gangguan"></select>
                  </div>

                  <div class="col-md-4">
                    <select name="tahun" class="form-control tahun"></select>
                  </div>

                  <div class="col-md-1">
                    <button class="btn btn-success" name="btn-filter">Filter</button>
                  </div>
                </div>     

                <div class="row">
                  <div id="container"></div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6">
      
                    <select name="area_kode_paket" class="form-control area_kode_paket"></select>
                  </div>

                  <div class="col-md-4">
                    <select name="tahun_paket" class="form-control tahun_paket"></select>
                  </div>

                  <div class="col-md-1">
                    <button class="btn btn-success" name="btn-filter-bar-chart">Filter</button>
                  </div>
                </div>

                <div class="row mb-5 mt-5">
                  <div class="col-md-12"
                    <figure class="highcharts-figure">
                      <div id="container2"></div>
                    </figure>
                  </div>
                </div>
              </div>
            </div>
          </div>

            <!-- <div class="row">
            
          </div> -->
        <div class="box box-dark mt-5">
            <div class="box-header with-border">
              <div class="row">
                <!-- <div class="col-md-6">
                  <center><h3 class="box-title">                Grafik Perbandingan SPJ dan Pagu Kontrak tiap Vendor</h3></center>
                </div> -->
                
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-md-6"> -->
                
                <div class="row">
                  <div class="col-md-5">
                    <select name="tahun" class="form-control tahun"></select>
                  </div>
                  <div class="col-md-6">
                    <select name="paket_jenis" class="form-control paket"></select>
                  </div>
                  <div class="col-md-1">
                    <button class="btn btn-success" name="btn-filter-line-chart2">Filter</button>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                  
                    <div id="container3"></div>
                  </div>
                </div>

              <!-- </div>
            </div> -->
        </div>

    </section>
  
</div>

<script>
    $(document).ready(function() {

      // $('[name="area_kode"]').prop('disabled', true);

      getChart();
      getArea();
      getTahun();
      getAreaGangguan() ;
      getTahunPaket();
      // getPaket();

      $('[name="btn-filter"]').on('click', function () {
        var area_kode = $('[name="area_kode"]').val();
        var tahun = $('[name="tahun"]').val();
        getChart(tahun, area_kode); 
      });

      //MEMBUAT LINE CHART MENGGUNAKAN FILTER TAHUN PAKET
      // $('[name="tahun"]').on('change', function () {
      //   $('[name="area_kode"]').prop('disabled', false);
      // });

      function getArea() {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>chart/getArea",
          data: "data",
          dataType: "JSON",
          success: function (data) {
            var html = '';
            $.each(data, function (i, val) { 
              html += '<option value="'+val.AREA_KODE+'">'+val.AREA_NAMA+'</option>';
            });
            $('.area_kode_paket').html(html);
          }
        });
      }

      function getAreaGangguan() {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>chart/getArea",
          data: "data",
          dataType: "JSON",
          success: function (data) {
            var html = '';
            $.each(data, function (i, val) { 
              html += '<option value="'+val.AREA_KODE+'">'+val.AREA_NAMA+'</option>';
            });
            $('.area_kode_gangguan').html(html);
          }
        });
      }


      function getTahun(){
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>/chart/getTahun",
          data: "data",
          dataType: "JSON",
          success: function (data) {
            var html = '';
            $.each(data, function (i, val) { 
              html += '<option value="'+val.tahun+'">'+val.tahun+'</option>';
            });
            $('.tahun').html(html);
          }
        });
      }

      function getTahunPaket(){
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>/chart/getTahunPaket",
          data: "data",
          dataType: "JSON",
          success: function (data) {
            var html = '';
            $.each(data, function (i, val) { 
              html += '<option value="'+val.tahun_paket+'">'+val.tahun_paket+'</option>';
            });
            $('.tahun_paket').html(html);
          }
        });
      }



      function getPaket(tahun){
          $.ajax({
              type: "GET",
              url: "<?php echo base_url(); ?>/chart/getPaket?tahun="+tahun,
              data: "data",
              dataType: "JSON",
              success: function (data) {
                console.log(data)
                  var html = '';
                  $.each(data, function (i, val) { 
                  html += '<option value="'+val.PAKET_JENIS+'">'+val.PAKET_DESKRIPSI+'</option>';
                  });
                  $('.paket').html(html);
              },
              error: (error) => {
                console.log(error)
              }
          });
      }

      function getChart(tahun=null, area_kode=null) {
        $.ajax({
          url: "<?php echo base_url(); ?>/chart/getchart",
          method: "POST",
          async: false,
          data:{area_kode:area_kode, tahun:tahun},
          dataType: 'JSON',
          success: function(data) {

            var bulan = [];
            var gangguan = [];
            var non_gangguan = [];

            for (var i in data) {
              bulan.push(data[i].nama_bulan);
              gangguan.push(parseInt(data[i].total_gangguan));
              non_gangguan.push(parseInt(data[i].total_tidak_gangguan));
            }

            // console.log(gangguan);

            Highcharts.chart('container', {
              chart: {
                  type: 'spline'
              },
              title: {
                  text: 'Data Grafik gangguan dan non gangguan'
              },
              
              xAxis: {
                  categories: bulan
              },
              yAxis: {
                  
                  
              },
              tooltip: {
                  crosshairs: true,
                  shared: true
              },
              plotOptions: {
                  spline: {
                      marker: {
                          radius: 4,
                          lineColor: '#666666',
                          lineWidth: 1
                      }
                  }
              },
              series: [{
                  name: 'Gangguan',
                  marker: {
                      symbol: 'square'
                  },
                  data: gangguan
              }, {
                  name: 'non gangguan',
                  marker: {
                      symbol: 'diamond'
                  },
                  data: non_gangguan
              }]
          });
          }
        });
      }

      getBarChart();

      $('[name="btn-filter-bar-chart"]').on('click', function () {
        var area_kode = $('.area_kode_paket').find(":selected").val();
        var tahun = $('.tahun').find(":selected").text();
        //var tahun = $(this).attr('class').replace('tahun ', '');
        getBarChart(tahun, area_kode); 
      });


      function getBarChart(tahun=null, area_kode=null) {
        //result = tahun.substr(1, 4);
// alert(area_kode);

        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>chart/getBarchart",
            data: {area_kode:area_kode, tahun:tahun},
            dataType: "JSON",
            success: function (data) {
               console.log(data);
                var paket1 = [];
                var paket2 = [];
                var paket3 = [];
                var bulan = [];
                // var spj_nilai=[];
                
                for (var i in data) {
                  // spj_nilai.push(data[i].nilai_spj);
                  bulan.push(data[i].nama_bulan);
                  paket1.push(parseInt(data[i].paket_1));
                  paket2.push(parseInt(data[i].paket_2));
                  paket3.push(parseInt(data[i].paket_3));
                }

                console.log(paket2);
                console.log(paket1);
                console.log(paket3);
            // console.log(paket1);
              Highcharts.chart('container2', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Grafik berdasarkan Paket'
                },
                xAxis: {
                    categories: bulan
                },
                yAxis: {
                    // categories: spj_nilai
                    
                },
                tooltip: {
                    pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> <b></b>',
                    shared: true
                },
                plotOptions: {
                    column: {
                        stacking: 'percent'
                    }
                },
                series: [
                  {
                    name: 'Paket 3',
                    data: paket3
                  }, {
                      name: 'Paket 2',
                      data: paket2
                  }, {
                      name: 'Paket 1',
                      data: paket1
                  }
                ]
              });
                            
            }
        });
      }

      getLineChart2();
      // getPaket();

      $('[name="btn-filter-line-chart2"]').on('click', function () {
        var paket_jenis = $('[name="paket_jenis"]').val();
        var tahun = $('[name="tahun"]').val();
        getLineChart2(tahun, paket_jenis); 
      });

      $('[name="tahun"]').on('change', ((e)=>{
        getPaket($(e.target).val())
      }))

      function getLineChart2(tahun=null, paket_jenis=null){
          $.ajax({
              url: "<?php echo base_url(); ?>/chart/getLineChart2",
              method: "POST",
              async: false,
              data:{paket_jenis:paket_jenis, tahun:tahun},
              dataType: 'JSON',
              success: function(data) {   
                  var pagu = [];
                  var spj = [];
                  var vendor = [];

                  for (var i in data) {
                  vendor.push(data[i].nama_vendor);
                  pagu.push(parseInt(data[i].total_pagu));
                  spj.push(parseInt(data[i].total_spj_nilai));
                  }
                  Highcharts.chart('container3', {

                      title: {
                          text: 'Grafik perbandingan pagu dan spj'
                      },

                      // subtitle: {
                      //     text: 'Source: thesolarfoundation.com'
                      // },

                      yAxis: {
                          title: {
                              text: 'Amount'
                          }
                      },

                      xAxis: {
                          categories:vendor,
                          // accessibility: {
                          //     rangeDescription: 'Nama vendor',
                          // },
                      },

                      legend: {
                          layout: 'vertical',
                          align: 'right',
                          verticalAlign: 'middle'
                      },

                      plotOptions: {
                          series: {
                              label: {
                                  connectorAllowed: false
                              },
                              pointStart: 1
                          }
                      },

                      series: [{
                         
                          name: 'Jumlah Pagu Kontrak',
                          data: pagu
                      }, {
                          name: 'Jumlah SPJ',
                          data: spj
                      }],

                      responsive: {
                          rules: [{
                              condition: {
                                  maxWidth: 500
                              },
                              chartOptions: {
                                  legend: {
                                      layout: 'horizontal',
                                      align: 'center',
                                      verticalAlign: 'bottom'
                                  }
                              }
                          }]
                      }

                  });

              }
          });
      }
  });
  
</script>


