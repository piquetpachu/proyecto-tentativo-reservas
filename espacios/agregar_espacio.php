<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Espacio</title>
    <!-- Tailwind CSS con modo oscuro -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 min-h-screen">
    <!-- Barra de navegación (consistente con el dashboard) -->
    <nav class="bg-white dark:bg-gray-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-xl font-semibold text-gray-800 dark:text-white">Panel Administrativo</span>
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
                    <a href="../dashboard.php" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 font-medium">Volver al panel</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Agregar Nuevo Espacio</h2>
                    
                    <form action="procesar_espacio.php" method="POST" class="space-y-4">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="nombre">Nombre:</label>
                            <input 
                                type="text" 
                                name="nombre" 
                                id="nombre"
                                required
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                placeholder="Nombre del espacio"
                            >
                        </div>

                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="ubicacion">Ubicación:</label>
                            <input 
                                type="text" 
                                name="ubicacion" 
                                id="ubicacion"
                                required
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                placeholder="Ubicación exacta"
                            >
                        </div>

                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="tipo">Tipo:</label>
                            <input 
                                type="text" 
                                name="tipo" 
                                id="tipo"
                                required
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                placeholder="Tipo de espacio"
                            >
                        </div>

                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="descripcion">Descripción:</label>
                            <textarea 
                                name="descripcion" 
                                id="descripcion"
                                rows="4"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                placeholder="Descripción detallada del espacio"
                            ></textarea>
                        </div>

                        <button 
                            type="submit" 
                            class="w-full bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150"
                        >
                            Agregar Espacio
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Script para el toggle de modo oscuro -->
    <script src="../darktheme.js"></script>

    
</body>
</html>