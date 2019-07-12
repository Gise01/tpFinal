<?php

class Categoria {
    
    private $id;
    private $nombre;
   
    public function getId () : int {
        return $this->id;
    }
        
    public function setNombre (string $nombre) {
        $this->nombre = $nombre;
    }     
      
    public function getNombre () : string {
        return $this->nombre;
    }     
        
}