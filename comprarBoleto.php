<?php
session_start();
include 'conexion.php';
$_SESSION['idCategoria'] = isset($_POST['idCategoria']) ? $_POST['idCategoria'] : "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    <?php require_once('estilos.css') ?>
  </style>
  <title>Document</title>
</head>

<body>
  <header>
    <?php require_once 'header.php' ?>
  </header>
  <section id="compra" class="container my-5">
    <h2 class="text-center mb-5">Compra de boletos</h2>
    <?php
    // Contar el número de lugares disponibles
    $sql2 = "CALL sp_ContarLugares({$_SESSION['idCategoria']})";
    $result = mysqli_query($conn, $sql2);
    $nDisponible = $result->fetch_assoc();

   
    ?>
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <form action="ordenBoleto.php?id=<?= $_GET['id'] ?>" method="post">
          <div class="form-group"><?="Lugares Disponibles: " . $nDisponible['nDisponible'];?></div>
          <div class="form-group">
            <label for="inputNumero">Número Tarjeta</label>
            <input type="text" id="inputNumero" class="form-control" maxlength="16" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="inputNombre">Nombre</label>
            <input type="text" id="inputNombre" class="form-control" maxlength="19" autocomplete="off" required>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="selectMes">Expiracion (Mes)</label>
              <select name="mes" id="selectMes" class="form-control" required>
                <option disabled selected value=''>Mes</option>
                <option value='1'>01</option>
                <option value='2'>02</option>
                <option value='3'>03</option>
                <option value='4'>04</option>
                <option value='5'>05</option>
                <option value='6'>06</option>
                <option value='7'>07</option>
                <option value='8'>08</option>
                <option value='9'>09</option>
                <option value='10'>10</option>
                <option value='11'>11</option>
                <option value='12'>12</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="selectYear">Expiracion (Año)</label>
              <select name="year" id="selectYear" class="form-control" required>
                <option disabled selected value=''>Año</option>
                <option value='2023'>2023</option>
                <option value='2024'>2024</option>
                <option value='2025'>2025</option>
                <option value='2026'>2026</option>
                <option value='2027'>2027</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputCCV">CCV</label>
            <input type="text" id="inputCVV" class="form-control" maxlength="3" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="nombre">Nombre completo</label>
            <input type="text" id="nombre" class="form-control" name="nombre" value="<?= $_SESSION['nombre']; ?>" required>
          </div>
          <div class="form-group">
            <label for="correo">Correo electrónico</label>
            <input type="email" id="correo" class="form-control" name="correo" value="<?= $_SESSION['email']; ?>" required>
          </div>
          <div class="form-group">
            <label for="cantidad">Selecciona los boletos</label>
            <select name="cantidad" class="form-control" id="cantidad" required>
              <option value="" disabled selected>Cantidad</option>
              <?php
              for ($i = 1; $i <= ($nDisponible['nDisponible'] >= 10 ? 10 : $nDisponible['nDisponible']); $i++) {
                ?>
                <option value="<?= $i ?>"><?= $i ?></option>
                <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="proceder">Proceder</button>
          </div>
        </form>
      </div>
    </div>

  </section>
</body>

</html>