<?php
session_start();
header('Content-Type: application/json');

require_once './config.php';

class Auth {
    private $db;

    public function __construct() {
        $dbConfig = new DbConfig();
        $this->db = $dbConfig->getConnection();
    }

    public function authenticate($email, $password) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                // Guardar en sesión
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $user['id_users'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['username'];

                return ['status' => 'success', 'message' => 'Inicio de sesión exitoso.'];
            }
        }

        return ['status' => 'error', 'message' => 'Correo o contraseña incorrectos.'];
    }
}

// Procesar solicitud POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['username'] ?? '');  // Se sigue llamando "username" en el input
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'Todos los campos son obligatorios.']);
        exit;
    }

    $auth = new Auth();
    $result = $auth->authenticate($email, $password);

    echo json_encode($result);
}
?>
