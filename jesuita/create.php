<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'Jesuita.php';

    $idJesuita = $_POST["idJesuita"];
    $nombre = $_POST["nombre"];
    $firma = $_POST["firma"];

    $jesuita = new Jesuita();
    $jesuita->insertar($idJesuita,$nombre, $firma);

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Jesuita</title>
</head>
<body>
    <h1>Agregar Jesuita</h1>
    <form action="" method="POST">
        <label for="idJesuita">ID Jesuita:</label>
        <input type="text" name="idJesuita" id="idJesuita" required>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label for="firma">Firma:</label>
        <textarea name="firma" rows="4" required></textarea><br>
        <input type="submit" value="Agregar">
    </form>
    <br>
    <a href="jesuita.html">Volver</a>
</body>
</html>

