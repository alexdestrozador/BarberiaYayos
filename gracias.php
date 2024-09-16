<?php
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Código de cita</title>
    <link rel="stylesheet" href="css/gracias.css">
    <link rel="icon" type="image/x-icon" href="images/logo.png" />

</head>
<body>
    <a href="index.php">
        <img src="admin/images/regresar.jpg" class="logo">
    </a>
    <!-- Navigation-->
    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row no-gutters justify-content-center mb-5 pb-2">
                <div class="col-md-6 text-center heading-section ftco-animate">
                    <h1 class="text-white font-weight-bold">Gracias por aplicar, su código de cita es: <?php echo $_SESSION['aptno']; ?> <br> En cuanto haya novedades, te estaremos contactando. </h1>
                    
                </div>
            </div>
        </div>
    </section>

    <script>
        // Mostrar el número de cita en un alert
        window.onload = function() {
            var citaNumero = "<?php echo $_SESSION['aptno']; ?>";
            alert("Tu número de cita es " + citaNumero);
        }
    </script>
</body>
</html>