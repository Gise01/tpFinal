<?php
$titulo = 'Registro';

$paises = [
    'Ar' => 'Argentina',
    'Bo' => 'Bolivia',
    'Br' => 'Brasil',
    'Ch' => 'Chile',
    'Co' => 'Colombia',
    'Ec' => 'Ecuador',
    'Pa' => 'Paraguay',
    'Pe' => 'Peru',
    'Ur' => 'Uruguay',
    'Ve' => 'Venezuela',
];

//require_once ('links/validRegistro.php');
require_once ('links/conexion.php');
require_once ('src/Validador/RegistroValidador.php');
require_once ('src/Entidades/Usuario.php');


if(!empty($_POST)){
    $validador = new RegistroValidador($_POST);
    $validador->validate();
    
    if($validador->estaValidado()){
  
        $usuario = new Usuario;
        $usuario->setNombre($_POST['nombre']);
        $usuario->setApellido($_POST['apellido']);
        $usuario->setFechaNacimiento($_POST['fechaNacimiento']);
        $usuario->setDireccion($_POST['direccion']);
        $usuario->setPais($_POST['pais']);
        $usuario->setEmail($_POST['email']);
        $usuario->setPassword($_POST['password']);
        $usuario->setAvatar($usuario->uploadAvatar());
        $usuario->setSuscripcion($_POST['suscripcion']);
        $usuario->setTerminos($_POST['terminos']);
      
        try {

        $pdo= new PDO($dsn, $user, $password, $opt);
        
        $sql = 'INSERT INTO Usuarios (nombre, apellido, fechaNacimiento, direccion, pais, email, `password`, avatar, suscripcion, terminos)
            VALUES (:nombre, :apellido, :fechaNacimiento, :direccion, :pais, :email, :password, :avatar, :suscripcion, :terminos)';

        $stmt = $pdo->prepare($sql);
        
        $stmt->bindValue('nombre', $usuario->getNombre());
        $stmt->bindValue('apellido', $usuario->getApellido());
        $stmt->bindValue('fechaNacimiento', $usuario->getFechaNacimiento());
        $stmt->bindValue('direccion', $usuario->getDireccion());
        $stmt->bindValue('pais', $usuario->getPais());
        $stmt->bindValue('email', $usuario->getEmail());
        $stmt->bindValue('password', $usuario->getPassword());
        $stmt->bindValue('avatar', $usuario->getAvatar());
        $stmt->bindValue('suscripcion', $usuario->getSuscripcion());
        $stmt->bindValue('terminos', $usuario->getTerminos());

        $stmt->execute();

        header ('location: login.php');

        } catch (Exception $e){
            echo 'El usuario ya existe' . $e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once ('links/head.php') ?>
        <link rel="stylesheet" href="css/registro.css">
    </head>
    <body>
        <div class = 'container'>
            <Header>
                <?php require_once ('links/nav.php') ?>
            </Header>
        </div>
        <div class = 'principal'> 
            <form action="registro.php" method='post' enctype="multipart/form-data">
                <div class = 'registro'>
                    <label for="">Nombre:*</label>
                    <p id="errores"><?php if(isset($validador)) {echo $validador->getError('nombre');}?></p>
                    <input type="text" name='nombre' value= <?= $_POST['nombre'] ?? '' ?>><br>
                    <label for="">Apellido:*</label>
                    <p id="errores"><?php if(isset($validador)) {echo $validador->getError('apellido');}?></p>
                    <input type="text" name='apellido' value= <?= $_POST['apellido'] ?? '' ?>><br>
                    <label for="">Fecha de Nacimiento:*</label>
                    <p id="errores"><?php if(isset($validador)) {echo $validador->getError('fechaNacimiento');}?></p> 
                    <input type="date" name="fechaNacimiento" value= <?= $_POST['fechaNacimiento'] ?? '' ?>><br>
                    <label for="">Dirección:</label>
                    <input type="text" name= 'direccion' value= <?= $_POST['direccion'] ?? '' ?>><br>
                    <label for="">PAIS:</label>
                    <select name= 'pais'><br>
                        <?php foreach ($paises as $codigo => $pais) :?>
                            <?php if ($_POST['pais'] == $codigo) : ?>
                                <option value = "<?= $codigo?>" selected>
                                    <?= $pais?>
                                </option>
                            <?php else : ?>
                                <option value = "<?= $codigo?>">
                                    <?= $pais?>
                                </option> 
                            <?php endif; ?> 
                        <?php endforeach; ?>
                    </select><br>
                    <label for="">Usuario:*</label>
                    <p id="errores"><?php if(isset($validador)) {echo $validador->getError('email');}?></p>
                    <input type="email" placeholder= 'usuario@email.com' name='email'><br>
                    <label for="">Contraseña:*</label>
                    <p id="errores"><?php if(isset($validador)) {echo $validador->getError('password');}?></p>
                    <input type="password" name="password">
                    <label for="">Validar Contraseña:*</label>
                    <input type="password" name="val_password">
                    <label for="">AVATAR:*</label>
                    <p id="errores"><?= $errorsRegistro['avatar'][0] ?? '' ?></p>
                    <input type="file" name="avatar"><br>
                    <label for="">Suscripción al newsletter:</label><br>
                    <input type="radio" name="suscripcion" value="si" checked> SI 
                    <input type="radio" name="suscripcion" value="no" > NO <br><br>
                    <input type="checkbox" name="terminos" value = "si" > 
                    <label for="">He leido y acepto los <a href="links/terminos.pdf" target="_blank">términos y condiciones de uso</a></label><br>
                    <p id="errores"><?php if(isset($validador)) {echo $validador->getError('terminos');}?></p>
                   
                    <div class= 'button'>
                        <button type="submit">ENVIAR</button>
                        <button type="reset">CANCELAR</button>
                    </div>
                </div>
            </form>
        </div>
        <div class= 'container'>
            <footer>
                <?php require_once ('links/footer.php') ?>
            </footer>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>