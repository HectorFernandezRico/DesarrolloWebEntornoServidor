<?php
    session_start();
    unset($_SESSION['usuario']);
    header(header: 'Location: tej2-aplicacion.php');
?>