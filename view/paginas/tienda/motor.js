// importacion de modulos //
import { filter } from "../../scripts/productos.js";

document.addEventListener("DOMContentLoaded", function (event) {
	filter("../../../controller/controler_filter_productos.php" ,'kits' , 'kits' );  
});
