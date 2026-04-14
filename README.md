# Sistema de Gestión Ligno

Sistema web de gestión desarrollado para un taller de carpintería, orientado a digitalizar solicitudes personalizadas, organizar procesos internos y mejorar el control de la información.

## Descripción

Este proyecto fue desarrollado como parte de un proyecto final académico con el objetivo de construir una solución web funcional para una necesidad real de negocio.  
El sistema se enfoca en la gestión de solicitudes, control de usuarios y trazabilidad de procesos mediante bitácoras y control de acceso por roles.

## Funcionalidades

- Autenticación de usuarios
- Control de acceso por roles
- Gestión de solicitudes personalizadas
- Bitácora de usuarios
- Bitácora de movimientos
- Gestión de perfil de usuario
- Panel administrativo
- Validación de datos y manejo estructurado del flujo de trabajo

## Tecnologías utilizadas

- PHP
- Laravel
- MySQL
- HTML5
- CSS3
- Bootstrap
- JavaScript
- Vite

## Estructura del proyecto

La aplicación sigue una arquitectura MVC e incluye:

- Controladores para solicitudes, roles, perfiles y bitácoras
- Modelos para usuarios, roles, solicitudes y registros relacionados
- Vistas Blade para secciones administrativas y públicas
- Migraciones para la estructura de base de datos
- Funcionalidades de autenticación y gestión de perfil

## Instalación

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/NelsonHvb/Web-Muebles-Ligno.git
   ```

2. Ingresar a la carpeta del proyecto:
   ```bash
   cd Web-Muebles-Ligno
   ```

3. Instalar dependencias del backend:
   ```bash
   composer install
   ```

4. Instalar dependencias del frontend:
   ```bash
   npm install
   ```

5. Crear el archivo de entorno:
   ```bash
   copy .env.example .env
   ```

6. Generar la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```

7. Configurar las credenciales de base de datos en el archivo `.env`.

8. Ejecutar las migraciones:
   ```bash
   php artisan migrate
   ```

9. Iniciar el servidor de desarrollo:
   ```bash
   php artisan serve
   ```

## Uso

Este sistema está pensado para apoyar la gestión de solicitudes personalizadas y las operaciones internas relacionadas.  
Permite administrar usuarios, roles, registros de solicitudes y bitácoras de actividad de forma más estructurada y centralizada.

## Estado del repositorio

Este repositorio contiene la versión académica del proyecto y actualmente está siendo organizado como parte de mi portafolio profesional.

## Autor

**Nelson Chavarría Chavarría**

- GitHub: [NelsonHvb](https://github.com/NelsonHvb)
- LinkedIn: [nelson-chavarría-677b02302](https://www.linkedin.com/in/nelson-chavarr%C3%ADa-677b02302/)