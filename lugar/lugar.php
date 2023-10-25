<?php
class Lugar {
    private $db;
    
    public function __construct() {
        require_once 'db.php';
        $this->db = new DB();
    }

    public function insertar($ip, $lugar, $descripcion) {
        $conn = $this->db->connect();
    
        // verificar si ya existe un registro con el mismo ip
        $consulta = "SELECT ip FROM lugar WHERE ip = '$ip'";
        $resultado = $conn->query($consulta);
    
        if ($resultado->num_rows > 0) {
            // ya existe un registro con el mismo ip
            $mensaje = "Ya existe un Lugar con la IP $ip.";
        } else {
            $consulta = "INSERT INTO lugar (ip, lugar, descripcion) VALUES ('$ip', '$lugar', '$descripcion')";
            $insertar = $conn->query($consulta);
    
            $mensaje = "Lugar insertado con éxito.";
        }
    
        // Cerrar la conexión
        $conn->close();
    
        return $mensaje;
    }

    public function leer() {
        $conn = $this->db->connect();
        $result = $conn->query("SELECT * FROM lugar");
        $datos = array();

        while ($row = $result->fetch_assoc()) {
            $datos[] = $row;
        }

        $result->close();
        $conn->close();

        return $datos;
    }

    public function borrar($ip) {
        $conn = $this->db->connect();
    
        // verifica si el Lugar con la IP dada existe
        $consulta = "SELECT ip FROM lugar WHERE ip = '$ip'";
        $resultado = $conn->query($consulta);
    
        if ($resultado->num_rows === 0) {
            $conn->close();
            return false;
        }
    
        // lugar existe, procede con el borrado
        $borrar = "DELETE FROM lugar WHERE ip = '$ip'";
        $resultado = $conn->query($borrar);
    
        $conn->close();
    
        return $resultado;
    }

    public function modificar($ip, $lugar, $descripcion) {
        $conn = $this->db->connect();

        // Verificar si el Jesuita con el ID dado existe
        $consultaExistencia = "SELECT ip FROM lugar WHERE ip = '$ip'";
        $resultadoExistencia = $conn->query($consultaExistencia);

        if ($resultadoExistencia->num_rows === 0) {
            $conn->close();
            return "No existe un lugar con la IP $ip.";
        }

        // El lugar existe, procede con la modificación
        $consultaModificar = "UPDATE lugar SET lugar = '$lugar', descripcion = '$descripcion' WHERE ip = '$ip'";
        $resultadoModificar = $conn->query($consultaModificar);

        $conn->close();

        if ($resultadoModificar) {
            return "Lugar modificado con éxito.";
        } else {
            return "Error al modificar el lugar.";
        }
    }

}
?>
