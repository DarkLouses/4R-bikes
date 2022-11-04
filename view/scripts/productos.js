// funcion de carga de los productos //
function loadProductos(url, container) {

	$.ajax({

	   	type:"GET",
	   	url: url, 
		dataType: "json",
		  	
		success: function(result){  
	   		
	   		console.log(result);

	   		var producto = result.list;	  
               document.getElementById(container).innerHTML = '';

			for (let i=0;i<producto.length;i++) {

				document.getElementById(container).innerHTML += 
                
                /*html*/` 
                    <div class="card">
                        <div class="imgBox">
                            <img src="${producto[i].img_producto}" alt="mouse corsair" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>${producto[i].nombre_producto}</h3>
                            <h2 class="price">${producto[i].descripcion_producto}</h2>
                            <h4 class="proveedor">${producto[i].objprove.nombre_proveedor}</h4>
                            <a class="buy">Precio: ${producto[i].precio_producto}$</a>
                            <a href="#" class="buy">Comprar Producto</a>
                        </div>
                    </div> 
                `;
			}
	   	},

	   	error : function(xhr) {
			alert("An error occured: " + xhr.status + " " + xhr.statusText);
		}
	});
}; 

// filtrado de botones //
function filter(url, tipo, container) {

    var productos_filtrado = tipo;

	$.ajax({

	   	type:"GET",
        data: { 'tipo_producto': productos_filtrado },
	   	url: url, 
		dataType: "json",
		  	
		success: function(result){  
	   		
	   		console.log(result);

	   		var producto = result.list;	  

            if (producto.length == 0) alert('no se a encontrado ningun producto') , location.reload();
            
            document.getElementById(container).innerHTML = '';

			for (let i=0;i<producto.length;i++) {
				
				document.getElementById(container).innerHTML += 
                
                /*html*/` 
                    <div class="card">
                        <div class="imgBox">
                            <img src="${producto[i].img_producto}" alt="mouse corsair" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>${producto[i].nombre_producto}</h3>
                            <h2 class="price">${producto[i].descripcion_producto}</h2>
                            <a href="#" class="buy">${producto[i].precio_producto}$</a>
							<a href="#" class="buy">Montaje en Tienda</a>
                        </div>
                    </div> 
                `;
			}

	   	},

	   	error : function(xhr) {
			alert("An error occured: " + xhr.status + " " + xhr.statusText);
		}
	});
}; 

// filtrado por input //
function input_buscador(url, input, container) {

    var buscador_nombre = document.getElementById(input).value;

    document.getElementById(input).value = '';
    
    $.ajax({

        type:"GET",
        data: { 'buscador': buscador_nombre },
        url: url, 
        dataType: "json",
           
        success: function(result){  
            
        console.log(result.list.length);

        var producto = result.list;	  

        if (producto.length == 0) alert('no se a encontrado ningun producto') , location.reload();

        document.querySelector(container).innerHTML = '';

        for (let i=0;i<producto.length;i++) {

            document.querySelector(container).innerHTML += 
             
            /*html*/` 
                <div class="card">
                    <div class="imgBox">
                        <img src="${producto[i].img_producto}" alt="mouse corsair" class="mouse">
                    </div>
                    <div class="contentBox">
                        <h3>${producto[i].nombre_producto}</h3>
                        <h2 class="price">${producto[i].descripcion_producto}</h2>
                        <h4 class="proveedor">${producto[i].objprove.nombre_proveedor}</h4>
                        <a class="buy">Precio: ${producto[i].precio_producto}$</a>
                        <a href="#" class="buy">Comprar Producto</a>
                    </div>
                </div> 
            `;
        }
    },

        error : function(xhr) {
         alert("An error occured: " + xhr.status + " " + xhr.statusText);
     }
 });
}

// exportacion de modulos //
export { loadProductos , filter, input_buscador};