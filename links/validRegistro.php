<?php

if (!empty($_FILES)) {
    $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    
    $hashedName = md5($_FILES['avatar']['name']) . '.' . $ext;

    $path = 'uploads/' . $hashedName;

    move_uploaded_file($_FILES['avatar']['tmp_name'], $path);
}

$errorsRegistro = [];
$usuario = [];

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

    if (empty($_POST['fechaNacimiento'])) {
        $errorsRegistro['fechaNacimiento'] = 'se requiere fecha de nacimiento';
    }
    
    if (!empty($_POST['fechaNacimiento'])) {
        $fecha_actual = getdate();
        $fecha_nacimiento = strtotime($_POST["fechaNacimiento"]);
        $resultado = $fecha_actual[0] - $fecha_nacimiento;
            
        if ($resultado<568090325) {
        $errorsRegistro['fechaNacimiento'] = 'Es necesario ser mayor de edad';
        }
    }

    if (empty($_POST['email'])) {
        $errorsRegistro['email'] = 'Falta email';
    }

    if (!empty($_POST['email'])){
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false){
            $errorsRegistro['email'] = 'Email no valido';
        }
    }

    if (!empty($_POST['email'])) {
        
        $usuarios = file_get_contents ('usuarios.json');
    
        $usuarios_array = json_decode ($usuarios, true);
        
        foreach ($usuarios_array as $registro) {
            if ($_POST['email'] = $registro['email']) {
                
                $errorsRegistro['email'] = 'Usuario Registrado';
                                    
            }
        }
    }

    if(strlen($_POST['contraseña']) < 6){
        $errorsRegistro['contraseña'] = "La clave debe tener al menos 6 caracteres";
    }
    
    if(strlen($_POST['contraseña']) > 16){
        $errorsRegistro['contraseña'] = "La clave no puede tener más de 16 caracteres";
    }
    
    if (!preg_match('`[a-z]`',$_POST['contraseña'])){
        $errorsRegistro['contraseña'] = "La clave debe tener al menos una letra minúscula";
    }
    
    if (!preg_match('`[A-Z]`',$_POST['contraseña'])){
        $errorsRegistro['contraseña'] = "La clave debe tener al menos una letra mayúscula";
    }
    
    if (!preg_match('`[0-9]`',$_POST['contraseña'])){
        $errorsRegistro['contraseña'] = "La clave debe tener al menos un caracter numérico";
    }

    if (empty($_POST['val_contraseña'])){
        $errorsRegistro['contaseña'] = "Falta validar contraseña";
    }

    if ($_POST['contraseña'] != $_POST['val_contraseña']) {
        $errorsRegistro['contraseña'] = "Las contraseñas no coinciden";
    }

    if (empty($errorsRegistro)) {
        $usuario = [
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'fechaNacimiento' => $_POST['fechaNacimiento'],
            'direccion' => $_POST['direccion'],
            'pais' => $_POST['pais'],
            'email' => $_POST['email'],
            'contraseña' => password_hash($_POST['contraseña'], PASSWORD_DEFAULT),
            'avatar' => $hashedName,
            'terminos' => $_POST['terminos'],
	    ];
    
        $usuarios = file_get_contents ('usuarios.json');
    
        $usuarios_array = json_decode ($usuarios, true);

        $usuarios_array[] = $usuario; 
        
        $json_usuarios = json_encode($usuarios_array, JSON_PRETTY_PRINT);
            
        file_put_contents ('usuarios.json', $json_usuarios);
    }
  
}
