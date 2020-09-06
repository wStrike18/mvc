<?php 

require_once 'models/producto.php';
class CarritoController{ 

    public  function index()
    {
        $carrito = $_SESSION['carrito'];
        require_once 'views/carrito/index.php';
    }

    public function add(){ 

        if(isset($_GET['id'])){
            $producto_id = $_GET['id'];
            
            
        }else{
            header('Location:'.base_url);
        }
        if(isset($_SESSION['carrito'])){
            $count = 0;
            foreach($_SESSION['carrito'] as $indice => $elemento){
                    
                if($elemento['id_producto'] == $producto_id){
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $count++;
                }
                
            }

        }  
        if(!isset($count) || $count == 0){
            //conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();
            
            if(is_object($producto)){
                
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "nombre" => $producto->nombre,
                    "imagen" => $producto->imagen,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );  
            }

        }
        header('Location:'.base_url.'carrito/index'); 
    }

    public function remove(){

    }

    public function delete(){

        unset($_SESSION['carrito']);
        header('Location:'.base_url.'carrito/index'); 

    }

}