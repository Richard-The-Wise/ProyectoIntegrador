<?php
session_start();
include 'conexion.php';

if (isset($_POST['comprar'])) {
    $cantidad = $_POST['cantidad'];
    $boleto_categoria = $_SESSION['idCategoria'];
    $total = $_POST['total'];
    $cliente_id = $_SESSION['userId'];

    $conn->begin_transaction();
    $conn->autocommit(false);
    
    try {
        for ($i = 0; $i < $cantidad; $i++) {
            $sql1 = "INSERT INTO boleto VALUES(NULL, $cliente_id,{$_GET['id']},$boleto_categoria, current_date())";
            if (!$result = mysqli_query($conn, $sql1)) {
                echo $conn->error;
            }
        }

        /* If code reaches this point without errors then commit the data in the database */
        $conn->commit();
    } catch (mysqli_sql_exception $exception) {
        $conn->rollback();

        throw $exception;
    }

    $sql = "INSERT INTO cliente_orden VALUES(NULL, $cliente_id,  current_date(), CURTIME(), $total)";
    if (!$result = mysqli_query($conn, $sql)) {
        echo $conn->error;
    }



}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php require_once('css/estilos.css') ?>
    </style>
    <title>Checkout</title>
</head>

<body>
    <header>
        <?php require_once 'header.php' ?>
    </header>
    <div>
        <h2>
            ¡Gracias por tu compra!
        </h2>
        <h4>Ve a la sección "Mis boletos" dando clic en tu usuario para ver más detalles de tus boletos comprados</h4>
    </div>

</body>

</html>