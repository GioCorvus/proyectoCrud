

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Lugar</title>
</head>
<body>
    <h1>Borrar Lugar</h1>
    <form action="" method="POST">
        <label for="ip">IP Lugar a borrar:</label>
        <input type="text" name="ip" id="ip" required>
        <input type="submit" value="Borrar Lugar">
        <link rel="stylesheet" type="text/css" href="../styles.css">
    </form>
    <br>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once '../clases/Lugar.php';

            $ip = $_POST["ip"];

            $objeto = new Lugar();
            $resultado = $objeto->borrar($ip);

            if ($resultado) {
                // si el resultado es verdadero, el lugar fue borrado
                echo "<p>Se ha borrado el lugar con ip $ip.</p>";
            } else {
                // si el resultado es falso, el lugar no existe
                echo "<p>No existe un lugar con IP $ip.</p>";
            }
        }
    ?>
    <a href="lugar.html">Volver</a>
</body>
</html>