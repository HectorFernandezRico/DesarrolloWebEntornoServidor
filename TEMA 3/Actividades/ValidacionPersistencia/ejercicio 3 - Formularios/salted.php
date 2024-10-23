<!-- CONTROL: Funciones y validaciones. NO hace echos!!  -->
<?php
// APARTADO DE FUNCIONES
    // VERSION 1 de passOK: Utilizando expresiones regulares con grupos
    // Página para probar tus expresiones regulares: https://regexr.com/
    // Nota: El segundo if se asegura que no haya ningún otro caracter distinto
    // de los indicados
    function passOK($password) {
        if (preg_match("/(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-_.])[A-Za-z\d\-_\.]{8,}/"
            ,$password) === 0) {
                return false;
        } else if (preg_match("/[^A-Za-z\d\-\_\.]+/",$password)!== 0) { // Opcional: Que no tenga nada distinto de lo indicado
            return false;
        } else {
          return true;
        }
    }
    // VERSION 2 de passOK: utilizando validación condición a condición
    // NOTA: El último if se asegura de que no haya ningún otro caracter
    // distinto de los indicados
    function passOK2($password) {
      if (strlen($password)<8) { // Si la longitud es menor que 8
        return false;
      } else if (strpbrk($password,"0123456789") === false) { // Si no contiene dígitos
        return false;
      } else if (strpbrk($password,"-_.") === false) { // Si no contiene alguno de los caracteres indicados
        return false;
      } else if (strtoupper($password) === $password) { // NO tiene minúsculas
        return false;
      } else if (strtolower($password) === $password){ // No tiene mayúsculas
        return false;
      } else if (preg_match("/[^A-Za-z\d\-_\.]+/",$password) !== 0) { // Opcional: Que no tenga nada distinto a lo indicado
        return false;
      } else {
        return true;
      }
    }

// APARTADO DE VALIDACIONES
    // Inicializo las variables que se mostrarán en el HTML
    $error = "";
    $mensaje = "";
    if (isset($_POST['password']) && isset ($_POST['sal'])) { // La request POST envía ambos campos
        // Valido con if anidados
        // Utilizo passOK para validar la password (Podría hacer otra función salOK, lo dejo para que practiquéis)
        if (!passOK($_POST['password'])) { // La password no cumple las condiciones
            $error = "La password debe tener al menos 8 caracteres y contener alguna minúscula, alguna mayúscula, algún número, y algún carácter especial entre '_', '-', o '.'";
        }  else if (! is_numeric($_POST['sal'])) { // La sal no es numérica
          $error = "El campo sal debe ser numérico";
        }
        else if ($_POST['sal'] < 10000 or $_POST['sal'] > 99999) { // La sal no tiene 5 dígitos
          $error = "La sal debe ser un número de 5 dígitos";
        } else {
          // Si llega aquí, toda la información es correcta
          // Obtenemos el hash sha256 de la password salada
          $hash = hash('sha256', $_POST['sal'] . $_POST['password']);
          $mensaje = "El sha256 de la password " . $_POST['password']
                    . " salada con " . $_POST["sal"] . " es: " . $hash;
        }
    }
    $sal_value = isset($_POST['sal']) ? $_POST['sal'] : rand(10000,99999);
    $password_value = isset($_POST['password']) ? $_POST['password'] : "";
?>

<!-- VISTA: Sólo HTML y el echo de dos variables gestionadas en la parte de control -->
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prueba de formulario</title>
    <style>
      .rojo {
        color: red;
        font-size: smaller;
      }
      .verde {
        color: green;
        font-size: larger;
      }
    </style>
  </head>
  <body>
    <h2>Prueba de formularios</h2>
     <!-- En este ejemplo, utilizo dos variables y el CSS es fijo para cada una -->
    <p class="rojo"><?=$error?></p>
    <p class="verde"><?=$mensaje?></p>
    <form method="post">
      <p>
        <label for="password">Password </label>
        <input id="password" name="password" value="<?=htmlentities($password_value);?>"/>
      </p>
      <p>
        <label for="sal">Sal </label>
        <input id="sal" name="sal" value="<?=htmlentities($sal_value);?>"/>
      </p>
      <p>
        <input type="submit" value="Enviar">
      </p>
    </form>
  </body>
</html>
