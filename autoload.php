<?php

//EL autoload : auto cargado de clases

function controller_autoload($classname){
    
    include_once 'controllers/'.$classname.'.php';
}

    //meotodo que busca en mi funcion todas las clases que detecte
    spl_autoload_register('controller_autoload');