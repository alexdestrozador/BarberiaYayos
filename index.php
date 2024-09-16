<?php 
include('includes/dbconnection.php');
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $services=$_POST['services'];
    $adate=$_POST['adate'];
    $atime=$_POST['atime'];
    $phone=$_POST['phone'];
    $aptnumber = mt_rand(100000000, 999999999);
  
    $query=mysqli_query($con,"insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Services) value('$aptnumber','$name','$email','$phone','$adate','$atime','$services')");
    if ($query) {
$ret=mysqli_query($con,"select AptNumber from tblappointment where Email='$email' and  PhoneNumber='$phone'");
$result=mysqli_fetch_array($ret);
$_SESSION['aptno']=$result['AptNumber'];
 echo "<script>window.location.href='gracias.php'</script>";	
  }
  else
    {
      $msg="Algo salió mal. Inténtalo de nuevo";
    }

  
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Yayo's Barber</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="images/logo.png" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/stylespaginaprincipal.css" rel="stylesheet" />
        <link href="css/agendarcita.css" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="css/jquery.timepicker.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
              <a class="navbar-brand" href="#page-top">
                <img src="images/logo.png" alt="Logo" width="100" height="100">
              </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#quienessomos">Quienes somos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link" href="#agendacita">Agendar cita</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link" href="#ubicacion">Ubicación</a></li>
                        <li class="nav-item"><a class="nav-link" href="admin/Login.php"><i class="bi bi-box-arrow-in-right"></i>Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">Bienvenidos a Yayo's Barber</h1>
                <hr class="divider" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 mb-5">Donde cada corte es una obra de arte.
                    Experiencia, estilo, y detalles que hacen la diferencia.
                    ¡Reserva tu cita y siéntete como nuevo!</p>
                <a class="btn btn-primary btn-xl" href="#quienessomos">Ver más</a>
            </div>
        </div>
    </div>
</header>

<!-- About -->
<section class="page-section bg-warning" id="quienessomos">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <?php
                $ret = mysqli_query($con, "SELECT * FROM tblpage WHERE PageType='aboutus'");
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                    <div class="heading-section mb-4 mt-md-5">
                        <h1 class="text-white font-weight-bold"><?php echo $row['PageTitle']; ?></h1>
                    </div>
                    <div class="pb-md-5">
                        <p class="text-white-75 mb-5"><?php echo $row['PageDescription']; ?></p>
                    </div>
                <?php } ?>
                <a class="btn btn-primary btn-xl" href="#services">Ver servicios!</a>
            </div>
        </div>
    </div>
</section>

<!-- Services -->
<section class="page-section bg-dark" id="services">
    <div class="container px-4 px-lg-5">
        <h1 class="text-center mt-0">A tus Servicios</h1>
        <hr class="divider" />
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><h3 class="mb-2">#</h3></th>
                    <th><h3 class="mb-2">Servicios</h3></th>
                    <th><h3 class="mb-2">Precios</h3></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ret = mysqli_query($con, "SELECT * FROM tblservices");
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                    <tr>
                        <th scope="row"><p class="text-white-75 mb-5"><?php echo $cnt; ?></p></th>
                        <td><p class="text-white-75 mb-5"><?php echo $row['ServiceName']; ?></p></td>
                        <td><p class="text-white-75 mb-5"><?php echo $row['Cost']; ?></p></td>
                    </tr>
                <?php
                    $cnt++;
                } ?>
            </tbody>
        </table>
    </div>
</section>

<!-- Appointment -->
<section class="page-section" id="agendacita">
    <div class="one-forth d-flex align-items-end">
        <div class="text">
            <div class="overlay"></div>
            <div class="appointment-wrap">
                <span class="subheading">Agendación de Citas</span>
                <h3 class="mb-2">Agende su cita</h3>
                <form action="#" method="post" class="appointment-form">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="email" class="form-control" id="appointment_email" placeholder="Correo" name="email" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="services" id="services" required class="form-control">
                                        <option value="">Selecciona Nuestros Servicios</option>
                                        <?php
                                        $query = mysqli_query($con, "SELECT * FROM tblservices");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <option value="<?php echo $row['ServiceName']; ?>"><?php echo $row['ServiceName']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="date" class="form-control appointment_date" placeholder="Fecha" name="adate" id="adate" required onblur="checkAvailability()">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <select class="form-control appointment_time" placeholder="Hora" name="atime" id="atime" required onblur="checkAvailability()">
                                    <option value="" selected>Elige la hora</option>
                                    <option value="09:00">09:00 AM</option>
                                    <option value="09:30">09:30 AM</option>
                                    <option value="10:00">10:00 AM</option>
                                    <option value="10:30">10:30 AM</option>
                                    <option value="11:00">11:00 AM</option>
                                    <option value="13:00">1:00 PM</option>
                                    <option value="13:30">1:30 PM</option>
                                    <option value="14:00">2:00 PM</option>
                                </select>
                            </div>
                            <span id="availability-status"></span>
                        </div>
                        <div id="availability-message"></div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono" required maxlength="10" pattern="[0-9]+">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="HAZ UNA CITA" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Contact -->
<section class="page-section bg-warning" id="contacto">
    <div class="col-lg-12 text-center">
        <h1 class="text-white font-weight-bold">Contacto</h1>
    </div>
    <div class="container">
        <div class="row no-gutters d-flex contact-info">
            <?php
            $ret = mysqli_query($con, "SELECT * FROM tblpage WHERE PageType='contactus'");
            while ($row = mysqli_fetch_array($ret)) {
            ?>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 py-md-5 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-map-signs"></span>
                        </div>
                        <h3 class="mb-4">Dirección</h3>
                        <p><?php echo $row['PageDescription']; ?></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 py-md-5 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-phone2"></span>
                        </div>
                        <h3 class="mb-4">Número de Contacto</h3>
                        <p><a href="tel://1234567920"><?php echo $row['MobileNumber']; ?></a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 py-md-5 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-paper-plane"></span>
                        </div>
                        <h3 class="mb-4">Correo Electrónico</h3>
                        <p><a href="mailto:hola@cweb.com"><?php echo $row['Email']; ?></a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 py-md-5 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-globe"></span>
                        </div>
                        <h3 class="mb-4">Horario</h3>
                        <p><?php echo $row['Timing']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Location -->
<section class="page-section bg-warning" id="ubicacion" style="background-image: url('images/7.png'); background-size: cover; background-position: center;">
    <div class="container-fluid px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-12 text-center">
                <h1 class="text-center mt-0">Ubicación</h1>
                <hr class="divider divider-light" />
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15863.450677852912!2d-75.56399586805564!3d6.281778176770928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4428b6d1aceafb%3A0x75073f3665ed4a78!2sCra.%2036%20%2327%2C%20San%20Pablo%2C%20Medell%C3%ADn%2C%20Manrique%2C%20Medell%C3%ADn%2C%20Antioquia!5e0!3m2!1ses!2sco!4v1725131627084!5m2!1ses!2sco"
                    width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <?php
    $ret = mysqli_query($con, "SELECT * FROM tblpage WHERE PageType='contactus'");
    while ($row = mysqli_fetch_array($ret)) {
    ?>
        <div class="moving-text-container">
            <div class="moving-text" style="color: #ffc107;">
                <?php echo $row['Timing']; ?>
            </div>
        </div>
    <?php } ?>
    <br>
</section>

<?php include_once('includes/footer.php');?>

<!-- Bootstrap core JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- SimpleLightbox plugin JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
<!-- Core theme JS -->
<script src="js/paginainicial.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- SB Forms JS -->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
