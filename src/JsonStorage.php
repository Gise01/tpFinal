<?php

require_once ('StorageInterface.php');

class JsonStorage implements StorageInterface {

    private $source = 'usuarios.json';
    private $data;
    
    public function getSource() {
        $this->data = json_decode(file_get_contents($this->source), true);
        return $this->data;
    }

    public function insertar(array $dato = []) {
        $this->data[] = $dato;
        $json = json_encode($this->data, JSON_PRETTY_PRINT);
        file_put_contents($this->source, $json);

    }

    public function getId(){
        return count($this->data)-1;

    }

}