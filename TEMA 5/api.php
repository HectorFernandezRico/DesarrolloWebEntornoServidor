<?php
    $resultado = file_get_contents("https://api.chucknorris.io/jokes/random");
    echo "<pre>";
    print_r(json_decode($resultado));
    echo "</pre>";