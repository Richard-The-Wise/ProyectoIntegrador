<?php session_start() ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contacto</title>
  <link rel="stylesheet" href="estilo_contacto.css" />
  <style>
    <?php require_once('css/estilos.css') ?>
  </style>
</head>

<body>
  <?php require_once 'header.php' ?>
  <main>
    <h1>¡Contáctanos!</h1>
    <h2>Información de contacto</h2>
    <ul>
      <li>
        <strong>Dirección:</strong> Av. Insurgentes Sur 123, Col. Condesa, CDMX.
      </li>
      <li>
        <strong>Teléfono:</strong> (55) 1234-5678
      </li>
      <li>
        <strong>Email:</strong> ventas@boletos.com.mx
      </li>
    </ul>
  </main>
  <footer>
    <p>© 2023 Venta de Boletos S.A. de C.V.</p>
  </footer>
</body>

</html>