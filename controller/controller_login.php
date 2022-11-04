<?php
include_once ("../model/users4bikes_model.php");
 
//$data=json_decode(file_get_contents("php://input"),true);


foreach($_POST as $valor=>$campo) {
    $GLOBALS[$valor] = $campo;
}


$loginVal= new users4bikes_model();
$loginVal->usuario=$username;
$loginVal->password=$password;

$response=array();
$loginVal->checkVal();
$response['error']="not error"; 

if (isset($_SESSION['level'])) {
    header('Location: ../view/paginas/inicio/index.php');
} else {
    header('Location: ../view/paginas/login/login.php?error=1');
}