<?php

session_start();

$errorsLogin = [];
$errorsValidacion = [];

if (!empty($_POST)) {
	if (empty($_POST['email'])){
		$errorsLogin['email'][] = 'Se necesita email';
	}

	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$errorsLogin['email'][] = 'El mail no es valido';
	}

	if (empty($_POST['password'])) {
		$errorsLogin['password'][] = 'Ingrese su contraseña';
	}
	
	
	if(empty($errorsLogin)) {
		
		$usuarios = json_decode(file_get_contents('usuarios.json'), true);
		
		foreach ($usuarios as $usuario) {
			if($_POST['email'] === $usuario['email'] && password_verify($_POST['password'], $usuario['password'])) {
				
				
				$_SESSION['email'] = $usuario['email'];
				$_SESSION['nombre'] = $usuario['nombre'];
				
				header ('location: comprar.php');
				
				break;
			}
		}

		$errorsValidacion = ["Usuario no encontrado"];
	}
}

	
