<?php
$titulo = 'Comprar productos';
?>

<html>
  <head>
    <?php require_once ('links/head.php') ?>
    <link rel="stylesheet" href="css/comprar.css">
  </head>
  <body>
  <div class="container">
    <header>
      <?php require_once ("links/nav.php") ?>
    </header>

      <section id="notebooks">

        <div class="productos">
          <article class="producto">
            <div class= img>
              <img src="img/notebook2.jpg" alt="Equipos">
            </div>
            <h3>Equipos</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente beatae dolorem, magnam quia odio! Error.</p>
          </article>
          <article class="producto">
            <div class= img>
              <img src="img/acces.jpg" alt="Accesorios">
            </div>
            <h3>Accesorios</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente beatae dolorem, magnam quia odio! Error.</p>
          </article>
          <article class="producto">
            <div class= img>
              <img src="img/repuestos.png" alt="Repuestos">
            </div>
            <h3>Repuestos</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente beatae dolorem, magnam quia odio! Error.</p>
          </article>
        </div>
      </section>
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
