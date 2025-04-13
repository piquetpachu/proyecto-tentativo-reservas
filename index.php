<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ./login/login.php");
    exit;
}
?>
<h1>inicio</h1>
<a href="login/logout.php">Cerrar sesión</a>
<p>¿No tenés cuenta? <a href="login/register.php">Registrarse</a></p>
<p>¿Ya tenés cuenta? <a href="login/login.php">Iniciar sesión</a></p>
