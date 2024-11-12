<?php
    session_start();
    unset($_SESSION['usuario']);
    header('Location: tej2-aplicacion.php');
?>