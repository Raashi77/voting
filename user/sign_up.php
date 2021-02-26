<?php
    require_once "../lib/core.php";
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['sign_up']))
        {
            $email=$_POST['email'];
            $name=$_POST['name'];
            $mobile=$_POST['mobile'];
            $ip_address=get_client_ip();
            $password=md5($_POST['password']);
            $sql="select * from users where email='$email'";
            if($result =  $conn->query($sql))
            {
                if($result->num_rows>0)
                {
                    $errorMember="User with this email id already exist. Try another.";
                }
                else
                {
                    $sql = "insert into users(name, email,password, mobile, ip_address, status) values('$name', '$email', '$password', '$mobile', '$ip_address', 1)";
                    if($conn->query($sql))
                    {
                        $resMember="User Registered Successfully";   
                    }
                    else
                    {
                        $errorMember=$conn->error;
                    }
                }
            }    
            
        }  
    }
 
?>

<style>
    .box-body{
	overflow: auto!important;
}
</style>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../admin/plugins/iCheck/square/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background:#3c8dbc;overflow:hidden">
<div class="login-box">
  <div class="login-logo">
    <a href="index.html" style="color:#fff">User SignUp</a>
  </div>
    <?php
            if(isset($resMember))
            {
        ?>
                <div class="alert alert-success"><strong>Success! </strong><?=$resMember?></div>   
        <?php
            }
            else if(isset($errorMember))
            {
        ?>
                <div class="alert alert-danger"><strong>Error! </strong><?=$errorMember?></div> 
        <?php
            }
        ?>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign Up to Join Contest</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" name="name" class="form-control" placeholder="Name" required>
        <span class="glyphicon glyphicon-font form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="mobile" class="form-control" placeholder="Mobile" required>
        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
      <div class="row">
      <div class="col-xs-8">
         
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name ="sign_up" class="btn btn-primary btn-block btn-flat">Sign Up</button>
        </div>
        
        <!-- /.col -->
      </div>
    </form>
   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>


