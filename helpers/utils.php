<?php
class Utils{

    public static function deleteSesion($name){

        if(isset( $_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        
       return $name;
    }

    public static function mostrarError($errores, $campo){

        $alerta = "";
    
        if(isset($errores[$campo]) && !empty($campo)){
            $alerta = "<p class='alerta alerta-error'>".$errores[$campo]."</p>";
        }
       
        return $alerta;
    
    }

    public static function getAllCategoria(){

        require_once 'models/categoria.php';
        $cat = new Categoria();
        $categorias = $cat->getAll();

        return $categorias;
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    
}