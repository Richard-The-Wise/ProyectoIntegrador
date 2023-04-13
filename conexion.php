<?php
$servername = "localhost";
$database = "boletera_conciertos";
$username = "root";
$password = "";

// Crear conexión

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {
    die("Conexión fallida " . mysqli_connect_error());
}
function console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('$output');</script>";
}

console("Connection Established");


?>
