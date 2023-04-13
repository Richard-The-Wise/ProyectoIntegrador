<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo_sesion.css">
  <title>Registro</title>
</head>

<body>

  <form method="POST" action="login.php">


    <div class="login">
      <div class="login-screen">
        <div class="app-title">
          <h1>Registro</h1>
        </div>

        <div class="form-floating mb-3">
          <div class="control-group">
            <input type="text" class="login-field" value="" placeholder="Usuario" id="login-name" name="user" required>
            <label class="login-field-icon fui-user" for="floatingInput"></label>
            <div class="control-group">

            </div>

            <div class="control-group">
              <input type="text" class="login-field" value="" placeholder="Nombre" id="login-name" name="name" required>
              <label class="login-field-icon fui-user" for=""></label>
            </div>

            <div class="control-group">
              <input type="email" class="login-field" value="" placeholder="Correo" id="login-correo" name="mail" required>
              <label class="login-field-icon fui-user" for="floatingInput"></label>
              <div class="control-group">
              </div>

              <div class="control-group">
                <input type="password" class="login-field" value="" placeholder="Contraseña" id="login-pass" name="pass" required>
                <label class="login-field-icon fui-lock" for="login-pass"></label>
                <div class="control-group">
                  <input type="submit" class="btn btn-primary btn-large btn-block" value="Registrar" name="registrar"></input>
                </div>
              </div>
            </div>
  </form>
</body>

</html>