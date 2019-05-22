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
                    <input type="text" name='nombre' value= <?= $_POST['nombre'] ?? '' ?> required><br>
                    <label for="">Apellido:*</label>
                    <input type="text" name='apellido' value= <?= $_POST['apellido'] ?? '' ?> required><br>
                    <label for="">Fecha de Nacimiento:*</label> <?= errorsRegistro[0]?>
                    <input type="date" name="fechaNacimiento" value= <?= $_POST['fechaNacimiento'] ?? '' ?> required><br>
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
                    <input type="email" placeholder= 'usuario@email.com' name='email' value= <?= $_POST['email'] ?? '' ?> required><br>
                    <label for="">Contraseña:*</label>
                    <input type="password" name="contraseña" required>
                    <label for="">Validar Contraseña:*</label>
                    <input type="password" name="contraseña" required>
                    <label for="">AVATAR:*</label>
                    <input type="file" name="avatar" required><br>
                    <label for="">Suscripción al newsletter:</label><br>
                    <input type="radio" name="suscripcion" id="si" checked> SI 
                    <input type="radio" name="suscripcion" id="no" > NO <br>
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