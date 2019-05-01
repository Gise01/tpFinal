<?php
$titulo = 'Registro'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once ('head.php') ?>
</head>
<body>
   <Header></Header>
   <div class = 'conteiner'> 
       <div class = 'registro'> 
       <form action="registro.php" method='post'>
        <label for="">Nombre Completo:*</label>
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
        <div class= 'suscripcion'>
            <label for="">Suscripción al newsletter:</label><br>
            <input type="radio" name="suscripcion" id="si" checked> SI 
            <input type="radio" name="suscripcion" id="no" > NO 
        </div>
        <button type="submit">ENVIAR</button>
        <button type="reset">CANCELAR</button>
    </form>
   </div>
</body>
</html>