<div class="content-wrapper">

  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profile User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                  <?php foreach ((array)$profile as $p) { ?>
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" class="form-control" name="USERNAME" value="<?php echo $p->USERNAME?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input type="text" class="form-control" name="USERNAME" value="<?php echo $p->PASSWORD?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="USERNAME" value="<?php echo $p->email?>" readonly>
                        </div>
                  </div>
                <?php } ?>
            </form>
          
          </div>
      </div>
  </div>    
</div>