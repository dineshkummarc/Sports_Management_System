<?php
require_once("include/initialize.php");
  if(isset($_SESSION['USERID'])){
   // redirect("index.php");
    // header("Location: index.php");
    if ($_SESSION['TYPE'] == 'Administrator'){
         redirect("Location: index.php");
    }elseif($_SESSION['TYPE'] == 'Facilitator'){
        header("Location: module/utilities");
    }
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BASKETBALL TOURNAMENT | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo  WEB_ROOT;?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo  WEB_ROOT;?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo  WEB_ROOT;?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=".<?php echo  WEB_ROOT;?>index2.html"><b style="font-family:Segoe Script">BASKETBALL TOURNAMENT</b></a>
  </div>
  <!-- /.login-logo -->
    <div class="card card-orange">
              <div class="card-header">
                <h3 class="card-title">LOGIN To Start Session</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="#">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="userpass" placeholder="Password">
                  </div>
                <!-- /.card-body -->
                  <button type="submit" name="btnLogin" class="btn btn-primary" style="width: 100%">Login</button>
              </div>
              </form>
            </div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo  WEB_ROOT;?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo  WEB_ROOT;?>dist/js/adminlte.min.js"></script>

</body>
</html>
<?php 

if(isset($_POST['btnLogin'])){

 
  $email = trim($_POST['username']);
  $upass  = trim($_POST['userpass']);
  $h_upass = sha1($upass);
  

     if ($email == '' OR $upass == '') {

        message("Invalid Username and Password!", "error");
        redirect("login.php");
           
      } else {  
    //it creates a new objects of member
      $user = new User();
      //make use of the static function, and we passed to parameters
      
        $res = $user::AuthenticateUser($email, $h_upass);

        if ($res==true) { 
            echo "<script type='text/javascript'>alert('You logon as'".$_SESSION['TYPE']."')</script>";
           //message("You logon as ".$_SESSION['ACCOUNT_TYPE'].".","success");
          if ($_SESSION['TYPE']=='Administrator'){

            $_SESSION['USERID']       = $_SESSION['USERID'];
            $_SESSION['NAME'] = $_SESSION['NAME'] ;
            $_SESSION['USERNAME']   = $_SESSION['USERNAME'];
            $_SESSION['TYPEID']      = $_SESSION['TYPEID'];
            $_SESSION['TYPE']       = $_SESSION['TYPE'];

            ?>
               <script language="javascript">
                  window.location.href = "index.php"
              </script>
              <?php
          } 
        }else{
          echo "<script type='text/javascript'>alert('Account does not exist! Contact Administrator.'); window.location.href = 'index.php'</script>";
       }
      }
 }


 ?> 