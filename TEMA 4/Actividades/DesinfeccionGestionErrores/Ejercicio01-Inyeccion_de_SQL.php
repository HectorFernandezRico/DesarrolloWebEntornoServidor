<?php
    session_start();
    require_once("pdo.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inyección de SQL</title>
</head>
<body>
    <h1>Prueba de Login</h1>
    <form method="post">
        <p>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email">
        </p>
        <p>
            <label for="password">Password: </label>
            <input type="text" name="password" id="password">
        </p>
        <p>
            <input type="submit" name="submit" value="Entra">
        </p>
    </form>
</body>
</html>