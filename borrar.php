<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'Jesuita.php';

    $idJesuita = $_POST["idJesuita"];

    $jesuita = new Jesuita();
    $resultado = $jesuita->borrar($idJesuita);

    if ($resultado) {
        // si el resultado es verdadero, el jesuita fue borrado
        echo "<p>Se ha borrado el Jesuita con ID $idJesuita.</p>";
    } else {
        // si el resultado es falso, el jesuita no existe
        echo "<p>No existe un Jesuita con ID $idJesuita.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Jesuita</title>
</head>
<body>
    <h1>Borrar Jesuita</h1>
    <form action="" method="POST">
        <label for="idJesuita">ID Jesuita a borrar:</label>
        <input type="text" name="idJesuita" id="idJesuita" required>
        <input type="submit" value="Borrar Jesuita">
    </form>
    <br>
    <a href="index.html">Volver</a>
</body>
</html>