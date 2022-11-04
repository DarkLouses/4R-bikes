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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <title>4R bikes</title>
</head>
<body>

     <!-- ---- Nav ====== -->
   <?php
        session_start();
        session_destroy();
        unset($_SESSION['usuario']);
        unset($_SESSION['level']);
       
        include_once('../nav/nav.php'); 
   ?>

    <div class="body">
        <div class="main">  	
            <input type="checkbox" id="chk" aria-hidden="true">

            <div class="signup">
                <form method="POST" name="signup-form" id="formularioSign" novalidate>
                    <label for="chk" aria-hidden="true">Izena eman</label>

                    <div class="input-group">
                        <input type="email" name="email" placeholder="Email" required="" id="mailRegister">
                        <div class="error"></div>
                    </div>
                    
                    <div class="input-group">
                        <input type="text" name="userRegister" placeholder="Erabiltzailea" required="" id="usernameRegister">
                        <div class="error"></div>
                    </div>
                
                    <div class="input-group">
                        <input type="password" name="passwordRegister" placeholder="Pasahitza" required="" id="passwordRegister">
                        <div class="error"></div>
                    </div>

                    <div class="input-group">
                        <input type="password" name="password2Register" placeholder="Errepikatu Pasahitza" required="" id="password2Register">
                        <div class="error"></div>
                    </div>

                <button type="submit">Bidali</button>
                <p id="msg"></p>

                
                </form>
            </div>

            <div class="login">
                <form action="../../../controller/controller_login.php" method="POST" name="signin-form">
                    <label for="chk" aria-hidden="true">Hasi saioa</label>
                    <input type="text" name="username" placeholder="Erabiltzailea" required="">
                    <input type="password" name="password" placeholder="Pasahitza" required="">
                    <button id="loginSubmit" type="submit" name="login" value="login">Hasi saioa</button>
                <?php if (isset($_GET['error'])) echo '<p style="color:red;text-align:center;">Erabiltzailea ez da existitzen</p>'; ?>
                </form>
            </div>
        </div>

   <!-- fondo -->
   <div class="container_fondo">
        <div class="burbujas"></div>
   </div>
 
   <script src="jsSign.js"></script>
   
</body>
</html>