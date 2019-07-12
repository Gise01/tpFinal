<?php

$server='localhost';
$user='root';
$password='';


$conection= new mysqli($server, $user, $password);

if($conection->connect_error){
    echo 'Error de conexion' . $conection->connect_error;
}

$sql = 'CREATE DATABASE soloNotebook';

if($conection->query($sql)===true) {
    header ('location: createTable.php');
    } else {
    echo 'Error en la creación' . $conection->error;
}

