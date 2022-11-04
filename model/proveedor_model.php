<?php
include_once ("connect_data.php");  // klase honetan gordetzen dira datu basearen datuak. erabiltzailea...
include_once ("proveedor_class.php");
include_once ("productos_model.php");

class proveedor_model extends proveedor_class
{
     private $link;

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
 
public function getListProv()
{
     $idprove=$this->id_proveedor;

     $this->OpenConnect();

     $sql="CALL findProveedor($idprove)";
     $result = $this->link->query($sql);
     $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
     $this->id_proveedor=$row['id_proveedor'];
     $this->nombre_proveedor=$row['nombre'];
     
     mysqli_free_result($result); 
     $this->CloseConnect();
 }
}