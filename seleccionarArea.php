<?php
session_start();
include 'conexion.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="estilo_seleccionarea.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    <?php require_once('css/estilos.css') ?>
  </style>
  <title>Selecciona Área</title>
</head>

<body>
  <?php require_once('header.php') ?>
  <section id="compra">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center mb-4">
        <h2>Selecciona un Área</h2>
      </div>
      <?php
        $sql = "SELECT * FROM boleto_categoria WHERE concierto_id = {$_GET['id']}";
        $result = mysqli_query($conn, $sql);

        while ($categorias = $result->fetch_assoc()) {
      ?>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <h3 class="card-title"><?= $categorias['area'] ?></h3>
            <p class="card-text">$<?= $categorias['precio'] ?></p>
            <form action=<?= isset($_SESSION['user']) ? "comprarBoleto.php?id=" . $_GET['id'] : "login.php" ?> method="post">
              <input type="hidden" name="idCategoria" value="<?= $categorias['id'] ?>">
              <button class="btn btn-primary" type="submit">Seleccionar</button>
            </form>
          </div>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
    <div class="contenedor-flexbox">
      <div style="display:inline-block; text-align:center;">


      </div>
    </div>
    <div style="width:100%; text-align:center;">
      <img width=25% src="img/establecimiento.png">
    </div>
  </div>
</section>
</body>

</html>