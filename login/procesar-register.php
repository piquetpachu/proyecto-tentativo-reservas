<?php
session_start();
require_once __DIR__ . '/../config/database.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$rol = $_POST['rol'];

$con = connection();

// Verificar si el correo ya existe
$sql_check = "SELECT id_usuario FROM usuario WHERE email = ?";
$stmt_check = mysqli_prepare($con, $sql_check);
mysqli_stmt_bind_param($stmt_check, "s", $email);
mysqli_stmt_execute($stmt_check);
$result_check = mysqli_stmt_get_result($stmt_check);

if (mysqli_fetch_assoc($result_check)) {
    $_SESSION['registro_error'] = "Este correo ya está registrado.";
    header("Location: register.php");
    exit;
}

// Insertar nuevo usuario
$sql = "INSERT INTO usuario (nombre, email, password, rol, telefono, direccion) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "ssssss", $nombre, $email, $password, $rol, $telefono, $direccion);
$ok = mysqli_stmt_execute($stmt);

if ($ok) {
    $_SESSION['registro_exito'] = "¡Registro exitoso! Ahora podés iniciar sesión.";
    header("Location: register.php");
} else {
    $_SESSION['registro_error'] = "Error al registrar. Intentá de nuevo.";
    header("Location: register.php");
}
