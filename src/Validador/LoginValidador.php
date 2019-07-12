<?php

require_once ('Validador.php');

class LoginValidador extends Validador{
    
    protected $user;
    
    public function __construct(array $dato){
        $this->user = $dato;
    }

    private function isEmail(){
        if (empty($this->user['email'])) {
            $this->errors['email'] = 'Se necesita email';
        }
    }

    private function validezEmail(){
        if (!empty($this->user['email'])){
            if (!filter_var($this->user['email'], FILTER_VALIDATE_EMAIL)){
                $this->errors['email'] = 'Email no valido';
            }
        }
    }

    private function isPassword(){
        if (empty($this->user['password'])) {
            $this->errors['password'] = 'Ingrese su contraseña';
        }
    }
    
    public function validate() {
        $this->isEmail();
        $this->validezEmail();
        $this->isPassword();
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