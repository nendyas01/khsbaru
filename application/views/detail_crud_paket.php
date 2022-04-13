<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <center>
                            <h3 class="box-title">Detail Data Paket</h3>
                        </center>
                    </div>

                    <table class="table">
                        <tr>
                            <th>Paket Jenis</th>
                            <td><?php echo $detail_crud_paket->PAKET_JENIS ?></td>
                        </tr>
                        <tr>
                            <th>Paket Deskripsi</th>
                            <td><?php echo $detail_crud_paket->PAKET_DESKRIPSI ?></td>
                        </tr>
                        <tr>
                            <th>Satuan</th>
                            <td><?php echo $detail_crud_paket->SATUAN ?></td>
                        </tr>
                        <tr>
                            <th>Paket Deskripsi 2</th>
                            <td><?php echo $detail_crud_paket->PAKET_DESKRIPSI2 ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><?php echo $detail_crud_paket->STATUS ?></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </section>
</div>