<?php

class Descuento {
    
    private $id;
    private $nombre;
    private $valor;
    
    public function getId () : int {
        return $this->id;
    }
        
    public function setNombre (string $nombre) {
        $this->nombre = $nombre;
    }     
      
    public function getNombre () : string {
        return $this->nombre;
    }     
        
    public function setValor (string $valor) {
        $this->valor = $valor;
    }

    public function getValor () : string {
        return $this->valor;
    }
    
}