<?php
session_start();
require_once '../config/db.php';
require_once '../models/categoria.php';
require_once '../helpers/utils.php';

$admin = Utils::isAdmin();
if($admin){
    $categoria = new Categoria();
    $categorias = $categoria->getAll();
    $json_cat = array();
    
    while($cat = $categorias->fetch_object()){
        array_push($json_cat,$cat);
    }
    $json = json_encode($json_cat);
    echo $json;
}else{
    header('Location:http://localhost/abarrotescix');
}
