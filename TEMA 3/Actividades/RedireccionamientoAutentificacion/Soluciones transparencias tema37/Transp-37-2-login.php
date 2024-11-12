<?php
  session_start(); // Siempre !!
  // Si hicieron submit al formulario de login
  if ( isset($_POST["usuario"]) && isset($_POST["password"])) {
    unset($_SESSION["usuario"]); // Cierro la sesión anterior
    // Valido la información
    if (empty($_POST["usuario"])) {
      $_SESSION["mensaje"] = "Debes indicar un usuario";
      header("Location: Transp-37-2-login.php");
      return;
    } else if ($_POST["password"]=="1234") {
      $_SESSION["usuario"] = $_POST["usuario"];
      $_SESSION["mensaje"] = "Bienvenido a nuestra aplicación!!";
      header("Location: Transp-37-2-app.php");
      return;
    } else {
      $_SESSION["mensaje"] = "Password incorrecta";
      header("Location: Transp-37-2-login.php");
      return;
    }
  }
?>

<!-- VISTA -->
<?php
  $mensaje = isset($_SESSION["mensaje"]) ? $_SESSION["mensaje"] : "";
  unset($_SESSION["mensaje"]); // Lo elimino para el flash
?>
<!DOCTYPE html>
<html>
  <head>
    <title>LOGIN</title>
  </head>
  <body>
    <h1>Haz login</h1>
    <p style="color: purple"><?=$mensaje?></p>
    <form method="post">
      <p>
        <label for="usuario">Usuario: </label>
        <input type="text" id="usuario" name="usuario"/>
      </p>
      <p>
        <label for="password">Password</label>
        <input type="password" id="password" name="password"/>
      </p>
      <p>
        <input type="submit" value="Log in"/>
      </p>
    </form>
  </body>
</html>