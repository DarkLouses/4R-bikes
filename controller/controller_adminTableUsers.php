<?php

include_once ("../model/users4bikes_model.php");

$users= new users4bikes_model();

$response=array();
$response['list']=$users->getUsers(); 
$response['error']="not error"; 

echo json_encode($response);

unset ($pertsona);