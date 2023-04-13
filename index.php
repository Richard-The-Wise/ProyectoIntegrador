<?php
// Al momento de hacer clic en cerrar sesión destruye la sesión actual
if (isset($_GET['logout'])) {
	Logout();
}

function Logout()
{

	unset($_SESSION['user']); // unset and session data
	session_destroy(); // destroy the session
	session_start();
	$_SESSION['user'] = null;
	
	header("Location: index.php");
	exit;
}
include 'conexion.php';

?>
<!DOCTYPE html>
<html>

<head>
	<title>Venta de boletos</title>
	<style>
		<?php require_once('css/estilos.css') ?>
	</style>
	<link rel="stylesheet" href="header_estilo.css">
</head>

<body>
	<header>
		<h1><a style="text-decoration: none; color:white;" href="#">Boletera Integra</a></h1>
		<nav>
			<ul>
				<li><a href="#">Inicio</a></li>
				<li><a href='login.php'>Iniciar Sesión</a></li>
				<li><a href="contacto.php">Contacto</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<h2>Próximos eventos</h2>
		<ul>
			<?php
			$result = $conn->query("SELECT * FROM concierto_view");
			while ($imgData = $result->fetch_assoc()) {
				?>
				<li>
					<td><img width="50%" src="data:image/jpeg;base64,<?php echo base64_encode($imgData['portada']); ?>">
					</td>
					<h3>
						<?= $imgData['nombre_concierto'] ?>
					</h3>
					<p>
						<?= $imgData['fecha'] ?>
					</p>
					<p>Ubicación:
						<?= $imgData['nombre_establecimiento'] . " - " . $imgData['ubicacion'] ?>
					</p>
					<button><a style="color:white" href="seleccionarArea.php?id=<?= $imgData['id'] ?>">Comprar boletos</a></button>
				</li>

				<?php
			}
			?>
		</ul>
	</main>
	<footer>
		<p>Derechos reservados 2023 - Venta de boletos</p>
	</footer>
</body>

</html>