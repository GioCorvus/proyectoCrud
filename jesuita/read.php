<?php
require_once 'Jesuita.php';

$jesuita = new Jesuita();
$datos = $jesuita->leer();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Jesuitas</title>
</head>
<body>
    <h1>Ver Jesuitas</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Firma</th>
        </tr>
        <?php foreach ($datos as $linea): ?>
        <tr>
            <td><?php echo $linea["idJesuita"]; ?></td>
            <td><?php echo $linea["nombre"]; ?></td>
            <td><?php echo $linea["firma"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="jesuita.html">Volver</a>
</body>
</html>
