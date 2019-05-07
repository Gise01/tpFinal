<?php
$titulo = 'Login'
?>

<!DOCTYPE html>
<html lang="en">
    <head>
      <?php require_once ('links/head.php') ?>
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
                    <label for="">Usuario:</label>
                    <input type="text" placeholder="&#128272; Usuario@email.com" name="login">
                    <label for="">Contraseña:</label>
                    <input type="password" placeholder="&#128273; Contraseña" name="password">
                    <input type="submit" value="Ingresar">
                    <input type="reset-password" value="Olvide mi contraseña">
                    </div>
            </form>
             </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
