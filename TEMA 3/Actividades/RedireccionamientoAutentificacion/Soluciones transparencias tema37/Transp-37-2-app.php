<?php
  session_start(); // Siempre !!
  // Compruebo que estoy logada
  $usuario="";
  if ( isset($_SESSION["usuario"]) ) {
    $usuario = "Usuario: " . $_SESSION["usuario"];
    $mensaje = isset($_SESSION["mensaje"]) ? $_SESSION["mensaje"] : "";
    unset($_SESSION["mensaje"]);
  } else {
    $mensaje = "Haga login para iniciar sesión";
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>APLICACION</title>
  </head>
  <body>
    <h1>Aplicación</h1>
    <p style="color:darkgrey"><?=$usuario?></p>
    <p style="color: purple"><?=$mensaje?></p>
      <p>
        <a href="Transp-37-2-login.php">Login</a>
      </p>
      <p>
        <a href="Transp-37-2-logout.php">Logout</a>
      </p>
  </body>
</html>