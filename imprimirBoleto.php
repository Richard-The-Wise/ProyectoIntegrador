<?php
include 'conexion.php';

if (isset($_POST['n_serie'])) {
    $noSerie = $_POST['n_serie'];
    // Agrega aqui la consulta SQL obteniendo los datos del boleto con el numero de serie $noSerie
    $sql1 = "SELECT * FROM boletos_view WHERE numero_serie={$noSerie}";
    $result1 = mysqli_query($conn, $sql1);
}
?>

<!-- Este HTML es el que va a generar el boleto. Dale estilo y agrega aqui la librería DOM PDF -->

<?php
//ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleto</title>
</head>

<body>
    <style>
        <?php require_once('css/estilo_boleto.css') ?>
    </style>
    <main id="boleto">
        <h1>Tu boleto</h1>
        <ul>
            <?php
            $result = $conn->query("SELECT * FROM boletos_view where numero_serie = {$noSerie}");
            while ($infoEvento = $result->fetch_assoc()) {
                ?>
                <li>
                    <h3>
                        No. Serie: <?= $infoEvento['numero_serie'] ?>
                    </h3>
                    <h2>
                        Concierto: <?= $infoEvento['nombre_concierto'] ?>
                    </h2>
                    <h2>
                        Area: <?= $infoEvento['area'] ?>
                    </h2>
                    <h3>
                        Fecha: <?= $infoEvento['fecha'] ?>
                    </h3>
                </li>
                <?php
            }
            ?>
            <img src="http://<?=$_SERVER['HTTP_HOST'];?>/proyectoIntegrador/img/qr.png" style="width: 200px;">    
        </ul>
    </main>
</body>

</html>
<?php
$html=ob_get_clean();
//echo $html;
require_once 'libreriaDom/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4');
$dompdf->render();
$dompdf->stream('tu_boleto.pdf',array("Attachment" => false));
$output = $dompdf->output();
file_put_contents('tu_boleto.pdf', $output);
exit();
?>