<?php
class Jesuita {
    private $db;
    
    public function __construct() {
        require_once 'db.php';
        $this->db = new DB();
    }

    public function insertar($idJesuita, $nombre, $firma) {
        $conn = $this->db->connect();
    
        // verificar si ya existe un registro con el mismo idJesuita
        $consulta = "SELECT idJesuita FROM jesuita WHERE idJesuita = '$idJesuita'";
        $resultado = $conn->query($consulta);
    
        if ($resultado->num_rows > 0) {
            // ya existe un registro con el mismo idJesuita
            $mensaje = "Ya existe un Jesuita con el ID $idJesuita.";
        } else {
            $consulta = "INSERT INTO jesuita (idJesuita, nombre, firma) VALUES ('$idJesuita', '$nombre', '$firma')";
            $insertar = $conn->query($consulta);
    
            $mensaje = "Jesuita insertado con éxito.";
        }
    
        // Cerrar la conexión
        $conn->close();
    
        return $mensaje;
    }

    public function leer() {
        $conn = $this->db->connect();
        $result = $conn->query("SELECT * FROM jesuita");
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $result->close();
        $conn->close();

        return $data;
    }

    public function borrar($idJesuita) {
        $conn = $this->db->connect();
    
        // verifica si el Jesuita con el ID dado existe
        $consulta = "SELECT idJesuita FROM jesuita WHERE idJesuita = '$idJesuita'";
        $resultado = $conn->query($consulta);
    
        if ($resultado->num_rows === 0) {
            $conn->close();
            return false;
        }
    
        // jesuita existe, procede con el borrado
        $borrar = "DELETE FROM jesuita WHERE idJesuita = '$idJesuita'";
        $resultado = $conn->query($borrar);
    
        $conn->close();
    
        return $resulto;
    }

}
?>
