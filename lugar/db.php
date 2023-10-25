<?php
class DB {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "bbddJesuita";

    public function connect() {
        $conn = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        return $conn;
    }
}

//esta es una clase TAN SOLO para manejar la conexion a la base de datos. asi me evito siempre el tener que repetir los datos de conexion
//usare la funcion connect para conectarme a la base de datos cuando instancie un objeto de la clase DB

?>

