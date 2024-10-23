/*TRABAJANDO CON FORMULARIOS*/
<h1>Contenido del array $_GET</h1>
<pre>
    <?php
        print_r($_GET);
    ?>
</pre>

/*FORMULARIOS HTML: SUBMIT*/
<html>
    <head>
        <title>Ejemplo de Formulario</title>
    </head>
    <body>
        <p>Adivina un número del 1 al 10</p>
        <form>
            <p>
                <label for="prueba">Prueba</label>
                <input type="text" name="prueba" id="prueba"/>
            </p>
            <input type="submit"/>
        </form>
    </body>
</html>