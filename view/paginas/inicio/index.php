<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://kit.fontawesome.com/422b82f355.js" crossorigin="anonymous"></script>
    <title>4R Bikes</title>
</head>
<body>

    <!-- ---- Nav ====== -->
    <?php include_once('../nav/nav.php'); ?>

    <!-- ---- carousel ====== -->
    <section>
        <div class="container_carousel">
            <div class="container_texto gris">
                <img src="../../Img/logo1.png" alt="">
                <h2>Zure bizikleta kustomizatzeko/moldatzeko aurkituko duzun dendarik egokiena!</h2>
                <div class="container_inicio">
                    <div id="0" class="icono imagen_logo"></div>
                    <div id="1" class="icono imagen_arbol"></div>
                    <div class="boton one"><a  href="../about/about.php">Nor gara?</a></div>
                </div>
            </div>
            <div id="container_imagen" class="container_imagen"></div>
        </div>
    </section>

    <!-- ---- Botones_link ====== -->
    <section>
        <div class="container_link">

            <div id="link_1" class="link imagen_enlace_1">
                <div class="mouse none">
                    <p>Abandonatuta/Erabili gabe dauden bizikletak batzen ditugu  pertsonalizatzeko eta bizitza berri bat emateko pertsonalizatzen ditugu...</p>
                    <a href="../../paginas/tienda/reciclaje.php">Informazio gehiago</a>
                </div>
            </div>

            <div id="link_2" class="link imagen_enlace_2">
                <div class="mouse none">
                    <p>Hemen zure bizikletarako produktuak eros ditzakezu. Kalitatezko produktu iraunkorrak zure bizikleta beti berria izan dadin...</p>
                    <a href="../../paginas/tienda/adaptacion.php">Informazio gehiago</a>
                </div>
            </div>

            <div id="link_3" class="link imagen_enlace_3">
                <div class="mouse none">
                    <p>Guk geuk gure bezeroentzat aukeratzen ditugun kalitaterik oneneko motor elektrikoak. Guk muntatuta edo muntatu gabe erosita.</p>
                    <a href="../../paginas/tienda/motor.php">Informazio gehiago</a>
                </div>
            </div>

        </div>
    </section>

    <!--  Footer -->
    <?php include_once('../nav/footer.php'); ?>

    <script src="./inicio.js"></script>
    
</body>
</html>