<div class="content-wrapper">
	<section class="content-header">
		<h1>
			FORM INPUT TAGIHAN
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Pengelolaan Anggaran</li>
			<li class="active">Input Tagihan</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading"></header>
					<div class="panel-body">
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
						<form action="<?= site_url('anggaran/tambah_data') ?>" class="form-horizontal tasi-form" method="post">

							<!-- Textbox Nomor SPJ -->
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Nomor SPJ</label>
								<div class="col-sm-10">
									<!-- <select class="form-control m-b-10" name="var_no_spj" id="spj_no" onChange="nilai_spj_add(this.value)" > -->
									<select class="form-control m-b-10" name="var_no_spj" id="spj_no">
										<option value="">-- Pilih NO SPJ --</option>
										<?php foreach ($no_spj as $spj) : ?>
											<option value="<?php echo $spj->SPJ_NO ?>"><?php echo $spj->SPJ_NO ?></option>
										<?php endforeach ?>
									</select>
									<?= form_error('var_no_spj', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>

							<!-- Textbox Nominal Tagihan -->
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Nominal Tagihan</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="var_nominal_tagihan" id="nilai" placeholder="Nominal Tagihan" readonly>
									<?= form_error('var_nominal_tagihan', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>

							<!-- Tanggal bayar -->
							<div class="form-group">
								<label class=" col-sm-2 col-sm-2 control-label">Tanggal Bayar</label>
								<div class="col-md-2">
									<input type="date" class="form-control" name="var_tanggal_bayar" id="tgl_tagihan">
									<?= form_error('var_tanggal_bayar', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>

							<!-- Textbox Nomor BASTP -->
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Nomor BASTP</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="var_no_bastp" placeholder="Nomor BASTP">
									<?= form_error('var_no_bastp', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>

							<!-- Textbox Deskripsi -->
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
								<div class="col-sm-10">
									<textarea rows="2" cols="125" name="var_deskripsi" placeholder="Nomor SAP"></textarea>
									<?= form_error('var_deskripsi', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>


							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<button type="submit" id="submit" class="btn btn-info">Submit</button>
								</div>
							</div>

						</form>
					</div>
					</header>
				</section>
			</div>

		</div>
	</section>
</div>

<script>
	window.onload = () => {
		$('#spj_no').change(function() {
			var id = this.value;
			// console.log(id);
			$.ajax({
				type: "POST",
				url: "<?= base_url('anggaran/getNilai/'); ?>",
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