<?php
include_once ("../model/users4bikes_model.php");
 
$data=json_decode(file_get_contents("php://input"),true);

$SignVal= new users4bikes_model();
$SignVal->usuario=$data['user'];
$SignVal->email=$data['email'];
$SignVal->password=$data['pass'];


$response=array();
$response['value']=$SignVal->insertUser(); 

echo json_encode($response);

unset ($SignVal);

