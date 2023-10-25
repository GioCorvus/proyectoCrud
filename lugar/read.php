<?php
require_once 'Lugar.php';

$objeto = new Lugar();
$datos = $objeto->leer();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Lugares</title>
</head>
<body>
    <h1>Ver Lugares</h1>
    <table border="1">
        <tr>
            <th>IP</th>
            <th>Lugar</th>
            <th>Descripción</th>
        </tr>
        <?php foreach ($datos as $linea): ?>
        <tr>
            <td><?php echo $linea["ip"]; ?></td>
            <td><?php echo $linea["lugar"]; ?></td>
            <td><?php echo $linea["descripcion"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="lugar.html">Volver</a>
</body>
</html>
