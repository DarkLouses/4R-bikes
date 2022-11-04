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
    <title>Document</title>
</head>
<body>

    <?php include_once('../nav/nav.php'); ?>

    <div class="container_filtro">
        <div class="container_form">
            <form>
                <input id="buscador" type="text" name="" required>
                <button type="button" id="btn_buscador"><i class="fas fa-arrow-right"></i></button>
            </form>
        </div>

        <div class="container_botones_filtro">
            <button value='todos' id="todos" class="botones_filtro botones_normal">Filtro gabe</button>
            <button value='manillar' id="manillar" class="botones_filtro botones_normal">Eskulekuak</button>
            <button value='sillines' id="sillines" class="botones_filtro botones_normal">Jarlekuak</button>
            <button value='puño' id="puño" class="botones_filtro botones_normal">Ukabilak</button>
            <button value="rueda" id="rueda" class="botones_filtro botones_normal two">Gurpilak</button>
        </div>
    </div>

    <div id="productos" class="body_caro"></div>  

    <?php include_once('../nav/footer.php'); ?>

    <script src="./adaptacion.js" type="module"></script>
</body>
</html>