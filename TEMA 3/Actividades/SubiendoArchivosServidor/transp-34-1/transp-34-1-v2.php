<!-- En esta versión mantendré la persistencia del desplegable -->

<!-- CONTROL -->
<?php
$mensaje = "";
// Validaciones
if (isset($_POST['subir']) && isset($_POST['tipo'])) { // Se hizo submit
    if (is_uploaded_file($_FILES['archivo']['tmp_name'])) { // Se asubió un fichero
        $nombre = $_FILES["archivo"]["name"];
        $destino = "./" . $_POST['tipo'] . "/$nombre";
        move_uploaded_file($_FILES['archivo']['tmp_name'],$destino);
        $mensaje = $_POST['tipo'] . " subido con éxito";
    } // Si no se subió un fichero no hace nada y mensaje está en blanco
}

// Persistencia mediante una función:
// Si el valor del option que seleccionó el usuario es igual al parámetro,
// retorno "selected".
// Esta función se utiliza en el value="funcion" en la parte de vista
function valor_tipo($tipo)
{
    $valorTipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";
    if ($tipo === $valorTipo) {
        return 'selected';
    } else {
        return '';
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivos</title>
    <link rel="stylesheet" href="transp-34-1.css">
</head>

<body>
    <h2>Imágenes vegetales</h2>
    <h3>Sube aquí tus imágenes vegetales</h3>
    <form class="celeste" method="post" enctype="multipart/form-data"
            action="<?= $_SERVER['PHP_SELF'];?>">
        <p>
            <label for="tipo">Tipo de vegetal en tu imagen</label>
            <select class="separado" id="tipo" name="tipo">
                <!-- valor_tipo será "selected" para la persistencia, o "" si no -->
                <option value="flor" <?= valor_tipo('flor'); ?>>Flor</option>
                <option value="arbol" <?= valor_tipo('arbol'); ?>>Árbol</option>
                <option value="arbusto" <?= valor_tipo('arbusto'); ?>>Arbusto</option>
            </select>
        </p>
        <p>
            <input id="archivo" name="archivo" type="file">
        </p>
        <p>
            <input type="submit" value="Subir Imagen" name="subir">
        </p>
    </form>
    <h2 class="verde"><?= htmlentities($mensaje) ?></h2>
</body>

</html>