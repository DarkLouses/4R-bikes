const antes = [
    "../../Img/Reciclaje/Antes/antes_1.jpg", 
    "../../Img/Reciclaje/Antes/antes_2.webp", 
    "../../Img/Reciclaje/Antes/antes_3.jpg"
];

const despues = [
    "../../Img/Reciclaje/Despues/despues_1.webp", 
    "../../Img/Reciclaje/Despues/despues_2.webp", 
    "../../Img/Reciclaje/Despues/despues_3.jpg"
];

// evento de carousel //
document.querySelectorAll('.boton_reciclar').forEach((item) => { 

    item.addEventListener("click", event => {
        document.getElementById('antes').innerHTML = `<img src="${antes[event.target.textContent-1]}" alt=""></img>`;
        document.getElementById('despues').innerHTML = `<img src="${despues[event.target.textContent-1]}" alt=""></img>`;
    })
})