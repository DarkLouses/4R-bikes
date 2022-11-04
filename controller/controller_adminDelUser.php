<?php

include_once ("../model/users4bikes_model.php");

$data=json_decode(file_get_contents("php://input"),true);

$user=new users4bikes_model();

$user->id=$data['id'];

$response=array();

if ($user->id!=null){
    $user->setId_user($user->id);
    $response['error']=$user->delUser();
    
} else{
    $response['error']="Ez da id pasatu/No se ha pasado id";
}

echo json_encode($response);

?>