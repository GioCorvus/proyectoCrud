

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Lugar</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">

</head>
<body>
    <h1>Modificar Lugar</h1>
    <form action="" method="POST">
        <label for="ip">IP Lugar a Modificar:</label>
        <input type="text" name="ip" id="ip" required>
        <label for="lugar">Nuevo Nombre:</label>
        <input type="text" name="lugar" required><br>
        <label for="descripcion">Nueva Firma:</label>
        <textarea name="descripcion" rows="4" required></textarea><br>
        <input type="submit" value="Modificar">
    </form>
    <br>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once '../clases/Lugar.php';

            $ip = $_POST["ip"];
            $lugar = $_POST["lugar"];
            $descripcion = $_POST["descripcion"];

            $objeto = new Lugar();
            $mensajeModificar = $objeto->modificar($ip, $lugar, $descripcion);

            echo $mensajeModificar; 
        }
    ?>
    <a href="lugar.html">Volver</a>
</body>
</html>