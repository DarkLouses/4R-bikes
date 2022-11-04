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
    
    <title>4R Bikes</title>
</head>
<body>

     <!-- ---- Nav ====== -->
   <?php include_once('../nav/nav.php'); ?>

    
    <!--  Contenido -->
    <div class="containerForm">
      <div class="cartaForm">
         <div class="datosCarta">
            <h2>Soporte</h2>
            <div class="divisor"></div>

            <div class="form">
            <form>
                  <div class="input-container ic1">
                  <input id="izena" class="input" type="text" placeholder=" " />
                  <div class="cut cut-short"></div>
                  <label for="izena" class="placeholder">Izena</label>
                  </div>

                  <div class="input-container ic2">
                  <input id="abizena" class="input" type="text" placeholder=" " />
                  <div class="cut"></div>
                  <label for="abizena" class="placeholder">Abizena</label>
                  </div>

                  <div class="input-container ic2">
                  <input id="email" class="input" type="email" placeholder=" " />
                  <div class="cut"></div>
                  <label for="email" class="placeholder">Email-a</>
                  </div>

                  <div class="input-container ic2">
                  <input id="arazoa" class="input" type="text" placeholder=" " />
                  <div class="cut"></div>
                  <label for="arazoa" class="placeholder">Arazoa</>
                  </div>
                  <br>
                  <textarea rows="8" cols="50" placeholder=" Idatzi hemen..."></textarea>
                           
                  <button type="submit" class="submit">BIDALI</button>
               </form>
            </div>
         </div>
      </div>
    </div>

    <?php include_once('../nav/footer.php'); ?>

    <script src="./formulario.js"></script>
</body>
</html>