<?php

include_once ("../model/productos_model.php");

$productos= new productos_model();
$productos->tipo_producto= filter_input(INPUT_POST,"tipo");
$productos->nombre_producto= filter_input(INPUT_POST,"nombre");
$productos->descripcion_producto= filter_input(INPUT_POST,"desc");
$productos->proveedorID= filter_input(INPUT_POST,"provee");
$productos->precio_producto= filter_input(INPUT_POST,"precio");
$productos->stock_producto= filter_input(INPUT_POST,"stock");

$response=array();

if (isset($_FILES['nuevaImgProducto'])){
    $img_name = $_FILES['nuevaImgProducto']['name'];
    $tmp = $_FILES['nuevaImgProducto']['tmp_name'];

    if (strlen($img_name) <= 300){
        $img_ex = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
        $extensiones = array("png");

        if(in_array($img_ex, $extensiones)){
            $nombre_nuevo_imagen = uniqid("img-", true).".".$img_ex;
            $img_new_path = "../view/Img/productos/$nombre_nuevo_imagen";
            $img_bd_path = "../../Img/productos/$nombre_nuevo_imagen";
            move_uploaded_file($tmp, $img_new_path);
            $productos->img_producto= $img_bd_path;
        } else {
            $response['error'] = "Formato de la imagen no permitido (Solo PNG)";
        }
    } else {
        $response['error'] = "titulo de imagen demasiado grande. Maximo 300 caracteres";
    }
} else {
    $productos->img_producto= "NO IMG";
}

$response['msg']=$productos->newProduct();

echo json_encode($response);