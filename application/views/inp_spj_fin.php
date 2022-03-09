<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Input SPJ KHS
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pengelolaan Progress</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">SELEKSI VENDOR</header>
                    <div class="panel-body">
                        <font size="2" face="Arial">
                            <form class="form-horizontal tasi-form" method="post">

                                <!-- Textbox Nama Manager -->
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama Manager</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="var_nama_manager">
                                    </div>
                                </div>

                                <!-- Textbox Direksi Pekerjaan -->
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Direksi Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="var_dir_pkj">
                                    </div>
                                </div>

                                <!-- Textbox Direksi lapangan -->
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Direksi Lapangan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="var_dir_lpg">
                                    </div>
                                </div>

                                <!-- Textbox Nilai SPJ -->
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nilai SPJ (Sebelum PPN)</label>
                                    <div class="col-md-2" form-group>
                                        <input type="text" class="form-control" name="min_ppn" id="min_ppn" placeholder="nilai sebelum ppn">
                                    </div>
                                    <div class="col-md-2" form-group>
                                        <input type="text" class="form-control" name="ppn" id="ppn" placeholder="ppn 10%" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="var_nilai_spj" id="nilai" placeholder="nilai setelah ppn" readonly>
                                    </div>
                                </div>

                                <!-- Textbox Lokasi Pekerjaan -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label col-lg-2">Lokasi Pekerjaan</label>
                                    <div class="col-lg-9">
                                        <select class="form-control m-b-10" name="var_lokasi" id="lokasi">
                                            <option value="54000"> KANTOR DISTRIBUSI</option>
                                        </select>
                                    </div>

                                    <!-- Textbox Nomor SKKI/O -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label col-lg-2">Nomor SKKI/O</label>
                                        <div class="col-lg-9">
                                            <select class="form-control m-b-10" name="var_no_skkio">
                                                <option value="0">-- SKKI/SKKO --</option>
                                                <?php foreach ($skk as $sk) : ?>
                                                    <option value="<?php echo $sk->SKKI_ID; ?>"> <?php echo $sk->SKKI_NO; ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>


                                        <!-- Textbox Jenis Pekerjaan -->
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Jenis Pekerjaan</label>
                                            <!-- <div class="col-sm-3">
                                            <label class="radio-inline">
                                                <input type="radio" name="gangguan" value="0"> Non Gangguan
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="gangguan" value="1"> Gangguan
                                            </label>
                                        </div> -->
                                            <div class="col-lg-10">
                                                <label class="radio-inline">
                                                    <input type="radio" name="gangguan" value="0" checked="checked">Non Gangguan
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gangguan" value="1">Gangguan
                                                </label>

                                            </div>
                                        </div>

                                        <!-- Textbox Paket Pekerjaan -->
                                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Paket Pekerjaan</label>
                                        <div class="col-lg-9">
                                            <select class="form-control m-b-10" id="paket" name="var_paket_pekerjaan">
                                                <option value="0">-- Pilih Paket --</option>
                                                <?php foreach ($jenis_paket as $jp) : ?>
                                                    <option value="<?php echo $jp->PAKET_JENIS; ?>"> <?php echo $jp->PAKET_DESKRIPSI; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- tahun skarang date('Y'); -->
                                    <div id="update"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Vendor Yang Tersedia</label>
                                        <div class="col-sm-10">
                                            <table id="availablevendor" class="table table-condensed">
                                                <tr>
                                                    <td>Pilih Paket Pekerjaan</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" name="var_deskripsi_pekerjaan">Deskripsi Pekerjaan</label>
                                        <div class="col-sm-3">
                                            <textarea rows="3" cols="123" name="var_deskripsi_pekerjaan"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Nomor SPJ</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="var_no_spj">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Target Volume</label>
                                        <div class="col-sm-2">
                                            <div class="input-group m-b-10">
                                                <input type="text" class="form-control" name="var_target" id="target">
                                                <span class="input-group-addon" id="satuan"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Metode Pembayaran</label>
                                        <div class="col-sm-2">
                                            <label class="radio-inline">
                                                <input type="radio" name="option_bayar" id="termin" value="1" onClick="javascript:check_termin();">Termin
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group" id="termin_group" style="display:none;">
                                        <label class="col-sm-2 col-sm-2 control-label"></label>
                                        <div class="col-md-1" form-group>
                                            <input type="text" class="form-control" name="var_termin_1" id="termin1">
                                        </div>
                                        <div class="col-md-1" form-group>
                                            <input type="text" class="form-control" name="var_termin_2" id="termin2">
                                        </div>
                                        <div class="col-md-1" form-group>
                                            <input type="text" class="form-control" name="var_termin_3" id="termin3">
                                        </div>
                                        <div class="col-md-1" form-group>
                                            <input type="text" class="form-control" name="var_termin_4" id="termin4">
                                        </div>
                                        <div class="col-md-1" form-group>
                                            <input type="text" class="form-control" name="var_termin_5" id="termin5">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label"></label>
                                        <div class="col-sm-2">
                                            <label class="radio-inline">
                                                <input type="radio" name="option_bayar" id="non_termin" value="0" onClick="javascript:check_termin();">Non Termin
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">SPJ Berlaku Mulai</label>
                                        <div class="col-md-2">
                                            <input type="date" class="form-control" name="var_mulai_berlaku" id="var_mulai_berlaku">
                                        </div>

                                        <label class=" col-sm-2 col-sm-2 control-label">Sampai Dengan</label>
                                        <div class="col-md-2">
                                            <input type="date" class="form-control" name="var_akhir_berlaku" id="var_akhir_berlaku">
                                        </div>
                                    </div>

                                    <link rel="stylesheet" href="//select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">
                                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

                                    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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
                                                    url: "<?php echo base_url(); ?>/inp_spj_fin/getpaket",
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

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button type="submit" class="btn btn-info" onClick="document.getElementById('submitForm').submit()">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </font>
                    </div>

                </section>
            </div>

        </div>

    </section>
</div>



<script>
    $("#paket").change(function() {
        var paket = $("#paket").val();
        var area = $("#lokasi").val();
        var nilai = $("#nilai").val();
        var gangguan = $('input[name=gangguan]:checked').val();
        //alert(gangguan);
        if (paket == 0) {
            $("#availablevendor").html("<tr><td>Pilih Paket Pekerjaan</label></td></tr>");
        } else {
            $.getJSON('getdata.php', {
                'paket_jenis': paket,
                'area': area,
                'nilai': nilai,
                'gangguan': gangguan
            }, function(data) {
                var showData = null;
                $.each(data, function(index, value) {
                    var limit = numeral(value.fin_limit).format('0,0');
                    var sisa = numeral(value.sisa).format('0,0');
                    var kontrak = numeral(value.PAGU_KONTRAK).format('0,0');
                    var terpakai = (value.TERPAKAI / value.PAGU_KONTRAK) * 100;
                    showData += '<tr><td><input type="radio" name="var_vendor" id="optionsRadios1" value="' + value.vendor_id + '"></td><td>' + value.vendor_nama + '</td><td> Limit : Rp.' + limit + '</td><td> Sisa : Rp.' + sisa + '</td><td> Pagu Kontrak : Rp.' + kontrak + '</td><td> Pagu Kontrak Terpakai : ' + terpakai.toPrecision(3) + ' %</td></tr>';
                    //showData += "<option>"+value.vendor_nama+"</option>";
                })

                if (showData == null) {
                    showData = '<tr><td><i>TIDAK ADA VENDOR YANG TERSEDIA</i></td></tr>';
                }
                $("#availablevendor").html(showData);
            })

            $.getJSON('get_satuan.php', {
                'paket_jenis': paket
            }, function(data) {

                //alert(data);
                //$("#target").val(data);
                span = document.getElementById("satuan");
                var str = JSON.stringify(data);
                var satuan_json = str.replace('[["', " ").replace('"]]', " ");
                span.innerText = satuan_json;
                //alert(satuan_json);
            })
        }


    })

    $("#min_ppn").change(function() {
        $("#availablevendor").html("<tr><td>Pilih Paket Pekerjaan</label></td></tr>");
    })

    $("input[name=gangguan]:radio").change(function() {
        $("#availablevendor").html("<tr><td>Pilih Paket Pekerjaan</label></td></tr>");
    })

    $("#min_ppn").keyup(function(event) {
        //var nilai = $("#min_ppn").val().replace(/,/g,"");
        //alert(nilai);
        //var ppn = (10 / 100) * nilai;
        //var total = nilai + ppn;
        $("#ppn").val(Math.floor($("#min_ppn").val().replace(/,/g, "") * 10 / 100).toLocaleString('en'));
        $("#nilai").val(Math.floor($("#min_ppn").val().replace(/,/g, "") * 110 / 100).toLocaleString('en'));
    })

    function check_termin() {
        if (document.getElementById('termin').checked) {
            document.getElementById('termin_group').style.display = 'block';
        } else document.getElementById('termin_group').style.display = 'none';
    }
</script>