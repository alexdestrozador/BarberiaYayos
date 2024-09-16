<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);

        $query=mysqli_query($con,"update tbladmin set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
   if($query)
   {
echo "<script>alert('Password successfully changed');</script>";
session_destroy();
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
    <a href="forgot-password.php">
        <img src="images/regresar.jpg" class="logo" alt="Regresar">
    </a>
    <div class="main">      
        <div id="page-wrapper">
            <div class="main-page login-page">
                <h3 class="title1">Restablecer contraseña</h3>
                <div class="widget-shadow">
                    <div class="login-top">
                        <h4>Bienvenido al AdminPanel!</h4>
                    </div>
                    <div class="login-body">
                        <form role="form" method="post" action="">
                            <p style="font-size:16px; color:red; text-align:center;">
                                <?php if($msg) { echo $msg; } ?>
                            </p>
                            <input type="password" name="newpassword" class="lock" placeholder="Nueva Contraseña" required="true">
                            <input type="password" name="confirmpassword" class="lock" placeholder="Confirmar Contraseña" required="true">
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
