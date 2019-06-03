<?php

session_start();

$usuarios = json_decode(file_get_contents('usuarios.json'), true);

$errorsLogin = [];

if (!empty($_POST)) {
	foreach ($usuarios as $usuario) {

		if ($_POST['email'] != $usuario['email'] ) {
		$errorsLogin['email'] = "Usuario no existe";
		}

		$verification = password_verify($_POST['password'], $usuario['pass']); 
	
		if ($verification == false) {
			$errorsLogin['password'] = "Contraseña incorrecta";
		}
	}
	
};


if (empty($errorsLogin)) {
	header ('Location: tienda.php');
	}

 
