<?php

require_once ('Factory.php');

class Usuario{
    
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $fechaNacimiento;
    protected $direccion;
    protected $pais;
    protected $email;
    protected $password;
    protected $avatar;
    protected $suscripcion;
    protected $terminos;
    

    public function getId() : int {
        return $this->$id;
    }
    
    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }

    public function getNombre() : string {
        return $this->nombre;
    }

    public function setApellido(string $apellido){
        $this->apellido = $apellido;
    }

    public function getApellido() : string {
        return $this->apellido;
    }
    
    public function setFechaNacimiento(string $fechaNacimiento){
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getFechaNacimiento() : string {
        return $this->fechaNacimiento;
    }
    
    public function setDireccion(string $direccion){
        $this->direccion = $direccion;
    }

    public function getDireccion() : string {
        return $this->direccion;
    }
    
    public function setPais(string $pais){
        $this->pais = $pais;
    }

    public function getPais() : string {
        return $this->pais;
    }
    
    public function setEmail(string $email){
        $this->email = $email;
    }

    public function getEmail() : string {
        return $this->email;
    }
    
    public function setPassword(string $password){
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getPassword() : string {
        return $this->password;
    }

    public function uploadAvatar() : string{
        if (!empty($_FILES)) {
            $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            
            $hashedName = md5($_FILES['avatar']['name']) . '.' . $ext;
        
            $path = 'uploads/' . $hashedName;
        
            move_uploaded_file($_FILES['avatar']['tmp_name'], $path);
        }

        return $path;
    }
    
    public function setAvatar(string $avatar){
        $this->avatar = $avatar;
    }

    public function getAvatar() : string {
        return $this->avatar;
    }
    
    public function setSuscripcion(string $suscripcion){
        $this->suscripcion = $suscripcion;
    }

    public function getSuscripcion() : string {
        return $this->suscripcion;
    }

    public function setTerminos(string $terminos){
        $this->terminos = $terminos;
    }

    public function getTerminos() : string {
        return $this->terminos;
    }

    public function save(StorageInterface $storage) {

        $storage->getSource();

        if ($storage instanceof DBStorage) {
            $sql = 'INSERT INTO Usuarios (nombre, apellido, fechaNacimiento, direccion, pais, email, `password`, avatar, suscripcion, terminos)
            VALUES (:nombre, :apellido, :fechaNacimiento, :direccion, :pais, :email, :password, :avatar, :suscripcion, :terminos)';

            $storage->setQuery($sql);
        }

        $storage->insertar([
            'nombre' => $this->getNombre(),
            'apellido' => $this->getApellido(),
            'fechaNacimiento' => $this->getFechaNacimiento(),
            'direccion' => $this->getDireccion(),
            'pais' => $this->getPais(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'avatar' => $this->getAvatar(),
            'suscripcion' => $this->getSuscripcion(),
            'terminos' => $this->getTerminos(),
        ]);
                
        
    }
}