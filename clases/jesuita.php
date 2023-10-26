<?php

require_once '../config/config.php';

class Jesuita {
    private $conn;
    
    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function insertar($idJesuita, $nombre, $firma) {
        // verificar si ya existe un registro con el mismo idJesuita
        $consulta = "SELECT idJesuita FROM jesuita WHERE idJesuita = '$idJesuita'";
        $resultado = $this->conn->query($consulta);

        if ($resultado->num_rows > 0) {
            // ya existe un registro con el mismo idJesuita
            $mensaje = "Ya existe un Jesuita con el ID $idJesuita.";
        } else {
            $consulta = "INSERT INTO jesuita (idJesuita, nombre, firma) VALUES ('$idJesuita', '$nombre', '$firma')";
            $insertar = $this->conn->query($consulta);

            $mensaje = "Jesuita insertado con éxito.";
        }

        // Cerrar la conexión
        $this->conn->close(); 

        return $mensaje;
    }

    public function leer() {
        $result = $this->conn->query("SELECT * FROM jesuita");
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $this->conn->close(); 

        return $data;
    }

    public function borrar($idJesuita) {
        // verifica si el Jesuita con el ID dado existe
        $consulta = "SELECT idJesuita FROM jesuita WHERE idJesuita = '$idJesuita'";
        $resultado = $this->conn->query($consulta);

        if ($resultado->num_rows === 0) {
            $this->conn->close(); 
            return false;
        }

        // jesuita existe, procede con el borrado
        $borrar = "DELETE FROM jesuita WHERE idJesuita = '$idJesuita'";
        $resultado = $this->conn->query($borrar);

        $this->conn->close(); 

        return $resultado;
    }

    public function modificar($idJesuita, $nuevoNombre, $nuevaFirma) {
        // Verificar si el Jesuita con el ID dado existe
        $consultaExistencia = "SELECT idJesuita FROM jesuita WHERE idJesuita = '$idJesuita'";
        $resultadoExistencia = $this->conn->query($consultaExistencia);

        if ($resultadoExistencia->num_rows === 0) {
            $this->conn->close(); 
            return "No existe un Jesuita con el ID $idJesuita.";
        }

        // El Jesuita existe, procede con la modificación
        $consultaModificar = "UPDATE jesuita SET nombre = '$nuevoNombre', firma = '$nuevaFirma' WHERE idJesuita = '$idJesuita'";
        $resultadoModificar = $this->conn->query($consultaModificar);

        $this->conn->close(); 

        if ($resultadoModificar) {
            return "Jesuita modificado con éxito.";
        } else {
            return "Error al modificar el Jesuita.";
        }
    }
}
?>
