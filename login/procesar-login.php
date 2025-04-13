<?php
session_start();
require_once __DIR__ . '/../config/database.php';


$email = $_POST['email'];
$password = $_POST['password'];

$con = connection();
$sql = "SELECT * FROM usuario WHERE email = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$usuario = mysqli_fetch_assoc($result);

if ($usuario && password_verify($password, $usuario['password'])) {
    $_SESSION['usuario_id'] = $usuario['id_usuario'];
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['rol'] = $usuario['rol'];
    header("Location: ../dashboard.php");
} else {
    $_SESSION['login_error'] = "Correo o contraseña incorrectos.";
    header("Location: ../index.php");
}
