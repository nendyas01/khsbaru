<?php include 'template/header.php'; ?>

<body>

    <?php include 'template/nav_header.php'; ?>
    <div class="container">
        <h5 class="text text-info" style="font-family: arial;font-size: 20px;text-align: center;">Data Mahasiswa dengan datatables</h5>
        <?php if ($pesan = $this->session->flashdata('pesan')) : ?>
            <div class="row">
                <div class="col-md-12" align="center">
                    <div class="alert alert-success" role="alert">
                        <span class="fa fa-success" aria-hidden="true"></span>
                        <span class="sr-only">success:</span>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $pesan; ?>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <div class="row">
            <div class="col-md-12">

                <table id="datatable" class="table table-hover table-striped">
                    <thead>
                        <tr class="badge-success">
                            <th>No</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>status</th>
                            <?php
                            if ($level == 'admin') { ?>
                                <th><a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#AddModal"><i class="fa fa-plus"></i> Tambah Data</a></th>
                            <?php }

                            ?>

                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    if ($data->num_rows() > 0) {
                        foreach ($data->result() as $row) {
                    ?>
                            <tr id="delete<?php $row->id; ?>">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->nim; ?></td>
                                <td><?php echo $row->nama; ?></td>
                                <td><?php echo $row->alamat; ?></td>
                                <?php if ($row->status == "Aktif") : ?>
                                    <td>
                                        <span class="badge badge-success">
                                            <?php echo $row->status; ?>
                                        </span>
                                    </td>
                                <?php else : ?>
                                    <td>
                                        <span class="badge badge-danger">
                                            <?php echo $row->status; ?>
                                        </span>
                                    </td>
                                <?php endif ?>

                                <?php if ($level == "admin") { ?>
                                    <td>
                                        <a href="<?php echo base_url("c_mahasiswa/EditMahasiswa/{$row->id}") ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Mahasiswa" data-original-title="Tooltip on bottom" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>

                                        <a onclick="deletedata(<?php echo $row->id ?>)" href="#" data-toggle="tooltip" data-placement="bottom" title="Hapus Mahasiswa" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                        <a href="<?php echo base_url("Report/cetakbidata/{$row->id}") ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Cetak Biodata" data-original-title="Tooltip on bottom" class="btn btn-sm btn-info"><i class="fa fa-print"></i> Cetak</a>

                                    </td>

                                <?php } ?>

                            </tr>

                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php include 'template/mahasiswa_input_modal.php'; ?>
</body>
<?php include 'template/footer.php'; ?>

<script>
    function deletedata(id) {
        swal({
                title: "Anda Yakin?",
                text: "Data <?php echo $row->nama; ?> Akan Dihapus Secara Permanen!",
                type: "warning",
                showCancelButton: true,
                // confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function() {
                $.ajax({
                    url: "<?php echo base_url('c_mahasiswa/DeleteMahasiswa/') ?>",
                    type: "post",
                    data: {
                        id: id
                    },
                    success: function() {
                        swal('Data Berhasil Di Hapus', ' ', 'success');
                        $("#delete" + id).fadeTo("slow", 0.7, function() {
                            $(this).remove();
                        })

                    },
                    error: function() {
                        swal('data gagal di hapus', 'error');
                    }
                });

            });
    }
</script>