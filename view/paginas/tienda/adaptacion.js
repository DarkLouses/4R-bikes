// importacion de modulos //
import {loadProductos , filter, input_buscador} from "../../scripts/productos.js";

document.addEventListener("DOMContentLoaded", function (event) {
    loadProductos('../../../controller/controller_adminTableProduct.php' , 'productos');
});

// agregar eventos a los botones //
document.querySelectorAll('.botones_filtro').forEach((item) => { 

    item.addEventListener("click", event => {

        // agregar clases con eventos click //
        document.querySelectorAll('.botones_filtro').forEach((item) => { item.classList.remove("botones_normal_click"); })
        item.classList.add("botones_normal_click");

        // filtrado de botones //
        if (event.target.value == 'todos') {
            loadProductos('../../../controller/controller_adminTableProduct.php' , 'productos');
        } else {
            filter("../../../controller/controler_filter_productos.php", event.target.value, 'productos');
        }
        
    }) // end  item.addEventListener("click", event => //
}) // end document.querySelectorAll('.botones_filtro').forEach((item) //

// para que pueda enviar con enter la peticion //
document.getElementById('buscador').addEventListener('keypress', e => {

    if(e.keyCode == 13) {
      input_buscador("../../../controller/controler_buscador_producto.php", 'buscador', ".body_caro");
      e.preventDefault();
    }
})// end document.querySelectorAll('.botones_filtro').forEach((item) //

document.getElementById('btn_buscador').addEventListener("click", input_buscador("../../../controller/controler_buscador_producto.php", 'buscador', ".body_caro"));
