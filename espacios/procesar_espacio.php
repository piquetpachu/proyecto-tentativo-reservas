<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . '/../config/database.php';

$nombre = $_POST['nombre'] ?? '';
$ubicacion = $_POST['ubicacion'] ?? '';
$tipo = $_POST['tipo'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';

$pdo = connection();

try {
    $sql = "INSERT INTO espacio (nombre, ubicacion, tipo, descripcion) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $ubicacion, $tipo, $descripcion]);

    header("Location: ../dashboard.php?mensaje=Espacio agregado correctamente");
    exit;
} catch (PDOException $e) {
    echo "Error al agregar el espacio: " . $e->getMessage();
}
