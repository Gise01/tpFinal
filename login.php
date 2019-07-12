<?php
$titulo = 'Login';

session_start();

//require ('links/validLogin.php');
require ('src/config.php');
require_once ('src/Validador/LoginValidador.php');
require_once ('src/Entidades/Usuario.php');

if(!empty($_POST)){
    $validador = new LoginValidador($_POST);
    $validador->validate();
    
    if($validador->estaValidado()){
  
        $usuario = new Usuario;
        $usuario->setEmail($_POST['email']);
                
        try {

            $pdo = DB::getInstance();

            $email=$usuario->getEmail();
            $pass=$_POST['password'];
            
            $sql = 'SELECT nombre, email, `password` FROM Usuarios WHERE email=:email';

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue('email', $usuario->getEmail());
            
            $stmt->execute();

            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (password_verify($pass, $cliente['password'])) {
                $_SESSION['email'] = $cliente['email'];
                $_SESSION['nombre'] = $cliente['nombre'];
            }
                    
        header ('location: comprar.php');

        } catch (Exception $e){
            echo $e->getMessage();
            echo 'El usuario o la contraseñas estan incorrectas';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
      <?php require_once ('links/head.php') ?>
      <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div class = 'container'>
            <Header>
                <?php require_once ('links/nav.php')?>
            </Header>
        </div>  
        <div class = 'principal'>
            <form action="login.php" method='post'>
                <div class = 'login'>
                    
                    <label for="">Usuario:</label><br>
                    <input type="text" placeholder="&#128272; Usuario@email.com" name="email"><br>
                    <p id="errores"><?php if(isset($validador)) {echo $validador->getError('email');}?></p>
                    <label for="">Contraseña:</label><br>
                    <input type="password" placeholder="&#128273; Contraseña" name="password"><br>
                    <p id="errores"><?php if(isset($validador)) {echo $validador->getError('password');}?></p>
                    <input type="submit" value="Ingresar"><br>
                    <input type="reset-password" value="Olvide mi contraseña">
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
