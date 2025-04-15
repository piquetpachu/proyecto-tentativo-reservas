<?php
session_start();
require_once __DIR__ . '/../config/database.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$rol = $_POST['rol'];

$pdo = connection();

// Verificar si el correo ya existe
$sql_check = "SELECT id_usuario FROM usuario WHERE email = ?";
$stmt_check = $pdo->prepare($sql_check);
$stmt_check->execute([$email]);

if ($stmt_check->fetch(PDO::FETCH_ASSOC)) {
    $_SESSION['registro_error'] = "Este correo ya está registrado.";
    header("Location: register.php");
    exit;
}

// Insertar nuevo usuario
$sql = "INSERT INTO usuario (nombre, email, password, rol, telefono, direccion) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$ok = $stmt->execute([$nombre, $email, $password, $rol, $telefono, $direccion]);

if ($ok) {
    $_SESSION['registro_exito'] = "¡Registro exitoso! Ahora podés iniciar sesión.";
    header("Location: register.php");
    exit;
} else {
    $_SESSION['registro_error'] = "Error al registrar. Intentá de nuevo.";
    header("Location: register.php");
    exit;
}
