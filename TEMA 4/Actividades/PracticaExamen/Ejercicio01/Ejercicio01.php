<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Exámenes</title>
    
</head>
<body>
    <div class="container">
        <h1>Resultados de Exámenes</h1>
        <table>
            <tr>
                <th>Prueba</th>
                <th>Fecha de la Prueba</th>
                <th>Evaluación</th>
                <th>Nota</th>
            </tr>
            <?php
          

            abstract class Prueba {
                protected $nombrePrueba;
                protected $fechaPrueba;

                public function __construct($nombrePrueba, $fechaPrueba) {
                    $this->nombrePrueba = $nombrePrueba;
                    $this->fechaPrueba = $fechaPrueba;
                }

                abstract public function evaluar($nota);
                abstract public function mostrarDatos();
            }

            class Examen extends Prueba {
                public static $nAprobados = 0;
                private $nota;
                private $evaluacion;

                public function __construct($nombrePrueba, $fechaPrueba, $evaluacion) {
                    parent::__construct($nombrePrueba, $fechaPrueba);
                    $this->evaluacion = $evaluacion;
                }

                public function evaluar($nota) {
                    $this->nota = $nota;
                    if ($nota >= 5) {
                        self::$nAprobados++;
                    }
                }

                public function mostrarDatos() {
                    echo "<tr>";
                    echo "<td>" . $this->nombrePrueba . "</td>";
                    echo "<td>" . $this->fechaPrueba . "</td>";
                    echo "<td>" . $this->evaluacion . "</td>";
                    echo "<td>" . $this->nota . "</td>";
                    echo "</tr>";
                }

                public static function getNAprobados() {
                    return self::$nAprobados;
                }
            }

            // Crear un array de 15 exámenes
            $examenes = [];
            for ($i = 0; $i < 15; $i++) {
                $nombrePrueba = "Examen " . ($i + 1);
                $fechaPrueba = str_pad(($i + 1), 2, '0', STR_PAD_LEFT) . "/11/2024";
                $evaluacion = "Primera";
                $examenes[$i] = new Examen($nombrePrueba, $fechaPrueba, $evaluacion);
            }

            // Calificar cada examen con una nota aleatoria entre 1 y 10
            foreach ($examenes as $examen) {
                $nota = rand(1, 10);
                $examen->evaluar($nota);
            }

            // Mostrar la información de cada examen en la tabla
            foreach ($examenes as $examen) {
                $examen->mostrarDatos();
            }
            ?>
        </table>
        <p>Hasta el momento han aprobado: <?php echo Examen::getNAprobados(); ?> alumnos</p>
    </div>
</body>
</html>
