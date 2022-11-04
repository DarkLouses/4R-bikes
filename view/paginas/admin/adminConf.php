<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://kit.fontawesome.com/422b82f355.js" crossorigin="anonymous"></script>
    <title>4r Bikes</title>
</head>
<body>

    <!-- ---- Nav ====== -->
    <?php
        include_once('../nav/nav.php'); 
        if(!isset($_SESSION['level']) || $_SESSION['level'] != 1) header('location: ../../paginas/inicio/index.php');
    ?>

    <!-- ---- Contenedor ====== -->
    <div class="contentAdmin">
    
        <!-- ---- producto ====== -->
        <h1>Produktuak</h1>
            <button id="newProduct" class="btnnewProd">Crear nuevo producto</button>
            <div id="myModal" class="modal"></div>
            <div id="productos" class="body_caro"></div>  

        <!-- ---- kits ====== -->
        <h1>Kits</h1>
        <div id="kits" class="body_caro"></div>  

        <!-- ---- usuario ====== -->
        <h1>Usuarios</h1>
        <div id='containerUsuarios' class="container"></div>

        <!-- ---- admmins ====== -->
        <h1>Admins</h1>
        <div id='containerAdmins' class="container"></div>

    </div>

    <script src="adminJs.js" type="module"></script>

</body>
</html>