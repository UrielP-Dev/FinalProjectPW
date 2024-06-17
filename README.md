# FinalProjectPW - Login-AP Branch

## Descripción

Este proyecto es una tienda de videojuegos desarrollada como el proyecto final del curso de Programación Web. La rama `Login-AP` incluye funcionalidades de autenticación y administración de usuarios.

## Estructura del Proyecto

- **Access/**: Maneja los accesos y permisos.
- **Context/**: Configuración y contexto del ORM.
- **DataBase/**: Scripts SQL para la base de datos.
- **Home/**: Página principal de la tienda.
- **resoures/**: Recursos adicionales.
- **index.php**: Página de inicio del proyecto.
- **insert.php**: Script para insertar datos en la base de datos.
- **Phpinfoi.php**: Información PHP.

## Instalación

1. Clona el repositorio:
   ```bash
   git clone -b Login-AP https://github.com/UrielP-Dev/FinalProjectPW.git
  bash```

Este proyecto proporciona una aplicación web para la gestión de usuarios y administradores. Incluye funcionalidades de registro, inicio de sesión y administración de cuentas.

## Uso

1. Configura la base de datos usando los scripts en `DataBase/`.
2. Actualiza las credenciales de la base de datos en los archivos de conexión.
3. Navega a `index.php` para acceder a la página principal.
4. Usa el formulario de inicio de sesión para acceder a las funcionalidades de usuario.

## Tablas de la Base de Datos

### `users`

| Campo       | Tipo          | Descripción                  |
|-------------|---------------|------------------------------|
| `id`        | INT           | Clave primaria, autoincremental |
| `nombre`    | VARCHAR(100)  | Nombre del usuario           |
| `apellido`  | VARCHAR(100)  | Apellido del usuario         |
| `email`     | VARCHAR(100)  | Correo electrónico único     |
| `password`  | VARCHAR(255)  | Contraseña encriptada        |
| `created_at`| TIMESTAMP     | Fecha y hora de creación     |

### `admins`

| Campo       | Tipo          | Descripción                  |
|-------------|---------------|------------------------------|
| `id`        | INT           | Clave primaria, autoincremental |
| `nombre`    | VARCHAR(100)  | Nombre del administrador     |
| `apellido`  | VARCHAR(100)  | Apellido del administrador   |
| `email`     | VARCHAR(100)  | Correo electrónico único     |
| `password`  | VARCHAR(255)  | Contraseña encriptada        |
| `created_at`| TIMESTAMP     | Fecha y hora de creación     |


![image](https://github.com/UrielP-Dev/FinalProjectPW/assets/87452680/cc75f9a2-36f4-4518-a302-0c106ca98c7b)


## Tecnologías

- PHP
- MySQL
- HTML/CSS
- JavaScript

## Contribución

1. Haz un fork del repositorio.
2. Crea una nueva rama.
3. Envía tus cambios mediante un pull request.

## Licencia

Este proyecto está bajo la Licencia MIT.
