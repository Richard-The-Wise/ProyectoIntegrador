<?php

include 'conexion.php';

if (isset($_POST['registrar'])) {
	$user = $_POST['user'];
	$name = $_POST['name'];
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	$sql = "CALL sp_RegistrarUsuario('$user','$name','$mail','$pass')";
	
	try {
		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Usuario Agregado');'</script>";
		}
	} catch (Exception $e) {
		
		echo "<div style='background-color:white'><strong>Error: Usuario ya tomado</strong></div>";
		
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="estilo_sesion.css">
	<title>Login</title>
</head>

<body>
	<form method="POST" action="index_view.php">
		<div class="login">
			<div class="login-screen">
				<div class="app-title">
					<h1>Login</h1>
				</div>

				<div class="form-floating mb-3">
					<div class="control-group">
						<input type="text" class="login-field" value="<?= (isset($user)) ? $user : ""; ?>"
							placeholder="Usuario" id="login-name" name="user">
						<label class="login-field-icon fui-user" for="floatingInput"></label>
						<div class="control-group">

						</div>

						<div class="control-group">
							<input type="password" class="login-field" value="" placeholder="Contraseña" id="login-pass"
								name="pass">
							<label class="login-field-icon fui-lock" for="login-pass"></label>
						</div>

						<input type="submit" class="btn btn-primary btn-large btn-block" value="Iniciar"
							name="login"></input>
						<a class="login-link" href="registro.php">Registrarse</a>
						<a class="login-link" href="index.php">Regresar</a>
					</div>
				</div>
			</div>
	</form>
</body>

</html>