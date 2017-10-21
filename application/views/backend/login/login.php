<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Asuransi</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url('asset/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('asset/plugins/datatables/dataTables.bootstrap.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('asset/dist/css/AdminLTE.min.css'); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('asset/dist/css/skins/_all-skins.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/plugins/iCheck/square/blue.css'); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Sim</b>As</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <?=validation_errors(); ?>
        <div>
          <?=$this->session->flashdata('error')?>
          <?=$this->session->flashdata('gagal')?>
          <?=$this->session->flashdata('success')?>
          
          </div> 
            <p class="login-box-msg">Sign in to start your session</p>
             <?php
            $message = $this->session->flashdata('notif');
            if($message){
                echo '<p class="alert alert-danger text-center">'.$message .'</p>';
            }?>
        <?=form_open('En/check_user') ?>
        <!-- <form action="../../index2.html" method="post">
         -->  <div class="form-group has-feedback">
            <input type="text" name='username' class="form-control" placeholder="Username" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name='password' class="form-control" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <select name="role" id="role" class="form-control">
              <option selected="-"></option>
              <option value="admin">Admin</option>
              <option value="nasabah">Nasabah</option>
              <option value="agen">Agen</option>
              <option value="staff">Staff</option>
              <option value="manajer">Manajer</option>
            </select>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>              
            </div>
            </div>
        <?=form_close(); ?>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('asset/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('asset/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('asset/plugins/iCheck/icheck.min.js'); ?>"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
