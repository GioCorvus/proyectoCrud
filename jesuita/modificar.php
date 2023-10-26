

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Jesuita</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
    <h1>Modificar Jesuita</h1>
    <form action="" method="POST">
        <label for="idJesuita">ID Jesuita a Modificar:</label>
        <input type="text" name="idJesuita" id="idJesuita" required>
        <label for="nuevoNombre">Nuevo Nombre:</label>
        <input type="text" name="nuevoNombre" required><br>
        <label for="nuevaFirma">Nueva Firma:</label>
        <textarea name="nuevaFirma" rows="4" required></textarea><br>
        <input type="submit" value="Modificar">
    </form>
    <br>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once '../clases/Jesuita.php';

            $idJesuita = $_POST["idJesuita"];
            $nuevoNombre = $_POST["nuevoNombre"];
            $nuevaFirma = $_POST["nuevaFirma"];

            $jesuita = new Jesuita();
            $mensajeModificar = $jesuita->modificar($idJesuita, $nuevoNombre, $nuevaFirma);

            echo $mensajeModificar; 
        }
    ?>
    <a href="jesuita.html">Volver</a>
</body>
</html>