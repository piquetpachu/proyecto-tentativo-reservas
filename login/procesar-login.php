<?php
session_start();
require_once __DIR__ . '/../config/database.php';

$email = $_POST['email'];
$password = $_POST['password'];

$pdo = connection();

$sql = "SELECT * FROM usuario WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($password, $usuario['password'])) {
    $_SESSION['usuario_id'] = $usuario['id_usuario'];
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['rol'] = $usuario['rol'];
    header("Location: ../dashboard.php");
    exit;
} else {
    $_SESSION['login_error'] = "Correo o contraseña incorrectos.";
    header("Location: ../index.php");
    exit;
}
