<?php

class Usuario{

    private $id;
    private  $nombre;
    private  $apellidos;
    private  $email;
    private $password;
    private $rol;
    private $imagen;
    private $db;
    
    public function __construct()
    {
        //conexion a bd
        $this->db = DataBase::connect();
    }
   

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }

    /**
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $this->db->real_escape_string($apellidos);

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return$this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = password_hash($this->db->real_escape_string($password),PASSWORD_BCRYPT, ['const' => 4]);

        return $this;
    }

    /**
     * Get the value of rol
     */ 
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     *
     * @return  self
     */ 
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function consultEmail(){

        $sql = "SELECT email FROM usuarios WHERE email = '{$this->getEmail()}'";
        $consultEmail = $this->db->query($sql);
        $result = false;
         if($consultEmail->num_rows > 0){
            $result = true;
         }
         
         return $result;
    }
    public function save(){
         $sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}','{$this->getPassword()}','user',null)";
         $save = $this->db->query($sql);

         $result = false;
         if($save){
            $result = true;
         }
         return $result;
    }

    public function login($email,$password){

        $sql = "SELECT * FROM usuarios WHERE email = '$email' ";
        $login =  $this->db->query($sql);
        if($login && mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);
        $varify = password_verify($password, $usuario['password']);
        $result = false;
        if($varify){
            $result = $usuario;
        }
        
        return $result;
    }

    }
}