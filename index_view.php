<?php
session_start();
include 'conexion.php';

// Al momento de intentar un login te dirige al index o muestra error
if (isset($_POST['login'])) {

	$user = $_POST['user'];
	$pass = hash('sha256', $_POST['pass']);
	$sql = "SELECT * FROM cliente WHERE username = '$user' AND contraseña ='$pass'";

	$query = mysqli_query($conn, $sql);
	$result = $query->fetch_assoc();
	$nr = mysqli_num_rows($query);
	if ($nr == 1) {
		echo "<script>alert('Bienvenido $user');'</script>";
	} else {
		echo "<script>alert('Usuario o contraseña incorrecta');window.location='login.php'</script>";
	}


	$_SESSION['user'] = $user;
	$_SESSION['email'] = $result['email'];
	$_SESSION['nombre'] = $result['nombre_cliente'];
	$_SESSION['userId'] = $result['id'];

} // Al momento de hacer clic en cerrar sesión destruye la sesión actual

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

if(isset($_GET['cancel'])){
	$conn->rollback();
}

// (session_status()==1)?session_start():"";
?>
<!DOCTYPE html>
<html>

<head>
	<title>Venta de boletos</title>
	<style>
		<?php require_once('estilos.css')?>
	</style>
</head>

<body>
	<?php require_once 'header.php' ?>
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