<?php
include_once ("connect_data.php");  // klase honetan gordetzen dira datu basearen datuak. erabiltzailea...
include_once ("productos_class.php");
include_once ("proveedor_model.php");

class productos_model extends productos_class
{
     public $link; 
     public $objprove;

public function OpenConnect()
{
    $konDat=new connect_data();
    try
    {
         $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
         // se crea un nuevo objeto llamado link de la clase mysqli con los datos de conexión. 
    }
    catch(Exception $e)
    {
   	 echo $e->getMessage();
    }
    $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta 
                //databasearen artean UTF -8 erabiltzera datuak trukatzeko
}                   
	 
public function CloseConnect()
{
     mysqli_close ($this->link);
}
 
     public function getList(){
          $this->OpenConnect(); 
          
          $sql="CALL selectAllProducts()";
          $result = $this->link->query($sql); 
          $list = array();
          
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
               
               $new=new productos_model();
               
               $new->setTipo_producto($row['tipo_producto']);
               $new->setNombre_producto($row['nombre_producto']);
               $new->setDescripcion_producto($row['descripcion_producto']);
               $new->setStock_producto($row['stock_producto']);
               $new->setPrecio_producto($row['precio_producto']);
               $new->setImg_producto($row['img_producto']);
               $new->setId_producto($row['id_producto']);

               $newproveedor=new proveedor_model(); 
               $newproveedor->id_proveedor=$row['proveedorID'];
               
               $newproveedor->getListProv();
               
               $new->objprove=$newproveedor;

               array_push($list, $new);   
          }
          mysqli_free_result($result); 
          $this->CloseConnect();
          return($list);
     }

     public function getList_filter(){
          $this->OpenConnect();  // konexio zabaldu  - abrir conexión

          $tipo_producto= $this->tipo_producto;
          
          $sql="SELECT * FROM productos where tipo_producto = '$tipo_producto'";
          $result = $this->link->query($sql);
          $list = array();
          
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
               
               $new=new productos_model();
               
               $new->setTipo_producto($row['tipo_producto']);
               $new->setNombre_producto($row['nombre_producto']);
               $new->setDescripcion_producto($row['descripcion_producto']);
               $new->setStock_producto($row['stock_producto']);
               $new->setPrecio_producto($row['precio_producto']);
               $new->setImg_producto($row['img_producto']);
               $new->setId_producto($row['id_producto']);

               $newproveedor=new proveedor_model(); 
               $newproveedor->id_proveedor=$row['proveedorID'];
               
               $newproveedor->getListProv();
               
               $new->objprove=$newproveedor;


               array_push($list, $new);   
          }
          mysqli_free_result($result); 
          $this->CloseConnect();
          return $list;
     }

     public function getList_buscador(){
          $this->OpenConnect();  // konexio zabaldu  - abrir conexión
          
          $descripcion_producto= $this->descripcion_producto;

          $sql="SELECT * FROM productos where nombre_producto like '%$descripcion_producto%' ";
          $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
                         // se guarda en result toda la informacion solicitada a la bbdd
          $list = array();
          
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
               
               $new=new productos_model();
               
               $new->setTipo_producto($row['tipo_producto']);
               $new->setNombre_producto($row['nombre_producto']);
               $new->setDescripcion_producto($row['descripcion_producto']);
               $new->setStock_producto($row['stock_producto']);
               $new->setPrecio_producto($row['precio_producto']);
               $new->setImg_producto($row['img_producto']);
               $new->setId_producto($row['id_producto']);

               $newproveedor=new proveedor_model(); 
               $newproveedor->id_proveedor=$row['proveedorID'];
               
               $newproveedor->getListProv();
               
               $new->objprove=$newproveedor;


               array_push($list, $new);   
          }
          mysqli_free_result($result); 
          $this->CloseConnect();
          return $list;
     }
     
     public function delete(){
          $this->OpenConnect();
          
          $id=$this->id_producto;
          
          $sql = "CALL delProduct($id)";
             
          $this->link->query($sql);
          
          if ($this->link->affected_rows == 1){
               return " Producto eliminado: ".$this->link->affected_rows;
          } else {
               return "Fallo al eliminar: (" . $this->link->errno . ") " . $this->link->error;
          }
          $this->CloseConnect();
     }

     public function updateProduct()
     {
          $this->OpenConnect();
         
          $id_producto= $this->id_producto;
          $tipo_producto= $this->tipo_producto;
          $nombre_producto= $this->nombre_producto;
          $descripcion_producto= $this->descripcion_producto;
          $proveedorID= $this->proveedorID;
          $precio_producto= $this->precio_producto;
          $stock_producto= $this->stock_producto;
          $imagen_producto = $this->img_producto;
         
         $sql = "CALL updateProd($id_producto, '$tipo_producto' ,'$nombre_producto', '$descripcion_producto', $proveedorID, $precio_producto, $stock_producto, '$imagen_producto')";
         
         $this->link->query($sql);
         
         if ($this->link->affected_rows == 1)
         {
             return " Se ha actualizado correctamente: ".$this->link->affected_rows;
         } else {
             return "Fallo al actualizar/Nada ha sido actualizado (" . $this->link->errno . ") " . $this->link->error;
         }
         $this->CloseConnect();
     }

     public function newProduct()
     {
          $this->OpenConnect();
         
          $tipo_producto= $this->tipo_producto;
          $nombre_producto= $this->nombre_producto;
          $descripcion_producto= $this->descripcion_producto;
          $proveedorID= $this->proveedorID;
          $precio_producto= $this->precio_producto;
          $stock_producto= $this->stock_producto;
          $imagen_producto = $this->img_producto;
         
         $sql = "CALL insertProducto('$tipo_producto' ,'$nombre_producto', '$descripcion_producto', $stock_producto, $precio_producto, '$imagen_producto', $proveedorID)";
         
         $this->link->query($sql);
         
         if ($this->link->affected_rows == 1)
         {
             return " Se ha añadido correctamente: ".$this->link->affected_rows;
         } else {
             return "Fallo al añadir/Nada ha sido añadido (" . $this->link->errno . ") " . $this->link->error;
         }
         $this->CloseConnect();
     }
     
}
