<?php
// Iniciamos la sesión
session_start();

// Inicializamos las variables
$nombres = "";
$nombre = "";
$mensaje = "";
$color = "";

// Verificamos si existen las variables de sesión, si no existen las inicializamos
if (!isset($_SESSION['mensaje'])) {
    $_SESSION['mensaje'] = "";
}

if (!isset($_SESSION['nombre'])) {
    $_SESSION['nombre'] = "";
}

if (!isset($_SESSION['nombres'])) {
    $_SESSION['nombres'] = "";
}

if (!isset($_SESSION['color'])) {
    $_SESSION['color'] = "";
}

// Procesamos el formulario cuando se envía
if (isset($_POST['enviar']) && isset($_POST['nombre'])) {
    // Guardamos el nombre en la sesión
    $_SESSION['nombre'] = $_POST['nombre'];
    // Establecemos el color del mensaje como rojo (indicando un error)
    $_SESSION['color'] = "red";
    
    // Validamos el campo nombre
    if (empty($_POST['nombre'])) {
        $_SESSION['mensaje'] = "Debe indicar un nombre";
    } else if (strlen($_POST['nombre']) > 10) {
        $_SESSION['mensaje'] = "No tiene que ser mayor de 10 carácteres";
    } else if (is_numeric($_POST['nombre'])) {
        $_SESSION['mensaje'] = "No debe ser un número";
    } else {
        // Si el nombre es válido, lo limpiamos de la sesión y actualizamos los mensajes y colores
        $_SESSION['nombre'] = "";
        $_SESSION['color'] = "green";
        $_SESSION['mensaje'] = "Nombre anotado con éxito";
        // Agregamos el nombre a la lista de nombres
        $_SESSION['nombres'] .= "<p>" . $_POST['nombre'] . "</p>";
    }
    // Redireccionamos a la misma página para evitar reenvío de formularios
    header("Location: " . $_SERVER['PHP_SELF']);
    return;
}

// Procesamos la solicitud de borrar nombres
if (isset($_POST['borrar'])) {
    // Eliminamos la lista de nombres de la sesión
    unset($_SESSION['nombres']);
    // Establecemos el color del mensaje como verde (indicando éxito)
    $_SESSION['color'] = "green";
    $_SESSION['mensaje'] = "Se han eliminado todos los nombres de la lista";
    // Redireccionamos a la misma página para evitar reenvío de formularios
    header("Location: " . $_SERVER['PHP_SELF']);
    return;
}

// Asignamos los valores de las variables de sesión a las variables locales y luego las eliminamos
$mensaje = $_SESSION['mensaje'] ?? "";
unset($_SESSION['mensaje']);

$nombre = $_SESSION['nombre'] ?? "";
unset($_SESSION['nombre']);

$nombres = $_SESSION['nombres'] ?? "";

$color = $_SESSION['color'] ?? "";
unset($_SESSION['color']);

// Creamos un array para almacenar 10 animales
$animales = [];
for ($i = 0; $i < 10; $i++) {
    // Generamos un número aleatorio para decidir el tipo de animal
    $aleatorio = rand(1, 3);
    $animales[] = match ($aleatorio) {
        1 => new Perro(rand(50, 150)), // Añadimos un perro al array
        2 => new Gato(rand(50, 150)), // Añadimos un gato al array
        3 => new Pajaro(rand(50, 150)), // Añadimos un pájaro al array
    };
}

// Bucle con 100 repeticiones
for ($i = 0; $i < 100; $i++) {
    // Recorremos el array de animales
    foreach ($animales as $animal) {
        // Generamos un valor aleatorio para la comida entre 1 y 3
        $comida = rand(1, 3);
        // El animal come
        $animal->come($comida);
        // El animal habla
        $animal->habla();
    }
}

// Clase abstracta Animal
abstract class Animal {
    protected $energia; // Atributo protegido para almacenar la energía

    // Constructor para inicializar la energía con un valor predeterminado de 100
    public function __construct($energia = 100) {
        $this->energia = $energia;
    }

    // Métodos abstractos que deben ser implementados por las subclases
    abstract public function habla();
    abstract public function come($comida);
}

// Clase abstracta Ave que hereda de Animal
abstract class Ave extends Animal {
    // Implementación del método habla para las aves
    public function habla() {
        $this->energia -= 4; // Reduce la energía en 4
        if ($this->energia < 0) $this->energia = 0; // Asegura que la energía nunca sea menor que 0
    }
}

// Clase abstracta Mamifero que hereda de Animal
abstract class Mamifero extends Animal {
    // Implementación del método habla para los mamíferos
    public function habla() {
        $this->energia -= 6; // Reduce la energía en 6
        if ($this->energia < 0) $this->energia = 0; // Asegura que la energía nunca sea menor que 0
    }
}

// Clase Pájaro que hereda de Ave
class Pajaro extends Ave {
    // Implementación del método habla para el pájaro
    public function habla() {
        parent::habla(); // Llama al método habla de la clase Ave
        if ($this->energia > 50) {
            echo "PIO PIO\n"; // Mensaje si la energía es mayor de 50
        } elseif ($this->energia >= 20) {
            echo "Pío\n"; // Mensaje si la energía está entre 20 y 50
        } else {
            echo "pi\n"; // Mensaje si la energía es menor de 20
        }
    }

    // Implementación del método come para el pájaro
    public function come($comida) {
        $this->energia += $comida * 2; // Incrementa la energía en el valor de la comida multiplicado por 2
    }
}

// Clase Perro que hereda de Mamifero
class Perro extends Mamifero {
    // Implementación del método habla para el perro
    public function habla() {
        parent::habla(); // Llama al método habla de la clase Mamifero
        if ($this->energia > 50) {
            echo "GUAU GUAU\n"; // Mensaje si la energía es mayor de 50
        } elseif ($this->energia >= 20) {
            echo "Guau\n"; // Mensaje si la energía está entre 20 y 50
        } else {
            echo "gua\n"; // Mensaje si la energía es menor de 20
        }
    }

    // Implementación del método come para el perro
    public function come($comida) {
        $this->energia += $comida * 3; // Incrementa la energía en el valor de la comida multiplicado por 3
    }
}

// Clase Gato que hereda de Mamifero
class Gato extends Mamifero {
    // Implementación del método habla para el gato
    public function habla() {
        parent::habla(); // Llama al método habla de la clase Mamifero
        if ($this->energia > 50) {
            echo "MIAUUU\n"; // Mensaje si la energía es mayor de 50
        } elseif ($this->energia >= 30) {
            echo "Miau\n"; // Mensaje si la energía está entre 30 y 50
        } else {
            echo "mi\n"; // Mensaje si la energía es menor de 30
        }
    }

    // Implementación del método come para el gato
    public function come($comida) {
        $this->energia += $comida * 2; // Incrementa la energía en el valor de la comida multiplicado por 2
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones y Animales</title>
    <style>
        .color {
            color: <?= $color ?>;
        }
    </style>
</head>

<body>
    <h1>Nombre de tu futuro hijo</h1>
    <p>Lista de nombres cortos para un niño</p>
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?= htmlentities($nombre) ?>"> <br>
        <input type="submit" value="Enviar" name="enviar">
        <input type="submit" value="Borrar todo" name="borrar">
    </form>
    
    <p class="color"><?= $mensaje ?></p>
    
    <h2>Mis nombres preferidos:</h2>
    <?= $nombres ?>
</body