<?php
ob_start();
session_start();
//autoload : para cargar los controladores de manera automatica.
//es importante que los controladores se llamen nameController
require_once 'autoload.php';
require_once 'config/db.php';

require_once 'config/parameters.php';
require_once 'helpers/utils.php';

//llamo a las vistas para que se estructure la web del index
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';



//controlador frontal, se encarga de cargar los controladores a travez de las URL
//ejemplo : http://localhost:8080/proyecto-mvc/index.php?controller=producto&action=index

function show_error(){
    $error = new ErrorController();
    $error->index();
}

if(isset( $_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';
    
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controller_default;
    
}else{

    show_error();
    exit();
}

if(@class_exists($nombre_controlador)){
    $controller = new $nombre_controlador();
    if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
        $action = $_GET['action'];
        $controller->$action(); 
        
    }elseif(!isset($_GET['controller']) && empty($_GET['action'])){
        
        $action_default = action_default;
        $controller->$action_default();
    }else{
        
        show_error();
    
    }
}else{
        
    show_error();

}

require_once 'views/layout/footer.php';

ob_end_flush();


    
    




