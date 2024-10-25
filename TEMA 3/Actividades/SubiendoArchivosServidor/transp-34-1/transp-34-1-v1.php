<!-- ESTO PODRÍA LLEVARSE A UN cabecera.php con título variable-->
<html>
<head>
  <title>Archivos</title>
  <style>
    fieldset {
      background-color:azure;
      padding: 10px;
      border: 2px solid grey;
      margin: 10px;
      width: 400px;
      line-height: 4;
    }
    p.mensaje {
      color: darkcyan;
      font-weight: bold;
      font-size: 2em;
    }
  </style>
</head>
<body>
<h1>Imágenes vegetales</h1>
<h3>Sube aquí tus imágenes vegetales</h3>

<!-- PARTE DE CONTROL DE ENTRADA. AQUÍ NO HACEMOS ECHOS NI ESCRIBIMOS !! -->
<?php
$mensaje="";
  if ( isset($_POST["tipo"])) { // Se hizo submit
    if (!empty($_FILES["archivo"]["name"]) ) { // Se adjuntó un fichero
          if (is_uploaded_file($_FILES["archivo"]["tmp_name"])) { // El fichero pudo subir
            $nombre = $_FILES["archivo"]["name"];
            $tipo = $_POST["tipo"];
            move_uploaded_file($_FILES["archivo"]["tmp_name"],
                          "./$tipo/$nombre");
            $mensaje = "$tipo subido con éxito";
          }
    }
    else { // No se adjuntó un fichero, lo indicamos mediante un mensaje
        $mensaje = "No has seleccionado ningún archivo";
    }
  }
?>

<!-- PARTE DE VISTA: AQUÍ ES DONDE ESCRIBIMOS LA SALIDA !! -->
  <form method="post" enctype="multipart/form-data"
        action="<?php echo $_SERVER['PHP_SELF'];?>">
    <fieldset>
    <label for="tipo">Tipo de vegetal en tu imagen</label>
      <select name="tipo" id="tipo">
        <option value="flor">Flor</option>
        <option value="arbol">Árbol</option>
        <option value="arbusto">Arbusto</option>
      </select>
    <br>
      <input name="archivo" id="archivo" type="file"/>
    <br><br>
      <input type="submit" value="Subir Imagen" name="subir"/>
    </fieldset>
  </form>
  <p class="mensaje"><?=htmlentities($mensaje)?></p>
  <pre>
  <?php
  /*
    // Este código es sólo para depuración !!!
    echo "\$_FILES: "; 
    print_r($_FILES);
    echo "\$_POST: ";
    print_r($_POST);
    echo $_SERVER['PHP_SELF'];
  */
  ?>
</pre>
</body>
</html>