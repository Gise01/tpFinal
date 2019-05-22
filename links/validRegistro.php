<?php

$fecha_actual = getdate();
$fecha_nacimiento = strtotime($_POST["fechaNacimiento"]);
$resultado = $fecha_actual[0] - $fecha_nacimiento;
echo $resultado;

if (!empty($_FILES)) {
    $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    
    $hashedName = md5($_FILES['avatar']['name']) . '.' . $ext;

    $path = 'uploads/' . $hashedName;

    move_uploaded_file($_FILES['avatar']['tmp_name'], $path);
}

$errorsRegistro = [];

if (!empty($_POST)) {
    if (empty($_POST['nombre'])) {
        $errorsRegistro['nombre'] = 'Falta Nombre';
    }

    if (strlen($_POST['nombre'])<3) {
        $errorsRegistro['nombre'] = 'Nombre inexistente';
    }

    if (empty($_POST['apellido'])) {
        $errorsRegistro['apellido'] = 'Falta Apellido';
    }

    if (strlen($_POST['apellido'])<3) {
        $errorsRegistro['apellido'] = 'Apellido inexistente';
    }

    if ($resultado>=568090325) {
        $errorsRegistro['fechaNacimiento'] = 'Es necesario ser mayor de edad';
    }





    $usuario = [
        'nombre' => $_POST['nombre'],
        'apellido' => $_POST['apellido'],
        'fechaNacimiento' => $_POST['fechaNacimiento'],
        'direccion' => $_POST['direccion'],
        'pais' => $_POST['pais'],
        'email' => $_POST['email'],
        'contraseña' => password_hash($_POST['contraseña'], PASSWORD_DEFAULT),
        'avatar' => $hashedName,
	];
    
    $usuarios = file_get_contents ('usuarios.json');
    
    $usuarios_array = json_decode ($usuarios, true);

    foreach ($usuarios_array as $registro) {
        if ($_POST['email'] != $registro['email']) {

            $usuarios_array [] = $usuario;

            $json_usuarios = json_encode($usuarios_array, JSON_PRETTY_PRINT);
            
            file_put_contents ('usuarios.json', $json_usuarios);
        }
    }
    
}
