<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arte y password</title>
</head>

<body>
    <h1>Alex Gonzaga</h1>
    <p>
        <?php
        echo 'El hash tipo "sha256" de "Alex Gonzaga" es ';
        echo hash('sha256', 'Alex Gonzaga');

        ?>
    </p>
    <h2>Arte ASCII</h2>
    <pre>
          a
         a a
        a   a
       a     a
      aaaaaaaaa
     a         a
    a           a
    </pre>
</body>

</html>