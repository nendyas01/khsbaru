<div class="content-wrapper">
    <section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <center><h3 class="box-title">Detail Data User</h3></center>
            </div>

        <table class="table">
            <tr>
                <th>USERNAME</th>
                <td><?php echo $detail_crud_user->USERNAME ?></td>
            </tr>
            <tr>
                <th>ID Role</th>
                <td><?php echo $detail_crud_user->role_id ?></td>
            </tr>
            <tr>
                <th>Kode Area</th>
                <td><?php echo $detail_crud_user->AREA_KODE ?></td>
            </tr>

        </table>
    </section>
</div>