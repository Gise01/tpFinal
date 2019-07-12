<?php

class Carrito {
    
    private $id;
    private $cantidad;
    private $producto_id;
    
    public function getId () : int {
        return $this->id;
    }
        
    public function setCantidad (float $cantidad) {
        $this->cantidad = $cantidad;
    }     
      
    public function getCantidad () : float {
        return $this->cantidad;
    }     
        
    public function setProducto_id (int $producto_id) {
        $this->producto_id = $producto_id;
    }

    public function getProducto_id () : int {
        return $this->producto_id;
    }
    
}