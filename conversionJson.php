<?php

require_once('links/conexion.php');

try{
    $pdo= new pdo($dsn, $user, $password, $opt);

    $usuarios = file_get_contents ('usuarios.json');
    $usuariosArray = json_decode ($usuarios, true);

    foreach ($usuariosArray as $usuario) {

        $nombre=$usuario['nombre'];
        $apellido=$usuario['apellido'];
        $fechaNacimiento=$usuario['fechaNacimiento'];
        $direccion=$usuario['direccion'];
        $pais=$usuario['pais'];
        $email=$usuario['email'];
        $password=$usuario['password'];
        $avatar=$usuario['avatar'];
        $suscripcion=$usuario['suscripcion'];
        $terminos=$usuario['terminos'];
          
        $stmt=$pdo->prepare('INSERT into Usuarios(nombre, apellido, fechaNacimiento, direccion, pais, email, `password`, avatar, suscripcion, terminos)
                            VALUES (:nombre, :apellido, :fechaNacimiento, :direccion, :pais, :email, :password, :avatar, :suscripcion, :terminos)');

        $stmt->execute([':nombre'=>$nombre,
                        ':apellido'=>$apellido,
                        ':fechaNacimiento'=>$fechaNacimiento,
                        ':direccion'=>$direccion,
                        ':pais'=>$pais,
                        ':email'=>$email,
                        ':password'=>$password,
                        ':avatar'=>$avatar,
                        ':suscripcion'=>$suscripcion,
                        ':terminos'=>$terminos]);
    
    }

    header ('location: index.php');
    } catch (Exception $e) {
        echo 'Error en la actualización' . $e->getMessage();
}


