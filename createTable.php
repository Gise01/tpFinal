<?php

require_once('links/conexion.php');

try {
    $pdo= new PDO($dsn, $user, $password, $opt);
    
        $usuarios= 'CREATE TABLE Usuarios(
            id INT AUTO_INCREMENT,
            nombre VARCHAR(50) NOT NULL,
            apellido VARCHAR(50) NOT NULL,
            fechaNacimiento DATE NOT NULL,
            direccion VARCHAR(80) NULL,
            pais VARCHAR(40) NOT NULL,
            email VARCHAR(50) NOT NULL,
            `password` VARCHAR(100) NOT NULL,
            avatar VARCHAR(100) NOT NULL,
            suscripcion VARCHAR(2) NOT NULL,
            terminos VARCHAR(2) NOT NULL, 
            date_created TIMESTAMP NOT NULL,
            
            PRIMARY KEY (id),
            UNIQUE (email)
        )ENGINE=InnoDB DEFAULT CHARSET=latin1';

    $pdo->execute($usuarios);

    $productos= 'CREATE TABLE Productos(
        codigo INT PRIMARY KEY UNIQUE NOT NULL,
        nombre VARCHAR(50) NOT NULL,
        precio DECIMAL NOT NULL,
        stock DECIMAL NOT NULL,
        descripcion VARCHAR(80),
        image_URL VARCHAR(100),
        marca_id INT,
        categoria_id INT,
        last_update TIMESTAMP,
        descuento DECIMAL,

        FOREIGN KEY (marca_id) REFERENCES Marcas(id),
        FOREIGN KEY (categoria_id) REFERENCES Categorias(id)
    )ENGINE=InnoDB DEFAULT CHARSET=latin1';

    $pdo->execute($productos);

    $marcas= 'CREATE TABLE Marcas(
        id TINYINT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(60) NOT NULL,
        image_URL VARCHAR(100)
    )ENGINE=InnoDB DEFAULT CHARSET=latin1';

    $pdo->execute($marcas);

    $categorias= 'CREATE TABLE Categorias(
        id TINYINT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(60) NOT NULL 
    )ENGINE=InnoDB DEFAULT CHARSET=latin1';

    $pdo->execute($categorias);

    $payment= 'CREATE TABLE Payment(
        id TINYINT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(60) NOT NULL  
    )ENGINE=InnoDB DEFAULT CHARSET=latin1';

    $pdo->execute($payment);

    $venta= 'CREATE TABLE Venta(
        id INT AUTO_INCREMENT PRIMARY KEY,
        usuario_id INT,
        carrito_id INT,
        monto DECIMAL,
        descuento_id TINYINT,
        
        FOREIGN KEY (descuento_id) REFERENCES Descuentos(id),
        FOREIGN KEY (usuario_id) REFERENCES Usuarios(id),
        FOREIGN KEY (carrito_id) REFERENCES Carrito(id)

    )ENGINE=InnoDB DEFAULT CHARSET=latin1';

    $pdo->execute($venta);

    $descuento= 'CREATE TABLE Descuento(
        id TINYINT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(60),
        valor DECIMAL   
    )ENGINE=InnoDB DEFAULT CHARSET=latin1';

    $pdo->execute($descuento);

    $carrito= 'CREATE TABLE Carrito(
        id INT AUTO_INCREMENT PRIMARY KEY,
        cantidad DECIMAL NOT NULL,
        producto_id INT, 
        
        FOREIGN KEY (producto_id) REFERENCES Productos(codigo)  
    )ENGINE=InnoDB DEFAULT CHARSET=latin1';

    $pdo->execute($carrito);
    
    header ('location: conversionJson.php');
    
} catch (Exception $e) {
    echo 'Error en la creación' . $e->getMessage();
}
