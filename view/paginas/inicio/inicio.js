// Event Changes images //
document.querySelectorAll('.icono').forEach((item) => { 

    item.addEventListener("click", event => {

        const imagen = [
            "../../Img/carousel_1.jpg",
            "../../Img/carousel_3.jpg"
            ];
        
        var index = event.target.id;
        var imagen_actual = imagen[index];
        
        document.getElementById("container_imagen").style.backgroundImage  = "url("+imagen_actual+")";

    }) // item.addEventListener("click", event => { //
}) // document.querySelectorAll('.icono').forEach((item) => {  //

