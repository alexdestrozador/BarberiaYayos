<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tbladmin where  Email='$email' and MobileNumber='$contactno' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
     header('location:reset-password.php');
    }
    else{
      $msg="Invalid Details. Please try again.";
    }
  }
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesión</title>

    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <a href="Login.php">
        <img src="images/regresar.jpg" class="logo" alt="Regresar">
    </a>
    <div class="main">      
        <div id="page-wrapper">
            <div class="main-page login-page">
                <h3 class="title1">Olvido de contraseña</h3>
                <div class="widget-shadow">
                    <div class="login-top">
                        <h4>Bienvenido nuevamente al panel de administración!</h4>
                    </div>
                    <div class="login-body">
                        <form role="form" method="post" action="">
                            <p style="font-size:16px; color:red; text-align:center;">
                                <?php if($msg) { echo $msg; } ?>
                            </p>
                            <input type="text" name="email" class="lock" placeholder="Email" required>
                            <input type="text" name="contactno" class="lock" placeholder="Número de teléfono" required maxlength="10" pattern="[0-9]+">
                            <input type="submit" name="submit" value="Restablecer">
                            <div class="forgot-grid">
                                <div class="forgot">
                                    <a href="Login.php">Ya tengo una cuenta</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>
