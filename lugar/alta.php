<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Lugar</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">

</head>
<body>
    <h1>Alta Lugar</h1>
    <form action="" method="POST">
        <label for="ip">IP:</label>
        <input type="text" name="ip" id="ip" required>
        <label for="lugar">Lugar:</label>
        <input type="text" name="lugar" required><br> <!-- corregido el nombre del campo -->
        <label for="descripcion">Descripcion:</label>
        <textarea name="descripcion" rows="4" required></textarea><br>
        <input type="submit" value="Agregar">
    </form>
    <br>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once '../clases/Lugar.php';

            $ip = $_POST["ip"];
            $lugar = $_POST["lugar"];
            $descripcion = $_POST["descripcion"];

            $objeto = new Lugar();
            $mensaje = $objeto->insertar($ip, $lugar, $descripcion);

            echo $mensaje;
        }
    ?>
    <a href="lugar.html">Volver</a>
</body>
</html>

