<?php

class Producto{

    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;

    public function __construct()
    {
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
     * Get the value of categoria_id
     */ 
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of categoria_id
     *
     * @return  self
     */ 
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $this->db->real_escape_string($categoria_id);

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
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);

        return $this;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);

        return $this;
    }

    /**
     * Get the value of oferta
     */ 
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Set the value of oferta
     *
     * @return  self
     */ 
    public function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $this->db->real_escape_string($fecha);

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
        $this->imagen = $this->db->real_escape_string($imagen);

        return $this;
    }


    public function getAll(){

        $sql = "SELECT * FROM productos";
        $productos = $this->db->query($sql);

        return $productos;
    }

    public function getCategoryProduct(){

        $sql = "SELECT p.*, c.nombre as catnombre FROM productos p"
                ." INNER JOIN categorias c on p.categoria_id = c.id"
                ." WHERE p.categoria_id = {$this->getCategoria_id()}"
                ." ORDER BY id DESC";

            $productos = $this->db->query($sql);

            return $productos;
    }

    
    public function randomProducts($limit){

        $sql = "SELECT * FROM productos ORDER BY RAND() LIMIT $limit";
        $productos = $this->db->query($sql);

        return $productos;
    }

    public function save(){

        $sql = "INSERT INTO productos (id, categoria_id, nombre, descripcion, precio, stock, oferta, fecha, imagen) 
        VALUES(NULL,{$this->getCategoria_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getPrecio()}', {$this->getStock()}, '{$this->getOferta()}', NOW(),'{$this->getImagen()}')";
       $save =  $this->db->query($sql);
        $result = false;
        if($save){
           $result = true;
        }
        return $result;
    }

    public function delete(){

    $sql = "DELETE FROM productos WHERE id = {$this->getId()}";
    $delet = $this->db->query($sql);

    $result = false;
    if($delet){
        $result = true;
    }

    return $result;

    }

    public function obtenerProducto(){
        $sql = "SELECT * FROM productos WHERE id = {$this->getId()}";
        $producto = $this->db->query($sql);

        return $producto->fetch_object();
    }

    public function update(){
        $sql = "UPDATE  productos SET 
        categoria_id = {$this->getCategoria_id()}, 
        nombre = '{$this->getNombre()}', 
        descripcion = '{$this->getDescripcion()}', 
        precio = '{$this->getPrecio()}', 
        stock =  {$this->getStock()} , 
        oferta = '{$this->getOferta()}', 
        fecha = NOW()";
        if(!empty($this->getImagen()) || $this->getImagen() != null){
            $sql .= ",imagen = '{$this->getImagen()}'"; 
        }
        $sql .= " WHERE id = '{$this->getId()}'";
       $save =  $this->db->query($sql);
        $result = false;
        if($save){
           $result = true;
        }
        return $result;
    }
    public function getOne(){
        $sql = "SELECT * FROM productos WHERE id = {$this->getId()}";
                $producto = $this->db->query($sql);
                return $producto->fetch_object();
        }
}