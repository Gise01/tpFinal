<?php

class Marca {
    
    private $id;
    private $nombre;
    private $imagen;
    
    public function getId () : int {
        return $this->id;
    }
        
    public function setNombre (string $nombre) {
        $this->nombre = $nombre;
    }     
      
    public function getNombre () : string {
        return $this->nombre;
    }     
        
    public function setImagen (string $imagen) {
        $this->imagen = $imagen;
    }

    public function getImagen () : string {
        return $this->imagen;
    }
    
}