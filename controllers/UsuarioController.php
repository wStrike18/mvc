<?php

require_once 'models/usuario.php';
class UsuarioController{

    public function index(){
        echo "Controlador de usuarios, Accion index";
    }

    public function registrar(){

        require_once 'views/usuario/registrar.php';
    }

    public function save(){

        if(isset($_POST)){

            $errores = array(); //Array de errores

            $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : false;
            $apellidos = isset($_POST['apellidos']) ? trim($_POST['apellidos']) : false;
            $email = isset($_POST['email']) ? trim($_POST['email']) : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            //validamos em campo nombre
            if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
               
                $nombre_valido = true; 
            }else{
                $nombre_valido = false;
                $errores['nombre'] = "El nombre no es valido"; 
            }

            //validamos el campo apellido
            if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
                
                $apellidos_valido = true;
             }else{
                $apellidos_valido = false;
                $errores['apellidos'] = "El apellido no es valido";     
             }
              //validamos email
            if( !empty($email)  && filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email_valido = true;
            }else{
                $email_valido = false;
                $errores['email'] = "El email no es valido"; 
            }

            //validamos password
            if( !empty($password) && strlen($password) >= 6){
                $password_valido = true;
            }else{
                $password_valido = false;
                $errores['password'] = "Ingrese una contraseña correcta, de 6 a mas caracteres"; 
            }
            
            if(count($errores) == 0){

                
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
               if(!$usuario->consultEmail()){
                    $save = $usuario->save();
                    if($save){
                        $_SESSION['registrar'] = "El registro se ah completado con exito";
                    }else{
                        $_SESSION['errores']['general'] = "Fallo al guardar el usuario!!";
                    }
               }else{
                $errores['email'] = "Su email ya esta registrado";
                $_SESSION['errores'] = $errores;
               }
            }else{
                $_SESSION['errores'] = $errores;
            }
            }else{
                $_SESSION['errores']['general'] = "Fallo al guardar el usuario!!";
            }
            
           header("Location:".base_url.'usuario/registrar');
    }

    public function login(){
        if(isset($_POST)){
            //identificar al usuario
            //consultamos para verificar si existe usuario en bd
            $email = isset($_POST['email']) ? trim($_POST['email']) : false;
             //validamos email
             if( !empty($email)  && filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email_valido = true;
            }else{
                $email_valido = false;
                $errores= "Correo o contraseña incorrecta"; 
            }
            
            if($email_valido){
                
            $usuario = new Usuario();
            $usuario->setEmail($email);
            $reult = $usuario->consultEmail();
                if($reult){
                    //verificamos el password
                    $password = isset($_POST['password']) ? $_POST['password'] : false;
                    if( !empty($password) && strlen($password) >= 6){
                        $password_valido = true;
                    }else{
                        $password_valido = false;
                        $errores = "Correo o contraseña incorrecta";
                    }
                    

                    if($password_valido){
                        $objUsuaio =  $usuario->login($email,$password);
                        //creamos la sesion.
                        if($objUsuaio){
                            $_SESSION['usuario'] =  $objUsuaio; 
                            if($_SESSION['usuario']['rol'] == 'admin'){
                                $_SESSION['admin'] =  'admin'; 
                            }
                        }else{ 
                            $errores = "Correo o contraseña incorrecta";                           
                            $_SESSION['errores-login']['login'] = $errores;
                        }                                                         
                    }else{
                        $_SESSION['errores-login']['login'] = $errores;
                    }

                }else{
                    $errores = "Correo o contraseña incorrecta";
                    $_SESSION['errores-login']['login'] = $errores;
                }
            }else{
                
                $_SESSION['errores-login']['login'] = $errores;
            }
        }
        header("Location:".base_url);
    }

    public function logout(){

        if(isset($_SESSION['usuario'])){
            $_SESSION['usuario'] = null;
            unset($_SESSION['usuario']);
        }

        if(isset($_SESSION['admin'])){
            $_SESSION['admin'] = null;
            unset($_SESSION['admin']);
        }

        header("Location:".base_url);

    }
}