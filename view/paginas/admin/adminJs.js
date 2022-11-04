const containerProductos = document.getElementById('containerProductos');
const containerUsuarios = document.getElementById('containerUsuarios');
const containerAdmins = document.getElementById('containerAdmins');
var modal = document.getElementById("myModal");

document.addEventListener("DOMContentLoaded", function (event) {
	document.getElementById("newProduct").addEventListener("click", crearProducto);
	loadProductos();
	filter('kits');  
    loadUsuarios();
    loadAdmins();
});

function loadProductos() {

	$.ajax({
	
		type:"GET",
		url: "../../../controller/controller_adminTableProduct.php", 
		dataType: "json",
			  
		success: function(result){  
			   
			console.log(result);

			var producto = result.list;	  
			document.getElementById("productos").innerHTML = '';

			for (let i=0;i<producto.length;i++) {

				document.getElementById("productos").innerHTML += 
				
				/*html*/` 
					<div class="card">
						<div class="imgBox">
							<img src="${producto[i].img_producto}" alt="${producto[i].img_producto}" class="mouse">
						</div>
						<div class="contentBox">
							<h3>${producto[i].nombre_producto}</h3>
							<h2 class="price">${producto[i].descripcion_producto}</h2>
							<h4 class="proveedor">${producto[i].objprove.nombre_proveedor}</h4>
							<button class="buy">${producto[i].precio_producto}€</button>
							<button onclick=execUpdate_productos(${producto[i].id_producto}) class="buy">Modificar</button>
							<button onclick=ExecDelete_productos(${producto[i].id_producto}) class="buy">Borrar</button>
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
///////////////////////////////////////////////////////////////////////////////////////////


function filter(input) {

	var productos_filtrado = input;
	
	$.ajax({

		type:"GET",
		data: { 'tipo_producto': productos_filtrado },
		url: "../../../controller/controler_filter_productos.php", 
		dataType: "json",
			  
		success: function(result){  
			   
			console.log(result);

			var producto = result.list;	  
			
			document.getElementById("kits").innerHTML = '';

			for (let i=0;i<producto.length;i++) {
				
				document.getElementById("kits").innerHTML += 
				
				/*html*/` 
					<div class="card">
						<div class="imgBox">
							<img src="${producto[i].img_producto}" alt="mouse corsair" class="mouse">
						</div>
						<div class="contentBox">
							<h3>${producto[i].nombre_producto}</h3>
							<h2 class="price">${producto[i].descripcion_producto}</h2>
							<button onclick=execUpdate_productos(${producto[i].id_producto}) class="buy">Modificar</button>
							<button onclick=ExecDelete_productos(${producto[i].id_producto}) class="buy">Borrar</button>
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
///////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////
// Modificar datos de un producto y actualizar en la BD //
//////////////////////////////////////////////////////////
function execUpdate_productos(id_producto) {

	$.ajax({
	
		type:"GET",
		url: "../../../controller/controller_adminTableProduct.php", 
		dataType: "json",

		success: function(result){  
			   
			var producto = result.list;
			
			modal.style.display = "block";
			for (let i=0;i<producto.length;i++) {
				if(producto[i].id_producto == id_producto) {

					var tipo = producto[i].tipo_producto;
					var nombre = producto[i].nombre_producto;
					var descripcion = producto[i].descripcion_producto;
					var stock = producto[i].stock_producto;
					var precio= producto[i].precio_producto;
					var proveedor= producto[i].objprove.id_proveedor;
					imgActual= producto[i].img_producto;
		
					document.getElementById("myModal").innerHTML = 
					/*html*/` 
						<div class="modal-content">
						<div class="modificarModal">
							<span class="close">&times;</span>
							<label for="chk" aria-hidden="true" id="ModalTituloProducto">Modificar Producto</label>
							<hr>

							<div class="input-group">
								<label for="nombreProducto">Tipo producto</label>
								<input type="text" name="tipoProducto" placeholder="Tipo de Producto" required="" id="tipoProducto" value="${tipo}">
							</div>
							
							<div class="input-group">
								<label for="nombreProducto">Nombre Producto</label>
								<input type="text" name="nombreProducto" placeholder="Nombre Producto" required="" id="nombreProductoInput" value="${nombre}">
							</div>
						
							<div class="input-group">
								<label for="nombreProducto">Descripcion Producto</label>
								<input type="text" name="descripcionProducto" placeholder="Descripcion del producto" required="" id="descripcionProductoInput" value="${descripcion}">
							</div>

							<div class="input-group">
								<label for="nombreProducto">ProveedorID</label>
								<input type="text" name="proveedorProducto" placeholder="Proveedor" required="" id="proveedorProductoInput" value="${proveedor
								}">
							</div>

							<div class="input-group">
								<label for="nombreProducto">Precio</label>
								<input type="text" name="precioProducto" placeholder="Precio" required="" id="precioProductoInput" value="${precio}">
							</div>

							<div class="input-group">
								<label for="nombreProducto">Stock</label>
								<input type="text" name="stockProducto" placeholder="Stock" required="" id="stockProductoInput" value="${stock}">
							</div>

							<div class="input-group">
								<label for="imgProducto">Imagen</label>
								<input type="file" name="imgProducto" placeholder="Imagen" required="" id="imgProducto" class="inputImg">
							</div>
	
							<!-- <div class="input-group">
								<input type="text" name="password2Register" placeholder="Repeat Password" required="" id="password2Register">
							</div> -->
	
							<button id="datosModificados">Modificar</button>
						</div>
					</div>
					`
				}
			}

			var span = document.getElementsByClassName("close")[0];
			var buttonModificado = document.getElementById("datosModificados");

			span.onclick = function() {
				modal.style.display = "none";
			}


			buttonModificado.onclick = function modificacionProducto() {
				var tipoProdInput = document.getElementById("tipoProducto").value;
				var nombreProdInput = document.getElementById("nombreProductoInput").value;
				var descripcionProdInput = document.getElementById("descripcionProductoInput").value;
				var proveedorProdInput = document.getElementById("proveedorProductoInput").value;
				var precioProdInput = document.getElementById("precioProductoInput").value;
				var stockProdInput = document.getElementById("stockProductoInput").value;
				var imagenProd = $("#imgProducto").prop("files")[0];
				var formData = new FormData();
				formData.append('id', id_producto);
				formData.append('tipo', tipoProdInput);
				formData.append('nombre', nombreProdInput);
				formData.append('desc', descripcionProdInput);
				formData.append('provee', proveedorProdInput);
				formData.append('precio', precioProdInput);
				formData.append('stock', stockProdInput);
				formData.append('imgActualProducto', imgActual);
				formData.append('nuevaImgProducto', imagenProd);

				$.ajax({
					type: "POST",
					processData: false,
  					contentType: false,
					data: formData,
					url: "../../../controller/controler_modify_producto.php",
					dataType: "json",  //type of the result
					success: function (result) {
						if (result.error != null){
							alert(result.error);
						}
						alert(result.msg);
						loadProductos();
						modal.style.display = "none";
					},
					error: function (xhr) {
						alert("An error occured: " + xhr.status + " " + xhr.statusText);
					}

				});
			}

		},

		error : function(xhr) {
			alert("An error occured: " + xhr.status + " " + xhr.statusText);
		}
	});
};
///////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////
// Elimiar un producto y actualizar en la BD //
////////////////////////////////////////////////
function ExecDelete_productos(id_producto) {

	var id = id_producto;

	$.ajax({

		type: "GET",
		data: { 'id': id },
		url: "../../../controller/controller_adminDelProduct.php",
		dataType: "json",

		success: function (result) {

			console.log(result.error);
			alert(result.error);
			loadProductos();
			filter('kits'); 
		},
		error: function (xhr) {
			alert("An error occured: " + xhr.status + " " + xhr.statusText);
		}
	});
}
///////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////
// Crea un nuevo producto y lo añade a la BD ///
////////////////////////////////////////////////
function crearProducto() {
	modal.style.display = "block";
	document.getElementById("myModal").innerHTML = 
		/*html*/` 
			<div class="modal-content">
			<div class="modificarModal">
				<span class="close">&times;</span>
				<label for="chk" aria-hidden="true" id="ModalTituloProducto">Crear Producto</label>
				<hr>

				<div class="input-group">
					<label for="nombreProducto">Tipo producto</label>
					<input type="text" name="tipoProducto" placeholder="Tipo de Producto" required="" id="tipoProducto">
				</div>
				
				<div class="input-group">
					<label for="nombreProducto">Nombre Producto</label>
					<input type="text" name="nombreProducto" placeholder="Nombre Producto" required="" id="nombreProductoInput">
				</div>
			
				<div class="input-group">
					<label for="nombreProducto">Descripcion Producto</label>
					<input type="text" name="descripcionProducto" placeholder="Descripcion del producto" required="" id="descripcionProductoInput">
				</div>

				<div class="input-group">
					<label for="nombreProducto">ProveedorID</label>
					<input type="text" name="proveedorProducto" placeholder="Proveedor" required="" id="proveedorProductoInput">
				</div>

				<div class="input-group">
					<label for="nombreProducto">Precio</label>
					<input type="text" name="precioProducto" placeholder="Precio" required="" id="precioProductoInput">
				</div>

				<div class="input-group">
					<label for="nombreProducto">Stock</label>
					<input type="text" name="stockProducto" placeholder="Stock" required="" id="stockProductoInput">
				</div>

				<div class="input-group">
					<label for="imgProducto">Imagen</label>
					<input type="file" name="imgProducto" placeholder="Imagen" required="" id="imgProducto" class="inputImg">
				</div>

				<button id="nuevosDatos" class="botonEnviarModal">Crear</button>
			</div>
		</div>
		`

		var span = document.getElementsByClassName("close")[0];
		var buttonCrear = document.getElementById("nuevosDatos");

		span.onclick = function() {
			modal.style.display = "none";
		}

		buttonCrear.onclick = function CrearProducto() {
			var tipoProdInput = document.getElementById("tipoProducto").value;
			var nombreProdInput = document.getElementById("nombreProductoInput").value;
			var descripcionProdInput = document.getElementById("descripcionProductoInput").value;
			var proveedorProdInput = document.getElementById("proveedorProductoInput").value;
			var precioProdInput = document.getElementById("precioProductoInput").value;
			var stockProdInput = document.getElementById("stockProductoInput").value;
			var imagenProd = $("#imgProducto").prop("files")[0];
			var formData = new FormData();
			formData.append('tipo', tipoProdInput);
			formData.append('nombre', nombreProdInput);
			formData.append('desc', descripcionProdInput);
			formData.append('provee', proveedorProdInput);
			formData.append('precio', precioProdInput);
			formData.append('stock', stockProdInput);
			formData.append('nuevaImgProducto', imagenProd);

			$.ajax({
				type: "POST",
				processData: false,
				  contentType: false,
				data: formData,
				url: "../../../controller/controler_new_producto.php",
				dataType: "json",  //type of the result
				success: function (result) {
					if (result.error != null){
						alert(result.error);
					}
					alert(result.msg);
					loadProductos();
					modal.style.display = "none";
				},
				error: function (xhr) {
					alert("An error occured: " + xhr.status + " " + xhr.statusText);
				}

			});
		}
}
///////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////
// Carga todos los usuarios de la BD en la pagina ///
////////////////////////////////////////////////////
function loadUsuarios(){
	
	var url= "../../../controller/controller_adminTableUsers.php";
	
	fetch(url)
	
	.then(res => res.json()).then(result => {
		
   		var users = result.list;
   		
   		console.log(result.list);
   		   		
		for (let i=0;i<users.length;i++) {

			document.getElementById('containerUsuarios').innerHTML += /*html*/` 
				<div class="card">
					<div class="box">
						<div class="content">
							<h2>1</h2>
							<h3>user: ${users[i].user}</h3>
							<p>password: ${users[i].pass}</p>
							<p>correo: ${users[i].email}</p>
							<button class="boton_user" value="${users[i].id_user}">Borrar</button>
						</div>
					</div>
				</div>
			`;
		}
   	
		var buttonsDeleteU = document.querySelectorAll('.boton_user');
		

		for (let i = 0; i < buttonsDeleteU.length; i++) {

			buttonsDeleteU[i].addEventListener('click', execDeleteU);
			
		} 
	})
	.catch(error => console.error('Error status:', error));
};
///////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////
// Permite borrar los usuarios/admins de la BD //////
////////////////////////////////////////////////////
function execDeleteU(event) {
	var id=event.currentTarget.value; 
	var url = "../../../controller/controller_adminDelUser.php";
	
	var data = { 'id': id };
	
	fetch(url, {
	  method: 'POST', 
	  body: JSON.stringify(data), // data can be `string` or {object}!
	  headers:{'Content-Type': 'application/json'}  //input data
	  })
	  
	.then(res => res.json()).then(result => {
		alert(result.error);
		location.reload();
	})
	.catch(error => console.error('Error status:', error));
	  
}; 
///////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////
// Carga todos los admins de la BD en la pagina //
////////////////////////////////////////////////////
function loadAdmins(){

	var url= "../../../controller/controller_adminTableAdmin.php";
	
	fetch(url)
	
	.then(res => res.json()).then(result => {
		
			var users = result.list;
			
			console.log(result.list);
				
		for (let i=0;i<users.length;i++) {

			document.getElementById('containerAdmins').innerHTML += /*html*/` 
				<div class="card">
					<div class="box">
						<div class="content">
							<h2>1</h2>
							<h3>Admin: ${users[i].user}</h3>
							<p>password: ${users[i].pass}</p>
							<p>correo: ${users[i].email}</p>
							<button class="boton_user" value="${users[i].id_user}">Borrar</button>
						</div>
					</div>
				</div>
			`;
		}

		var buttonsDeleteU = document.querySelectorAll('.boton_user');
	

		for (let i = 0; i < buttonsDeleteU.length; i++) {

			buttonsDeleteU[i].addEventListener('click', execDeleteU);
		}
	
	})
	.catch(error => console.error('Error status:', error));	
};

