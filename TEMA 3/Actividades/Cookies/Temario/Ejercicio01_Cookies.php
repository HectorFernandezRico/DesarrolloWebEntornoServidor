<?php
    if (!isset($_COOKIE['Hector'])) {
        setcookie('hector','mayo', time() +3600*3);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cookie</title>
    <style>
        body{
            text-align: center;
        }
        table {
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <h1>Cookies</h1>
    <table>
        <th>
            <?php 
                print_r($_COOKIE);
            ?>
        </th>
    </table>
</body>
</html>