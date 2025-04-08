<?php


class DbConfig {

private $host = "localhost";
private $username = "root";
private $password = "";

private $dbname = "blog_dinamico";

public function getConnection(){

    try {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->username,$this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo 'Falló la conexión: ' . $e->getMessage();
    }

}

}

class Conexion {
    private $host = 'localhost';
    private $dbname = 'blog_dinamico'; // <-- cámbialo por el tuyo
    private $username = 'root'; // o el usuario que uses
    private $password = '';     // o tu contraseña de MySQL

    public function conectar() {
        try {
            $conn = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
            return null;
        }
    }
}
?>