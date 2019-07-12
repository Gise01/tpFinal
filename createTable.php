<?php

require ('src/config.php');

try {
    $pdo = DB::getInstance();
    
        $usuarios= 'CREATE TABLE Usuarios(
            id INT AUTO_INCREMENT,
            nombre VARCHAR(50) NOT NULL,
            apellido VARCHAR(50) NOT NULL,
            fechaNacimiento DATE NOT NULL,
            direccion VARCHAR(80) NULL,
            pais VARCHAR(40) NOT NULL,
            email VARCHAR(50) NOT NULL,
            `password` VARCHAR(255) NOT NULL,
            avatar VARCHAR(100) NOT NULL,
            suscripcion VARCHAR(2) NOT NULL,
            terminos VARCHAR(2) NOT NULL, 
            date_created TIMESTAMP NOT NULL,
            
            PRIMARY KEY (id),
            UNIQUE (email)
        )';

    $stmt = $pdo->prepare($usuarios);
    $stmt->execute();

    $marcas= 'CREATE TABLE Marcas(
        id TINYINT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(60) NOT NULL,
        image_URL VARCHAR(100)
    )';
    
    $stmt = $pdo->prepare($marcas);
    $stmt->execute();
    
    $categorias= 'CREATE TABLE Categorias(
        id TINYINT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(60) NOT NULL 
    )';
    
    $stmt = $pdo->prepare($categorias);
    $stmt->execute();

    $productos= 'CREATE TABLE Productos(
        codigo INT PRIMARY KEY NOT NULL,
        nombre VARCHAR(50) NOT NULL,
        precio DECIMAL NOT NULL,
        stock DECIMAL NOT NULL,
        descripcion VARCHAR(80),
        image_URL VARCHAR(100),
        marca_id INT,
        categoria_id INT,
        last_update TIMESTAMP,
        descuento DECIMAL

    )';

    $stmt = $pdo->prepare($productos);
    $stmt->execute();

    $payment= 'CREATE TABLE Payment(
        id TINYINT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(60) NOT NULL  
    )';

    $stmt = $pdo->prepare($payment);
    $stmt->execute();

    $descuento= 'CREATE TABLE Descuento(
        id TINYINT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(60),
        valor DECIMAL   
    )';
    
    $stmt = $pdo->prepare($descuento);
    $stmt->execute();
    
    $carrito= 'CREATE TABLE Carrito(
        id INT AUTO_INCREMENT PRIMARY KEY,
        cantidad DECIMAL NOT NULL,
        producto_id INT
         
    )';
    
    $stmt = $pdo->prepare($carrito);
    $stmt->execute();

    $venta= 'CREATE TABLE Venta(
        id INT AUTO_INCREMENT PRIMARY KEY,
        usuario_id INT,
        carrito_id INT,
        monto DECIMAL,
        descuento_id TINYINT

    )';

    $stmt = $pdo->prepare($venta);
    $stmt->execute();

    header ('location: conversionJson.php');
    
} catch (Exception $e) {
    echo 'Error en la creación' . $e->getMessage();
}
