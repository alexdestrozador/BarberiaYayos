<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['bpmsaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Información Inválida.";
    }
  }
  ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesión</title>

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <a href="http://localhost/barberiayayos/Pagina/index.php">
        <img src="images/regresar.jpg" class="logo">
      </a>
    <div class="main">      
      

        <div class="signup">
            <form role="form" method="post" action="">
                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
                    echo $msg;
                  }  ?> </p>
                <label for="chk" aria-hidden="true">INICIO DE SESIÓN DE ADMIN</label>
                
                <input type="text" class="user" name="username" placeholder="Usuario" required="true">
                <input type="password" name="password" class="lock" placeholder="Contraseña" required="true">
                <input type="submit" name="login" value="Acceder">

                <div class="forgot-grid">
								
                    <div class="forgot">
                        <a href="http://localhost/barberiayayos/Pagina/index.php">Volver al Inicio</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="forgot-grid">
                    
                    <div class="forgot">
                        <a href="forgot-password.php">¿Olvidaste tu contraseña?</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </form>
        </div>

    </div>
</body>
</html>
