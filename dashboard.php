<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
require_once __DIR__ . '/config/database.php';

$con = connection();
$espacios = mysqli_query($con, "SELECT * FROM espacio");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { darkMode: 'class' }
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 min-h-screen">
    <!-- Barra de navegación -->
    <nav class="bg-white dark:bg-gray-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-xl font-semibold text-gray-800 dark:text-white">Mi Aplicación</span>
                </div>
                <div class="flex items-center space-x-4">
                    <button id="themeToggle" class="p-2 rounded-full focus:outline-none">
                        <svg id="sunIcon" class="w-5 h-5 text-gray-700 dark:text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <svg id="moonIcon" class="w-5 h-5 text-gray-400 dark:text-white hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>
                    <span class="text-gray-600 dark:text-gray-300"><?php echo $_SESSION['nombre']; ?></span>
                    <a href="login/logout.php" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 font-medium">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Bienvenido, <?php echo $_SESSION['nombre']; ?>!</h2>

                    <?php if (isset($_GET['mensaje'])): ?>
                        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                            <?= htmlspecialchars($_GET['mensaje']) ?>
                        </div>
                    <?php endif; ?>

                    <div class="bg-blue-50 dark:bg-blue-900 border-l-4 border-blue-400 dark:border-blue-600 p-4 mb-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400 dark:text-blue-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-700 dark:text-blue-200">
                                    Rol actual: <span class="font-medium"><?php echo ucfirst($_SESSION['rol']); ?></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Secciones de ejemplo -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                            <h3 class="font-medium text-gray-800 dark:text-white mb-2">Sección 1</h3>
                            <p class="text-gray-600 dark:text-gray-300">Contenido de ejemplo para la primera sección.</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                            <h3 class="font-medium text-gray-800 dark:text-white mb-2">Sección 2</h3>
                            <p class="text-gray-600 dark:text-gray-300">Contenido de ejemplo para la segunda sección.</p>
                        </div>
                    </div>

                    <!-- Lista de espacios -->
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Espacios registrados</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left text-sm text-gray-700 dark:text-gray-200">
                            <thead class="bg-gray-200 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2">Nombre</th>
                                    <th class="px-4 py-2">Ubicación</th>
                                    <th class="px-4 py-2">Tipo</th>
                                    <th class="px-4 py-2">Descripción</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800">
                                <?php while ($espacio = mysqli_fetch_assoc($espacios)): ?>
                                    <tr class="border-b border-gray-300 dark:border-gray-700">
                                        <td class="px-4 py-2"><?= htmlspecialchars($espacio['nombre']) ?></td>
                                        <td class="px-4 py-2"><?= htmlspecialchars($espacio['ubicacion']) ?></td>
                                        <td class="px-4 py-2"><?= htmlspecialchars($espacio['tipo']) ?></td>
                                        <td class="px-4 py-2"><?= htmlspecialchars($espacio['descripcion']) ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>

                    <?php mysqli_close($con); ?>
                </div>
            </div>

            <?php if ($_SESSION['rol'] === 'admin'): ?>
                <div class="mt-6">
                    <a href="espacios/agregar_espacio.php" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                        ➕ Agregar nuevo espacio
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </main>
    <!-- Script para el toggle de modo oscuro -->
    <script src="darktheme.js"></script>
</body>
</html>
