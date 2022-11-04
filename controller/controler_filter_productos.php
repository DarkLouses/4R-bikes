<?php

include_once ("../model/productos_model.php");

$productos= new productos_model();

$tipo_producto = filter_input(INPUT_GET,"tipo_producto");

if ($tipo_producto!=null){
    $productos->setTipo_producto($tipo_producto);
    
} else{
    $response['error']="Ez da id pasatu/No se ha pasado producto";
}

$response=array();
$response['list']=$productos->getList_filter(); 
$response['error']="not error"; 

echo json_encode($response);
