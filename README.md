# Sistema de Reservas

Este es un sistema de gestión de reservas en desarrollo, que actualmente cuenta con un sistema de autenticación y registro de usuarios implementado.

## Estado del Proyecto

🚧 **En Desarrollo** 🚧

- ✅ Sistema de autenticación
- ✅ Registro de usuarios
- ✅ Modo oscuro/claro
- ⏳ Sistema de reservas (Próximamente)

## Requisitos Previos

- PHP 7.4 o superior
- MySQL/MariaDB
- Servidor web (Apache/Nginx)
- XAMPP (recomendado para desarrollo local)

## Instalación

1. Clona el repositorio:
```bash
git clone [URL_DEL_REPOSITORIO]
cd proyecto-reservas

Configura la base de datos:
Crea una base de datos llamada sistema_reservas
Importa el siguiente esquema SQL:

Configura la conexión a la base de datos:
Abre database.php
Modifica las credenciales según tu entorno:

```php
<?php
$host = 'localhost';
$user = 'tu_usuario';
$pass = 'tu_contraseña';
$db = 'sistema_reservas';
```
```
proyecto-reservas/
├── config/
│   └── database.php
├── login/
│   ├── login.php
│   ├── logout.php
│   ├── procesar-login.php
│   ├── procesar-register.php
│   └── register.php
├── dashboard.php
└── index.php
```

Características Implementadas
Autenticación de Usuarios

Inicio de sesión
Registro de nuevos usuarios
Cierre de sesión
Protección de rutas
Interfaz de Usuario

Diseño responsive con Tailwind CSS
Modo oscuro/claro con persistencia
Mensajes de error y éxito
Validación de formularios
Próximas Características
Sistema de reservas
Gestión de disponibilidad
Creación de reservas
Modificación de reservas
Cancelación de reservas
Panel de administración
Notificaciones
Reportes y estadísticas
Tecnologías Utilizadas
PHP
MySQL
Tailwind CSS
JavaScript
HTML5
Seguridad
El sistema implementa varias medidas de seguridad:

Contraseñas hasheadas con password_hash()
Protección contra SQL injection usando prepared statements
Validación de sesiones
Sanitización de datos de entrada
Contribución
Si deseas contribuir al proyecto:

Haz un Fork del repositorio
Crea una rama para tu característica (git checkout -b feature/AmazingFeature)
Realiza tus cambios y haz commit (git commit -m 'Add some AmazingFeature')
Push a la rama (git push origin feature/AmazingFeature)
Abre un Pull Request