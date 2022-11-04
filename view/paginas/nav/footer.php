<!-- --------- Footer --------- -->
<section>

    <div class="container-otoño" id="container-otoño">
        <div class="otoño"></div>
    </div>
    
    <div class="olas">
        <div class="ola"></div>
        <div class="ola"></div>
        <div class="ola"></div>
        <div class="ola"></div>
    </div>

    <footer>
        <hr>

        <div class="row">
      
            <div class="col">
                <img src="../../Img/logo1.png" alt="">
                <p>4RBIKES proiektua, beste hainbat proiektu bezala, gau ilun batian tximista bakar
                batek sortzen duen argitasun zuntz batetik sortutako idea da. Zergatik ez imajinatu
                beste mobilitate eredu bat ? askoz ere jasangarriagoa, inklusiboa, osasuntsuagoa eta
                natura berarekin integratzaileagoa.</p>
            </div>

            <div class="col">
                <h3>Bulegoa <div class="linea"><span></span></div></h3>
                <p>20600 Eibar, Gipuzkoa</p>
                <p>Telefono finko: 943 92 63 89</p>
                <p>+34 645 42 53 65</p>
                <p class="email_id">4rbikes@gmail.com</p>
            </div>

            <div class="col">
                <h3>Besteak <div class="linea"><span></span></div></h3>
                <ul>
                    <li><a href="../about/about.php">Guri buruz</a></li>
                    <li><a href="../soporte/soporte.php">Laguntza teknikoa</a></li>
                    <li><a href="../tienda/adaptacion.php">Adaptazioak</a></li>
                    <li><a href="../tienda/reciclaje.php">Birziklapena</a></li>
                    <li><a href="../tienda/motor.php">Motore Elektrikoak</a></li>
                </ul>
            </div>

            <div class="col">
                <h3>Korreoa<div class="linea"><span></span></div></h3>

                <form action="">
                    <i class="far fa-envelope"></i>
                    <input type="text" name="" id="" required>
                    <button type="submit"><i class="fas fa-arrow-right"></i></button>
                </form>

                <div class="social_icons">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-whatsapp"></i>
                    <i class="fab fa-pinterest"></i>
                </div>
            </div>

        </div>

        <hr>
       
      
           
        <div class="linea"><span></span>
    </footer>
</section>

    <!-- --------- Script Para crear las hojas --------- -->
<script>

    const HOtoño = document.querySelector("#container-otoño");

    const crearHojasOtoño = () => {

        let hojasOtoño = document.createElement('otoño');

        let x =  Math.floor(Math.random() * 90);
        let size = (Math.random() * 30) + 2;
        let z = Math.random(Math.random()) * 100;
        let delay = Math.random() * 5;
        let duration = (Math.random() * 10) + 5;

        hojasOtoño.style.left = x + '%'
        hojasOtoño.style.width = size + 'px'
        hojasOtoño.style.height = size + 'px'
        hojasOtoño.style.zIndex = z
        hojasOtoño.style.animationDelay = delay + 's'
        hojasOtoño.style.animationDuration = duration + 's'

        HOtoño.appendChild(hojasOtoño);

        /* para que no se sature */
        setTimeout(() => {
            hojasOtoño.remove();
        },  duration * 1400);

    }

    setInterval(crearHojasOtoño, 150);

</script>