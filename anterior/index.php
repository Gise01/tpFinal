<?php
$titulo = 'Solo Notebook';

require ('src/config.php');
  
  try {
    $pdo = DB::getInstance();?>
    
      <html>
        <head>
          <?php require_once ('links/head.php') ?>
          <link rel="stylesheet" href="css/index.css">
        </head>
        <body>
          <div class="container">
            <header>
              <?php require_once ("links/nav.php") ?>
            </header>
              <main>
                <h2>Bienvenidos a</h2>
                <h1>Solo Notebooks</h1><br><br>
                <h3>Somos Mercado Lider</h3>
              </main> <br>
              <br>
              <div class="maps">
                <h3>Retira tu compra en nuestro showroom</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d345.87095720430415!2d-58.55580588809013!3d-34.54284076147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcba00b3f01957%3A0x9adb73843a544523!2sRep%C3%BAblica+5372%2C+Villa+Ballester%2C+Buenos+Aires!5e0!3m2!1ses!2sar!4v1559616125057!5m2!1ses!2sar" width="600" height="400" frameborder="0" style="border:0" allowfullscreen></iframe><br><br>
                <h3>Tambien enviamos a domicilio</h3>
              </div>
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
<?php 
} catch (Exception $e) {
    $e->getMessage();?>
      <html>
        <head>
          <link rel="stylesheet" href="css/index.css">
        </head>
        <body>
          <div class="container">
            <header>
            </header>
              <main>
                <h2>Bienvenidos a</h2>
                <h1>Solo Notebooks</h1><br><br>
                <h3>Somos Mercado Lider</h3>
              </main> <br>
              <br>
              <div>
                <h3>Para poder visualizar nuestra pagina completamente es necesario actualizar la pagina</h3>
                <h4><a href="inicioBD.php">Click acá para continuar</a></h4>
              </div>
          </div>
        </body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>       
      </html>

<?php
}
?>

