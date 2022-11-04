<?php

include_once ("../model/productos_model.php");

$product=new productos_model();

$id = filter_input(INPUT_GET,"id");

$response=array();

if ($id != null) {

    $product->setId_producto($id); 
    $response['error']=$product->delete();
     
} else{
    $response['error']="Ez da id pasatu/No se ha pasado id";
}

echo json_encode($response);

?>