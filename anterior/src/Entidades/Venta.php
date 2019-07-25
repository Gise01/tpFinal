<?php

class Venta {
    
    private $id;
    private $usuario_id;
    private $carrito_id;
    private $monto;
    private $descuento_id;
    
    public function getId () : int {
        return $this->id;
    }
        
    public function setUsuario_id (int $usuario_id) {
        $this->usuario_id = $usuario_id;
    }     
      
    public function getUsuario_id () : int {
        return $this->usuario_id;
    }     
        
    public function setCarrito_id (int $carrito_id) {
        $this->carrito_id = $carrito_id;
    }

    public function getCarrito_id () : int {
        return $this->carrito_id;
    }
    
    public function setMonto (float $monto) {
        $this->monto = $monto;
    }

    public function getMonto () : float {
        return $this->monto;
    }
    
    public function setDescuento_id (int $descuento_id) {
        $this->descuento_id = $descuento_id;
    }

    public function getDescuento_id () : int {
        return $this->descuento_id;
    }
    
}