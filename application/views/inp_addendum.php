<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Addendum
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
                    <header class="panel-heading">INPUT ADDENDUM</header>
                    <div class="panel-body">
                        <font size="2" face="Arial">
                            <form class="form-horizontal tasi-form" method="post">

                                <div class="panel-body" onload=disableselect();>
                                    <form class="form-horizontal tasi-form" method="post" action="<?php echo base_url() . 'inp_addendum_submit.php'; ?>">

                                        <!-- no spj -->
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label col-lg-2">Nomor SPJ</label>
                                            <div class="col-lg-10">
                                                <select class="form-control m-b-10" name="var_no_spj" id="spj">
                                                    <option selected="">-- NO SPJ --</option>
                                                    <?php foreach ($nomorspj as $n) : ?>
                                                        <option value="<?php echo $n->SPJ_DESKRIPSI; ?>"> <?php echo $n->SPJ_NO; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label"></label>
                                            <div class="col-sm-10">

                                                <div class="col-md-6 form-group">
                                                    <div class="alert alert-info" id="spjdata">
                                                        <strong>Silahkan Memilih No SPJ!</strong>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- nomor addendum -->
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Nomor Addendum</label>
                                            <div class="col-sm-10" id="no_add">
                                                <input type="text" class="form-control" name="var_no_addendum">
                                            </div>
                                        </div>

                                        <!-- Textbox Nilai SPJ -->
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Nilai Addendum (Sebelum PPN)</label>
                                            <div class="col-md-2" form-group>
                                                <input type="text" class="form-control" name="min_ppn" id="min_ppn" placeholder="nilai sebelum ppn">
                                            </div>
                                            <div class="col-md-2" form-group>
                                                <input type="text" class="form-control" name="ppn" id="ppn" placeholder="ppn 10%" readonly>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="var_nilai_addendum" id="nilai" placeholder="nilai setelah ppn" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class=" col-sm-2 col-sm-2 control-label">Tanggal Addendum</label>
                                            <div class="col-md-2">
                                                <input type="date" class="form-control" name="var_tanggal_add" id="tgl_amd">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class=" col-sm-2 col-sm-2 control-label">Tanggal Akhir SPJ (Jika Berubah)</label>
                                            <div class="col-md-2">
                                                <input type="date" class="form-control" name="var_tanggal_akhir" id="tgl_add">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">SKKI/O Awal</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="var_skki_awal" id="skki_awal" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label col-lg-2">SKKI/O Tujuan</label>
                                            <div class="col-lg-10">
                                                <select class="form-control m-b-10" name="var_skki_tujuan" id="skki_tujuan">
                                                    <option value="-">- (Pilih Jika SKKI/O Tidak Berubah)</option>
                                                    <?php foreach ($skkio as $skk) : ?>
                                                        <option value="<?php echo $skk->SKKI_ID; ?>"> <?php echo $skk->SKKI_NO; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                                            <div class="col-sm-3">
                                                <textarea></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </font>
                    </div>
                </section>
            </div>
        </div>
    </section><!-- /.content -->
</div>

<!-- ------------------------------------------------------------------------------------------------------------------ -->

<script>
    function dateFormat(date) {
        var d = date.getDate().toString();
        d = d.length > 1 ? d : '0' + d;
        var m = (date.getMonth() + 1).toString();
        m = m.length > 1 ? m : '0' + m;
        var y = date.getFullYear().toString();
        return d + '-' + m + '-' + y;
    }

    $("#min_ppn").keyup(function(event) {
        //var nilai = $("#min_ppn").val().replace(/,/g,"");
        //alert(nilai);
        //var ppn = (10 / 100) * nilai;
        //var total = nilai + ppn;
        $("#ppn").val(Math.floor($("#min_ppn").val().replace(/,/g, "") * 10 / 100).toLocaleString('en'));
        $("#nilai").val(Math.floor($("#min_ppn").val().replace(/,/g, "") * 110 / 100).toLocaleString('en'));
    })

    $("#spj").change(function() {
        var spj = $("#spj").val();
        var area = "<?php echo $_SESSION['area'] ?>"
        //alert(spj);
        //alert(area);

        if (spj == 0) {
            $("#spjdata").html("<strong>Pilih No SPJ!</strong>");
        } else {
            $.getJSON('getspj.php', {
                'no_spj': spj,
                'area': area
            }, function(data) {
                var showData = "";
                $.each(data, function(index, value) {
                    var d_awal = new Date(value.SPJ_TANGGAL_MULAI);
                    var d_akhir = new Date(value.SPJ_TANGGAL_AKHIR);
                    var akhir = dateFormat(d_akhir);
                    var awal = dateFormat(d_awal);
                    var nilai_spj = numeral(value.SPJ_NILAI);
                    nilai_spj = nilai_spj.format('0,0');
                    var paket = value.PAKET_JENIS;
                    var gangguan = value.gangguan;
                    //alert(paket);
                    //if (paket == 11 || paket == 9 || gangguan == 1){
                    //if (paket == 11 || gangguan == 1){
                    /*	if (gangguan == 1){
                    	 document.getElementById("skki_tujuan").disabled = true;
                    	 //$("#skki_tujuan").html("<option value="">- (Pilih Jika SKKI/O Tidak Berubah)</option>");
                    	 $("#skki_tujuan").val("-");
                    }*/

                    //var test = $("#skki_tujuan").val();
                    //alert (test);
                    showData += "<table><tr><td>No SPJ</td><td>:</td><td>" + value.SPJ_NO + "</td></tr><tr><td>Nama Vendor</td><td>:</td><td>" + value.VENDOR_NAMA + "</td></tr><tr><td>Nilai SPJ</td><td>:</td><td>Rp." + nilai_spj + "</td></tr><tr><td>Tanggal Awal</td><td>:</td><td>" + awal + "</td></tr><tr><td>Tanggal Akhir</td><td>:</td><td>" + akhir + "</td></tr></table>";
                })
                $("#spjdata").html(showData);

            })

            $.getJSON('get_skki.php', {
                'no_spj': spj
            }, function(data) {

                $.each(data, function(index, value) {
                    var skki_awal = value.skki_no;
                    //alert(skki_awal);
                    document.getElementById("skki_awal").value = skki_awal;
                })
            })
        }
    })
</script>

</html>