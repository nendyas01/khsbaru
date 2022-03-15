<div class="content-wrapper">
    <section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <center><h3 class="box-title">Detail Data Vendor</h3></center>
            </div>

        <table class="table">
            <tr>
                <th>ID</th>
                <td><?php echo $detail_crud_vendor->VENDOR_ID ?></td>
            </tr>
            <tr>
                <th>Nama Vendor</th>
                <td><?php echo $detail_crud_vendor->VENDOR_NAMA ?></td>
            </tr>
            <tr>
                <th>Tahun</th>
                <td><?php echo $detail_crud_vendor->TAHUN ?></td>
            </tr>
            <tr>
                <th>Direksi Vendor</th>
                <td><?php echo $detail_crud_vendor->DIREKSI_VENDOR ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $detail_crud_vendor->EMAIL ?></td>
            </tr>
            <tr>
                <th>Telepon</th>
                <td><?php echo $detail_crud_vendor->TELEPON ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?php echo $detail_crud_vendor->STATUS ?></td>
            </tr>
            <tr>
                <th>Email_2</th>
                <td><?php echo $detail_crud_vendor->EMAIL_2 ?></td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td><?php echo $detail_crud_vendor->JABATAN ?></td>
            </tr>

        </table>
    </section>
</div>