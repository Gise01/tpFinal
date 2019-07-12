<?php

require_once ('Validador.php');

class LoginValidador extends Validador{
    protected $user;
    
    public function __construct(array $dato){
        $this->user = $dato;
    }

    private function 
    
    public function validate() {
        $this->isNombre();
        $this->validezNombre();
        $this->isApellido();
        $this->validezApellido();
        $this->isFechaNac();
        $this->mayorEdad();
        $this->isEmail();
        $this->validezEmail();
        $this->largoPass();
        $this->seguridadPassLetra();
        $this->seguridadPassNum();
        $this->validezPass();
        $this->coincidenPass();
        $this->isTerminos();
    }

    public function getErrors(){
        return $this->errors;
    }

    public function getError($campo){
        return $this->errors[$campo] ?? '';
    } 

    public function estaValidado(){
        return empty($validador->errors);
    }
}