<?php
class Producto {
    private $codigo;
    private $nombre;
    private $precio;
    private $stock;
    private $descripcion;
    private $imagen;
    private $marca_id;
    private $categoria_id;
    private $descuento_id;
    
    public function setCodigo (int $codigo) {
        $this->codigo = $codigo;
    }

    public function getCodigo () : int {
        return $this->codigo;
    }
    
    public function setNombre (string $nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre () : string {
        return $this->nombre;
    }

    public function setPrecio (float $precio) {
        $this->precio = $precio;
    }

    public function getPrecio () : float {
        return $this->precio;
    }
    public function setStock (float $stock) {
        $this->stock = $stock;
    }

    public function getStock () : float {
        return $this->stock;
    }
    
    public function setDescripcion (string $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion () : string {
        return $this->descripcion;
    }
    
    public function setImagen (string $imagen) {
        $this->imagen = $imagen;
    }

    public function getImagen () : string {
        return $this->imagen;
    }
    
    public function setMarca_id (int $marca_id) {
        $this->marca_id = $marca_id;
    }

    public function getMarca_id () : int {
        return $this->marca_id;
    }
    
    public function setCategoria_id (int $categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    public function getCategoria_id () : int {
        return $this->categoria_id;
    }
    
    public function setDescuento_id (float $descuento_id) {
        $this->descuento_id = $descuento_id;
    }

    public function getDescuento_id () : float {
        return $this->descuento_id;
    }
    
}