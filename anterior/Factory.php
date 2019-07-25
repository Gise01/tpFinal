<?php

require_once ('src/DBStorage.php');
require_once ('src/JsonStorage.php');

class Factory {

    private static $objects = [
        'storages'=>[
            'json' => JsonStorage::class,
            'db' => DBStorage::class,
        ], 
    ];
    
    private function __construct(){}

    public static function get($key, $subkey){
        return new self::$objects[$key][$subkey];
    }    
    
}