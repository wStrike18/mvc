<?php
require_once 'models/categoria.php';
require_once 'models/producto.php';

class CategoriaController{

    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();       
       require_once 'views/categoria/index.php';
    }

    public function ver(){

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $cat = $categoria->getOne();

            $producto = new Producto();
            $producto->setCategoria_id($id);
            $prods = $producto->getCategoryProduct();
        }
        
        require_once 'views/categoria/ver.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';

    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
            $errores = array(); //Array de errores

            $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : false;
            if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
               
                $nombre_valido = true; 
            }else{

                $nombre_valido = false;
                $errores['categoria'] = "El nombre no es valido"; 
            }

            
            if(count($errores) == 0){

                
                $categoria = new Categoria();
                $categoria->setNombre($nombre);
                $save = $categoria->save();
                if($save){
                    $_SESSION['categoria'] = "El registro se ah completado con exito";
                    header("Location:".base_url.'categoria/index');

                }else{
                    $_SESSION['errores']['general'] = "Fallo al guardar la categoría!!";
                    header("Location:".base_url.'categoria/crear');

                }
            }else{
                $_SESSION['errores'] = $errores;   
                header("Location:".base_url.'categoria/crear');        
            }
           

        }
    }
}