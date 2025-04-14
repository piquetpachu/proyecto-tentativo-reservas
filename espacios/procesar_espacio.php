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

    $con = connection();
    $sql = "INSERT INTO espacio (nombre, ubicacion, tipo, descripcion) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $nombre, $ubicacion, $tipo, $descripcion);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../dashboard.php?mensaje=Espacio agregado correctamente");
    } else {
        echo "Error al agregar el espacio: " . mysqli_error($con);
    }
    mysqli_close($con);
