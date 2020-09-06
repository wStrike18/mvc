<?php
require_once 'models/producto.php';

class ProductoController
{
    public function index()
    {
        
        //echo "Controlador de producto, Accion index";
        //rerendizar vista: si quiero llamar a una vista desde el controlador
        $productos = new Producto();
        $prods = $productos->randomProducts(6);
        require_once 'views/producto/destacados.php';
    }

    public function gestionar()
    {
        Utils::isAdmin();
        require_once 'models/producto.php';
        $producto = new Producto();
        $productos = $producto->getAll();

        require_once 'views/producto/gestionar.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        
        require_once 'views/producto/registrar.php';
    }

    public function save()
    {
        try {
            Utils::isAdmin();
            if (isset($_POST)) {
                $errores = array(); //Array de errores

                $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : false;
                $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : false;
                $precio = isset($_POST['precio']) ? trim($_POST['precio']) : false;
                $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
                $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
                $imagen = isset($_POST['imgproduc']) ? $_POST['imgproduc'] : false;

                
                //validamos em campo nombre
                
                if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
                    $nombre_valido = true;
                } else {
                    $nombre_valido = false;
                    $errores['nombre'] = "El nombre no es valido";
                }
    
                //validamos el campo descripcion
                if (!empty($descripcion) && strlen($descripcion) <= 100) {
                    $descripcion_valido = true;
                } else {
                    $descripcion_valido = false;
                    $errores['descripcion'] = "Ingrese una descripción de 100 caracteres como maximo";
                }
                //validamos precio
                if (!empty($precio) && is_numeric($precio) && ($precio >= 0)) {
                    $email_valido = true;
                } else {
                    $email_valido = false;
                    $errores['precio'] = "El precio no es valido";
                }
    
                //validamos stock
                if(empty($stock)){
                    
                    $stock = 0;
                    $stock_valido = true;

                }elseif (!empty($stock) && is_numeric($stock) && $stock >= 0 ) {
                    $stock_valido = true;
                } else {
                    $stock_valido = false;
                    $errores['stock'] = "El stock no es correcto";
                    
                }
                //validamos password
                if (!empty($categoria) && is_numeric($categoria) && $categoria > 0) {
                    $stock_valido = true;
                } else {
                    $stock_valido = false;
                    $errores['categoria'] = "Seleccione una categoría";
                }

                if (count($errores) == 0) {

                    $producto = new Producto();
                    $producto->setNombre($nombre);
                    $producto->setDescripcion($descripcion);
                    $producto->setPrecio($precio);
                    $producto->setStock($stock);
                    $producto->setCategoria_id($categoria);

                    //gurdar imagen
                    $imagdefault = 'product-default.jpg';
                    if (!empty($_FILES["fileToUpload"]["name"])) {
                        $img = $_FILES["fileToUpload"];
                        $imgename = $img["name"];
                        $mimetype = $img["type"];
                    

                        if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/git") {
                            if (!is_dir('uploads/images')) {
                                mkdir('uploads/images', 0777, true);
                            }
                      
                       
                            $move =  move_uploaded_file($img["tmp_name"], 'uploads/images/'.$imgename);
                        
                            $producto->setImagen($imgename);
                        }
                    }else{
                        $producto->setImagen($imagdefault);
                    }

                    $save = $producto->save();
                    if($save){
                        $_SESSION['registrar-producto'] = "El registro se ah completado con exito";
                        
                    }else{
                        $_SESSION['errores']['general'] = "Fallo al guardar el producto!!";
                     
                    }
                } else {
                    $_SESSION['errores'] = $errores;
                }
            } else {
                $_SESSION['errores']['general'] = "Fallo al guardar el producto!!";
            }
                
            header("Location:".base_url.'producto/crear');
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function editar(){

        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $editar = true;
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->obtenerProducto();
           
            require_once 'views/producto/registrar.php';
        }
    }

    public function eliminar(){


        Utils::isAdmin();
        if(isset($_GET['id'])){

            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $delete = $producto->delete();

            if($delete){
                $_SESSION['delete'] = 'Se elimino correctamente';
            }else{
                $_SESSION['errores']['general'] = "Fallo al eliminar el producto!!";
            }

            header("Location:".base_url."producto/gestionar");

        }

    }
    public function update(){
        try {
            Utils::isAdmin();
            if (isset($_POST) && (isset($_GET))) {
                $errores = array(); //Array de errores

                $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : false;
                $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : false;
                $precio = isset($_POST['precio']) ? trim($_POST['precio']) : false;
                $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
                $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
                $imagen = isset($_POST['imgproduc']) ? $_POST['imgproduc'] : false;

                
                //validamos em campo nombre
                
                if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
                    $nombre_valido = true;
                } else {
                    $nombre_valido = false;
                    $errores['nombre'] = "El nombre no es valido";
                }
    
                //validamos el campo descripcion
                if (!empty($descripcion) && strlen($descripcion) <= 100) {
                    $descripcion_valido = true;
                } else {
                    $descripcion_valido = false;
                    $errores['descripcion'] = "Ingrese una descripción de 100 caracteres como maximo";
                }
                //validamos precio
                if (!empty($precio) && is_numeric($precio) && ($precio >= 0)) {
                    $email_valido = true;
                } else {
                    $email_valido = false;
                    $errores['precio'] = "El precio no es valido";
                }
    
                //validamos stock
                if(empty($stock)){
                    
                    $stock = 0;
                    $stock_valido = true;

                }elseif (!empty($stock) && is_numeric($stock) && $stock >= 0 ) {
                    $stock_valido = true;
                } else {
                    $stock_valido = false;
                    $errores['stock'] = "El stock no es correcto";
                    
                }
                //validamos password
                if (!empty($categoria) && is_numeric($categoria) && $categoria > 0) {
                    $stock_valido = true;
                } else {
                    $stock_valido = false;
                    $errores['categoria'] = "Seleccione una categoría";
                }
                
                

                if (count($errores) == 0) {

                    $producto = new Producto();
                    $producto->setNombre($nombre);
                    $producto->setDescripcion($descripcion);
                    $producto->setPrecio($precio);
                    $producto->setStock($stock);
                    $producto->setCategoria_id($categoria);
                    $producto->setId($_GET['id']);

                    //gurdar imagen
                    $imagdefault = 'product-default.jpg';
                    if(!empty($_FILES["fileToUpload"]["name"])){
                        $img = $_FILES["fileToUpload"];
                        $imgename = $img["name"];
                        $mimetype = $img["type"];
                    

                        if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/git") {
                            if (!is_dir('uploads/images')) {
                                mkdir('uploads/images', 0777, true);
                            }
                      
                       
                            $move =  move_uploaded_file($img["tmp_name"], 'uploads/images/'.$imgename);
                        
                            $producto->setImagen($imgename);
                        }
                    }else{
                        
                        $producto->setImagen($imagdefault);

                    }

                    $update = $producto->update();
                    if($update){
                        $_SESSION['actualizar-producto'] = "El producto se ah actualizado con exito";
                        
                    }else{
                        $_SESSION['errores']['general'] = "Fallo al actualizar el producto!!";
                     
                    }
                } else {
                    $_SESSION['errores'] = $errores;
                    header("Location:".base_url.'producto/editar&id='.$_GET['id']);
                    die();
                }
            } else {
                $_SESSION['errores']['general'] = "Fallo al actualizar el producto!!";
            }
                       header("Location:".base_url.'producto/gestionar');
        } catch (Exception $ex) {
            throw $ex;
        }

    }

    public function ver(){
        if(isset($_GET['id'])){

            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->getOne();

        }
        
        require_once 'views/producto/ver.php';
    }

}
