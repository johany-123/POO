<?php
session_start();

include_once './config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
        echo json_encode(["status" => "error", "message" => "Todos los campos son obligatorios."]);
        exit;
    }

    $username = trim(htmlspecialchars($_POST['username']));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "El nombre de usuario o el correo ya están registrados."]);
        exit;
    }

    // Encriptar contraseña
    $contrasena_encriptada = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $contrasena_encriptada);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Usuario registrado con éxito."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al registrar el usuario."]);
    }

    $stmt->close();
    $conn->close();
}

?>
