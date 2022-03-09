<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pengajuan Perizinan Baru
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pengajuan Perizinan Baru</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading"></header>
                    <div class="panel-body" onload=disableselect();>
                        <?php if ($this->session->flashdata('sukses')) : ?>
                            <div class="callout callout-success">
                                <h4>Sukses!</h4>
                                <?= $this->session->flashdata('sukses'); ?>
                            </div>
                        <?php elseif ($this->session->flashdata('gagal')) : ?>
                            <div class="callout callout-danger">
                                <h4>Warning!</h4>
                                <?= $this->session->flashdata('gagal'); ?>
                            </div>
                        <?php endif; ?>
                        <form class="form-horizontal tasi-form" method="post" action="Pengajuan_submit">

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nomor SPJ</label>
                                <div class="col-sm-10">
                                    <input type="text" name="spj" id="spj" placeholder="Masukan nama SPJ" class="form-control">
                                    <?= form_error('var_no_spj', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" col-sm-2 col-sm-2 control-label">Tanggal Penyerahan Dokumen</label>
                                <div class="col-md-2">
                                    <input type="date" class="form-control" name="var_tgl_serah" id="datepick">
                                    <?= form_error('var_tgl_serah', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" col-sm-2 col-sm-2 control-label">Jumlah Dokumen yang Diserahkan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="var_jumlah_dok" id="var_jumlah_dok" placeholder="Jumlah Dokumen Yang Diserahkan">
                                    <?= form_error('var_jumlah_dok', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-10"><textarea class="form-control" name="var_keterangan" id="var_keterangan" placeholder="Keterangan"></textarea></div>
                                <?= form_error('var_keterangan', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-info" onclick="document.getElementById('submitForm').submit()">Submit</button>
                                </div>
                            </div>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


                            <!-- <script type='text/javascript' src='<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>'></script> -->
                            <script type='text/javascript' src='<?php echo base_url() . 'assets/js/bootstrap.js' ?>'></script>
                            <script type='text/javascript' src='<?php echo base_url() . 'assets/js/jquery-ui.js' ?>'></script>

                            <script type='text/javascript'>
                                $(document).ready(function() {
                                    $('#spj').autocomplete({
                                        source: "<?php echo site_url('pengajuan/get_autofill/?') ?>",

                                    });
                                });
                            </script>

                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section><!-- /.content -->
</div>

<script>
    window.onload = () => {
        $('#spj_no').change(function() {
            var id = this.value;
            // console.log(id);
            $.ajax({
                type: "POST",
                url: "<?= base_url('pengajuan/getNilai/'); ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(data) {
                    console.log(data.nilai);
                    $('#nilai').val(data.nilai);
                }
            })
        })

        $.getJSON('get_termin', {
            'spj_no': spj_no
        }, function(data) {
            if (data == 0) //non termin
            { //alert("non termin");
                $.getJSON('get_val', {
                    'spj_no': spj_no
                }, function(data) {
                    if (data < 100) {
                        alert("Tidak Bisa Input Pembayaran, Progress Belum 100%");
                        document.getElementById("submit").disabled = true;
                    } else {
                        document.getElementById("submit").disabled = false;
                    }
                })

            }

            if (data == 1) // termin
            { //alert(" termin");
                $.getJSON('get_val', {
                    'spj_no': spj_no
                }, function(data_progress) {
                    $.getJSON('get_nilai_termin1', {
                        'spj_no': spj_no
                    }, function(data_termin) {
                        if (data_progress <= data_termin) {
                            alert("Tidak Bisa Input Pembayaran Dikarenakan Progress Belum Sesuai dengan Termin");
                            document.getElementById("submit").disabled = true;
                        } else {
                            document.getElementById("submit").disabled = false;
                        }
                    })
                })
            }

        })



    }
</script>