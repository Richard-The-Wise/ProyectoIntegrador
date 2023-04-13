<?php
session_start();
include 'conexion.php';

if (isset($_POST['proceder'])) {
    $boleto_categoria = $_SESSION['idCategoria'];
    $cliente_id = $_SESSION['userId'];
    $cantidad = $_POST['cantidad'];
    $sql = "SELECT * FROM boleto_categoria WHERE id={$_SESSION['idCategoria']}";
    

    if ($result = mysqli_query($conn, $sql)) {
        $categorias = $result->fetch_assoc();
        $precio = $categorias['precio'];
    } else {
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
    <title>Orden de compra</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <header>
        <?php require_once 'header.php' ?>
    </header>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Orden de compra</h2>
                <form action="checkOut.php?id=<?= $_GET['id'] ?>" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre completo</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" readonly
                            value="<?= $_SESSION['nombre']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electrónico</label>
                        <input type="email" id="correo" name="correo" class="form-control" readonly
                            value="<?= $_SESSION['email']; ?>" required>
                    </div>
                    <?php
                    $sql = "SELECT * FROM concierto_view WHERE id = {$_GET['id']}";
                    $result = mysqli_query($conn, $sql);
                    $datosConcierto = $result->fetch_assoc();
                    ?>
                    <div class="form-group">
                        <label for="cantidad">Cantidad de boletos</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control" value="<?= $cantidad ?>"
                            required readonly>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoría</label>
                        <input type="text" name="categoria" id="categoria" class="form-control"
                            value="<?= $categorias['area'] ?>" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="concierto">Concierto</label>
                        <input type="text" name="concierto" id="concierto" class="form-control"
                            value="<?= $datosConcierto['nombre_concierto'] ?>" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="text" name="fecha" id="fecha" class="form-control"
                            value="<?= $datosConcierto['fecha'] ?>" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="text" name="total" id="total" class="form-control"
                            value="<?= $cantidad * $precio ?>" required readonly>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="comprar" class="btn btn-success btn-block">Proceder al
                            pago</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>