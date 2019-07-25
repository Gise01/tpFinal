<?php

require_once ('config.php');
require_once ('StorageInterface.php');

class DBStorage implements StorageInterface {

    private $source;

    private $sql;

    public function setQuery($sql){
        $this->sql = $sql;

    }

    public function getSource(){
        $this->source = DB::getInstance();

    }

    public function insertar(array $dato = []){
       $stmt = $this->source->prepare($this->sql);
       
        foreach ($dato as $key => $value){
            $stmt->bindValue($key, $value);
        }
        
        $stmt->execute();
    }

    public function getId(){
        return $this->source->lastInsertId();
    }

}