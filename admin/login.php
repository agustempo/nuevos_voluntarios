<?php 
$pass='techo.nuevos.2015';

if($_POST){
    if($_POST['pass']==$pass){
      session_start();
      $_SESSION['adminuser']=1;
      header('Location: index.php');
      die();
    }
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="../assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">
      
      <form action="login.php" method="post" class="form-signin">
        <?php if($_POST): ?>
      <div class="alert alert-error">
        <button class="close" data-dismiss="alert">&times;</button>
       Password incorrecto
      </div>
      <?php endif; ?>
        <h2 class="form-signin-heading">Inicie Sesi&oacute;n</h2>
        
        <input type="password" name="pass" class="input-block-level" placeholder="Password">
        <!--<label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>-->
        <button class="btn btn-large btn-primary" type="submit">Ingresar</button>
      </form>

    </div> <!-- /container -->
    <script src="../vendors/jquery-1.9.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>