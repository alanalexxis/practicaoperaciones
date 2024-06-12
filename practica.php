<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi nombre - Operaciones Básicas</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Alan Alexis Jiménez Ballinas 9°A DyGS</h1>
        <h2>Operaciones Básicas</h2>

        <form method="post">
            <label for="valor1">Introduce el primer valor:</label>
            <input type="number" id="valor1" name="valor1" required>
            
            <label for="valor2">Introduce el segundo valor:</label>
            <input type="number" id="valor2" name="valor2" required>
            
            <input type="submit" name="operacion" value="Suma">
            <input type="submit" name="operacion" value="Resta">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                if (!isset($_POST['valor1']) || !isset($_POST['valor2']) || !isset($_POST['operacion'])) {
                    throw new Exception("Todos los campos son requeridos.");
                }
                
                $valor1 = $_POST['valor1'];
                $valor2 = $_POST['valor2'];
                $operacion = $_POST['operacion'];
                $resultado = 0;

                if (!is_numeric($valor1) || !is_numeric($valor2)) {
                    throw new Exception("Los valores deben ser números.");
                }

                if ($operacion == "Suma") {
                    $resultado = $valor1 + $valor2;
                    echo "<p>La suma de $valor1 y $valor2 es: $resultado</p>";
                } elseif ($operacion == "Resta") {
                    $resultado = $valor1 - $valor2;
                    echo "<p>La resta de $valor1 y $valor2 es: $resultado</p>";
                } else {
                    throw new Exception("Operación no válida.");
                }
            } catch (Exception $e) {
                echo "<p>Error: " . $e->getMessage() . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>
