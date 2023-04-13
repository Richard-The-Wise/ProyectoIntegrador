<?php
session_start();
include 'conexion.php';

?>
<!DOCTYPE html>
<html>

<head>
	<title>Venta de boletos</title>
	<style>
		<?php require_once('estilos.css') ?>
	</style>
</head>

<body>
	<?php require_once 'header.php' ?>
	<main>
		<h2>Mis boletos comprados</h2>
		<table class="table">
			<thead>
				<tr>
					<th>N° Serie</th>
					<th>Concierto</th>
					<th>Fecha</th>
					<th>Área</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM boletos_view WHERE idUsuario={$_SESSION['userId']}";
				$result = mysqli_query($conn, $sql);
				while ($boletos = $result->fetch_assoc()) {
					?>
					<tr>
						<td>
							<?= $boletos['numero_serie'] ?>
						</td>
						<td>
							<?= $boletos['nombre_concierto'] ?>
						</td>
						<td>
							<?= $boletos['fecha'] ?>
						</td>
						<td>
							<?= $boletos['area'] ?>
						</td>
						<form action="imprimirBoleto.php" method="post" target="_blank">
							<td>
								<input type="text" name="n_serie" hidden value="<?= $boletos['numero_serie'] ?>">
								<button type="submit">Generar PDF</button>
							</td>
						</form>
						
					</tr>
					<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th>N° Serie</th>
					<th>Concierto</th>
					<th>Fecha</th>
					<th>Área</th>
					<th>Opciones</th>
				</tr>
			</tfoot>
		</table>
	</main>
	<footer>
		<p>Derechos reservados 2023 - Venta de boletos</p>
	</footer>
</body>

</html>