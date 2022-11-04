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
    <title>4R bikes</title>
</head>
<body>

    <!-------- Nav -------->
    <?php include_once('../nav/nav.php'); ?>

    <!--------Container antes y despues -------->
    <div class="container_reciclar">
        <div id="antes" class="imagen_1"><img src="../../Img/Reciclaje/Antes/antes_1.jpg" alt=""></div>
        <div id="despues" class="imagen_2"><img src="../../Img/Reciclaje/Despues/despues_1.webp" alt=""></div>
    </div>
    
    <div class="botones_reciclar">
        <div class="boton_reciclar">1</div>
        <div class="boton_reciclar">2</div>
        <div class="boton_reciclar">3</div>
    </div>

    <!-------- Primera carta -------->
    <div>
        <section>
            <div class="container_informacion">
                <img src="../../Img/Reciclaje/Antes/antes_4.jpg" alt="" class="b1">
                <div class="informacion b2">
                    <h2>Kustomizatu aurretik</h2>
                    <p>Gendea bizikleten mundura bultzatzeko enpresa hau aurrera atera dugu. Helburu hau lortzeko abandonatuta dauden bizikletak batzen ditugu, gero pertsonalizatzeko. Hori gainera, edozein pertsonak beraien bizikleta ez badu erabiltzen, hartzeko prest gaude beste norbaitek erabili dezan! Bizikleta abandonatu hauen oinarritik bizikleta berri bat eraikitzen dugu, edozein aldaketa eginez: besaulkia, ukabilak, katea... Gure eragozpena bizikleta berria balitz bezala geratzea izango da beti.</p> 
                </div>
        </section>
    </div>

    <!-------- Segunda carta -------->
    <div>
        <section>
            <div class="container_informacion">
                <div class="informacion b3">
                    <h2>Kustomizatu ondoren</h2>
                    <p>Bizikleta gure eskuetan daukagula, zahartuta eta ez-erabilgarri zegoen bizikleta, guztiz funtzionala eta berriztuta geratzen da. Aldaketa horiek egiteko, salgai ditugun produktuak erabiltzen ditugu, oso kalitate onekoak direlako eta iraunkortasun bikaina dutelako. </p>
                    <p>Zure bizikleta zaharra dohaintzan eman edo konpondu nahi baduzu, jar zaitez harremanetan "bizikleta zaharra konponketa/dohaintza" gaiarekin gure <strong>Laguntza atalean</strong> goiko barran, eta gu lehenbailehen jarriko gara zurekin harremanetan.</p>
                </div> 
                <img src="../../Img/Reciclaje/Despues/despues_4.jpg" alt="" class="b4">
            </div>
        </section>
    </div>

     <!-------- footer -------->
    <?php include_once('../nav/footer.php'); ?>

    <script src="./reciclajes.js"></script>

</body>
</html>