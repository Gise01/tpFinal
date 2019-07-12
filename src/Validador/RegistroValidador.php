<?php

require_once ('Validador.php');

class RegistroValidador extends Validador{

    protected $user;
    
    public function __construct(array $dato){
        $this->user = $dato;
    }

    private function isNombre() {
        if (empty($this->user['nombre'])) {
            $this->errors['nombre'] = 'Falta Nombre';
        }
    }

    private function validezNombre(){
        if (strlen($this->user['nombre'])<3) {
            $this->errors['nombre'] = 'Nombre inexistente';
        }
    }

    private function isApellido() {
        if (empty($this->user['apellido'])) {
            $this->errors['apellido'] = 'Falta Apellido';
        }
    }

    private function validezApellido(){
        if (strlen($this->user['apellido'])<3) {
            $this->errors['apellido'] = 'Apellido inexistente';
        }
    }

    private function isFechaNac(){
        if (empty($this->user['fechaNacimiento'])) {
            $this->errors['fechaNacimiento'] = 'se requiere fecha de nacimiento';
        }
    }

    private function mayorEdad(){
        if (!empty($this->user['fechaNacimiento'])) {
            $fecha_actual = getdate();
            $fecha_nacimiento = strtotime($this->user["fechaNacimiento"]);
            $resultado = $fecha_actual[0] - $fecha_nacimiento;
            
            if ($resultado<568090325) {
                $this->errors['fechaNacimiento'] = 'Es necesario ser mayor de edad';
            }
        }
    }

    private function isEmail(){
        if (empty($this->user['email'])) {
            $this->errors['email'] = 'Falta email';
        }
    }

    private function validezEmail(){
        if (!empty($this->user['email'])){
            if (!filter_var($this->user['email'], FILTER_VALIDATE_EMAIL)){
                $this->errors['email'] = 'Email no valido';
            }
        }
    }

    private function largoPass(){
        if(strlen($this->user['password'])<6 && strlen($this->user['password'])>16){
            $this->errors['password'] = "La clave debe tener como mínimo 6 caracteres y máximo 15";
        }
    }

    private function seguridadPassLetra(){
        if (!preg_match('`[a-z]`',$this->user['password'])){
            $this->errors['password'] = "La clave debe tener al menos una letra minúscula";
        }
    }

    private function seguridadPassNum(){
        if (!preg_match('`[0-9]`',$this->user['password'])){
            $this->errors['password'] = "La clave debe tener al menos un caracter numérico";
        }
    }

    private function validezPass(){
        if (empty($this->user['val_password'])){
            $this->errors['password'] = "Falta validar password";
        }
    }

    private function coincidenPass(){
        if ($this->user['password'] != $this->user['val_password']) {
            $this->errors['password'] = "Las passwords no coinciden";
        }
    }    

    private function isTerminos(){
        if(!isset($this->user['terminos']) || $this->user['terminos'] != 'si') {
            $this->errors['terminos'] = 'Se deben aceptar los términos y condiciones';
        }
    }

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