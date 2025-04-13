<?php
session_start();
session_destroy();
header("Location: ../index.php");
// Limpiar la caché del navegador
exit;
?>

