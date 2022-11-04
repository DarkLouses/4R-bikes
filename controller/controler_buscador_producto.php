<?php

include_once ("../model/productos_model.php");

$productos= new productos_model();

$buscador = filter_input(INPUT_GET,"buscador");

if ($buscador!=null){
    $productos->setDescripcion_producto($buscador);
    
} else{
    $response['error']="Ez da id pasatu/No se ha pasado producto";
}

$response=array();
$response['list']=$productos->getList_buscador(); 
$response['error']="not error"; 

echo json_encode($response);
