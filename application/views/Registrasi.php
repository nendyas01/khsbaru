<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>

<head>
  <base href="<?php echo base_url(); ?>">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registrasi User</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="assets/plugins/iCheck/icheck.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition register-page">
  <div class="login-box">
    <div class="login-logo">
      <a href=""><strong>Form</strong> Registrasi User</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg ">Silahkan mengisi form registrasi!</p>
    
      <form class="user" action="<?= base_url('registrasi/savedaftar') ?>" name="formInput" onsubmit="validasiEmail();" id="regis"  method="post">
      <div id="notif"></div>
      <br>
      <div class="form-group has-feedback">
          <label> Username</label>
          <input type="text" name="USERNAME" id="username" class="form-control" placeholder="">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <label>Email</label>
          <input type="email" name="email"  class="form-control" placeholder="">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <label>Password</label>
          <!-- input type="password" name="id" class="form-control" placeholder="Password"> ini juga sama harus disamain kayak parameter yang kamu kirim -->
          <input type="password" name="password" class="form-control" placeholder="">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <label>Akses Role</label>
          <select class="form-control" id="role_nama" name="role_nama">
            <option selected="0">- Pilih Akses Role -</option>
            <?php foreach ($role as $r) : ?>
              <option value="<?php echo $r->role_id; ?>"> <?php echo $r->role_nama; ?></option>
            <?php endforeach; ?>
          </select>
          <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
        </div>

        <div class="form-group has-feedback">
          <label>Jabatan</label>
          <input type="text" name="jabatan" class="form-control" placeholder="">
          <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
        </div>

        <div class="form-group has-feedback">
          <label>Nama Area</label>
          <select class="form-control" id="AREA_KODE" name="AREA_KODE">
            <option selected="0">- Pilih Nama Area -</option>
            <?php foreach ($nama_area as $area) : ?>
              <option value="<?php echo $area->AREA_KODE; ?>"> <?php echo $area->AREA_NAMA; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="row">
          <div class="col-xs-8">

          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <script>
        $("#regis").on('submit',function(e){
          var rs = document.forms["formInput"]["email"].value;
          var atps=rs.indexOf("@pln");
          var dots=rs.lastIndexOf(".co.id");
          if (atps<1 || dots<atps+2 || dots+2>=rs.length) {
          alert("Email harus bertype @pln.co.id")
            return false;
          } else {
            e.preventDefault();

    $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function (response) {
                Swal.fire({
                    title: "Informasi",
                    text: "Selamat! Kamu berhasil melakukan registrasi. Silahkan Login",
                    icon: "success",
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        window.location = "login/";
                    })
            },
            error : function (e){
                alert(
                    "Ada kesalahan sistem"
                )
            }
        });
	}
				
				}); 
      </script>
      <!-- <script type="text/javascript">
	$(document).ready(function()
	{
		$("#masuker").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Incorrect username or password!',
					  'warning'
					)
				}else{
					window.location=dt
				}
			  }
			});
		});
		});
	</script> -->



    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->

  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
</body>

</html>
