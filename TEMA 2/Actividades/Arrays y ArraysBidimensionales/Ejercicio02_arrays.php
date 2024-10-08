<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>
<body>
    
    <?php

        $dinero = [257];
        $billetes = [
            $B100 => 0,
            $B50 => 0,
            $B20 => 0,
            $B10 => 0,
            $B5 => 0,
            $M2 => 0,
            $M1 => 0
        ];

        do {
            if ($dinero >= 100) {
                $dinero[] - 100;
                $billetes[B100]++;
            }
        } while ($dinero[] = 0);
        print_r("Para la cantidad de 257€ se emitiran: " . $dinero);
    ?>

</body>
</html>
