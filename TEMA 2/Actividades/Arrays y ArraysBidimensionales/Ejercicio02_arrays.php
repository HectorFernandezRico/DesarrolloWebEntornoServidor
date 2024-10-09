<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>
<body>
    
    <?php

        $dinero = 257;
        $billetes = [
            "b100" => 0,
            "b50" => 0,
            "b20" => 0,
            "b10" => 0,
            "b5" => 0,
            "m2" => 0,
            "m1" => 0
        ];

        do {            
            if ($dinero >= 100) {
                $dinero -= 100;
                $billetes["b100"]++;
            } else if ($dinero >= 50) {
                $dinero -= 50;
                $billetes["b50"]++;
            } else if ($dinero >= 20) {
                $dinero -= 20;
                $billetes["b20"]++;
            }else if ($dinero >= 10) {
                $dinero -= 10;
                $billetes["b10"]++;
            } else if ($dinero >= 50) {
                $dinero -= 5;
                $billetes["b5"]++;
            } else if ($dinero >= 2) {
                $dinero -= 2;
                $billetes["m2"]++;
            } else if ($dinero >= 1) {
                $dinero -= 1;
                $billetes["m1"]++;
            }
        } while ($dinero != 0);
        
        echo "Para la cantidad de 257€ se emitiran: \n ";

        foreach ($billetes as $tipo => $cantidad) {
            echo " " . $cantidad. $tipo;
        }
    ?>

</body>
</html>
