<?php
$titulo = 'Registro'
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once ('head.php') ?>
    </head>
    <body>
        <div class = 'container'>
            <Header>
                <?php require_once ('nav.php') ?>
            </Header>
        </div>
        <div class = 'principal'> 
            <form action="registro.php" method='post'>
                <div class = 'registro'>
                    <label for="">Nombre:*</label>
                    <input type="text" name='nombre' required><br>
                    <label for="">Apellido:*</label>
                    <input type="text" name='apellido' required><br>
                    <label for="">DNI:*</label>
                    <input type="number" name="DNI" id="DNI" required><br>
                    <label for="">Fecha de Nacimiento:*</label>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" required><br>
                    <label for="">Dirección:</label>
                    <input type="text" name= 'direccion'><br>
                    <label for="">Localidad:</label>
                    <input type="text" name= 'localidad'><br>
                    <label for="">Provincia:</label>
                    <input type="text" name= 'provincia'><br>
                    <label for="">CP:</label>
                    <input type="text" name= 'CP'><br>
                    <label for="">Usuario:*</label>
                    <input type="email" placeholder= 'usuario@email.com' name='mail' required><br>
                    <label for="">Contraseña:*</label>
                    <input type="password" name="contraseña" id="contraseña" required>
                </div>
                <div class = 'suscripcion'>
                    <label for="">Suscripción al newsletter:</label><br>
                    <input type="radio" name="suscripcion" id="si" checked> SI 
                    <input type="radio" name="suscripcion" id="no" > NO 
                </div>
                <div class = 'button'>
                    <button type="submit">ENVIAR</button>
                    <button type="reset">CANCELAR</button>
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>