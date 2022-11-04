<?php

include_once ("../model/productos_model.php");

$productos= new productos_model();

$response=array();
$response['list']=$productos->getList();
$response['error']="not error"; 

echo json_encode($response);

unset ($productos);