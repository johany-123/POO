<?php
session_start();
include_once './config.php'; // Asegurate que esta ruta esté bien

$db = new DbConfig();
$conn = $db->getConnection();

if (!$conn) {
    die("Error al conectar a la base de datos.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
        echo json_encode(["status" => "error", "message" => "Todos los campos son obligatorios."]);
        exit;
    }

    $username = trim(htmlspecialchars($_POST['username']));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $password = $_POST['password'];

    try {
        // Verificar si ya existe el usuario o correo
        $query = "SELECT * FROM users WHERE username = :username OR email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo json_encode(["status" => "error", "message" => "El nombre de usuario o el correo ya están registrados."]);
            exit;
        }

        // Encriptar contraseña
        $contrasena_encriptada = password_hash($password, PASSWORD_DEFAULT);

        // Insertar nuevo usuario
        $insert = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($insert);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $contrasena_encriptada);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Usuario registrado con éxito."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error al registrar el usuario."]);
        }

    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Error en la base de datos: " . $e->getMessage()]);
    }
}
?>
