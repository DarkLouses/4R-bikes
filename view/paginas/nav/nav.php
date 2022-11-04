<?php session_start(); ?>

   <!-- ---- Nav ====== -->
   <section>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn"><i class="fas fa-bars"></i></label>

            <?php  if (isset($_SESSION['user'])) {

                echo '<label class="logo"><i class="fa-sharp fa-solid fa-user user"></i></label>';

           
            } else {

                echo '<label class="logo"><i class="fa-sharp fa-solid fa-user no_user"></i></label>';

            } ?>

            <label class="logo">4R Bikes</label>

            <ul>
                <?php if (isset($_SESSION['user']) && $_SESSION['level'] == 1) echo '<li><a href="../admin/adminConf.php">admin</a></li>'; ?> 
                <li><a href="../inicio/index.php">Sarrera</a></li>
                <li class="submenu">
                    <a href="#">Kategoriak<i class="fas fa-caret-down"></i></a>
                    <ul class="children">
                        <li><a href="../tienda/reciclaje.php">Birziklatu</a></li>
                        <li><a href="../tienda/adaptacion.php">Adaptazioa</a></li>
                        <li><a href="../tienda/motor.php">Motor Elektrikoak</a></li>
                    </ul>
                </li>
                <li><a href="../about/about.php">Nor gara?</a></li>
                <li><a href="../soporte/soporte.php">Laguntza</a></li>

                <?php if (isset($_SESSION['user'])) {
                    echo '<li><a href="../login/login.php">Logout</a></li>'; 
                } else {
                    echo '<li><a href="../login/login.php">Login</a></li>'; 
                }

                ?> 
                    
            </ul>
        </nav>
    </section>

<script>

$(document).ready(main);

var contador = 1;

function main () {
	
	// Mostramos y ocultamos submenus
	$('.submenu').click(function(){
		$(this).children('.children').slideToggle();
	});
}

</script>