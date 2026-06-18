
# Sistema Web de Gestión de Emergencias Universitarias

### Universidad Privada Domingo Savio (UPDS)

Sistema para la gestión, seguimiento y monitoreo de incidentes en tiempo real dentro del campus universitario.


![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge\&logo=laravel\&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge\&logo=php\&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge\&logo=mysql\&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-06B6D4?style=for-the-badge\&logo=tailwindcss\&logoColor=white)
![Laragon](https://img.shields.io/badge/Laragon-007ACC?style=for-the-badge)


![Status](https://img.shields.io/badge/Estado-MVP_Completo-success?style=flat-square)
![Version](https://img.shields.io/badge/Versión-1.0-blue?style=flat-square)
![DSII](https://img.shields.io/badge/DSII-2026-black?style=flat-square)


---

## Tabla de Contenidos

* [Descripción](#descripción)
* [Funcionalidades Principales](#funcionalidades-principales)
* [Gestión de Usuarios y Roles](#gestión-de-usuarios-y-roles)
* [Tecnologías Utilizadas](#tecnologías-utilizadas)
* [Arquitectura del Proyecto](#arquitectura-del-proyecto)
* [Cuentas de Acceso](#cuentas-de-acceso)
* [Requisitos de Ejecución](#requisitos-de-ejecución)
* [Instalación](#instalación)
* [Estado del Proyecto](#estado-del-proyecto)
* [Equipo de Desarrollo](#equipo-de-desarrollo)

---

## Descripción

Este proyecto corresponde al **Producto Mínimo Viable (MVP)** desarrollado para la actividad académica:

### HACKATÓN DSII 2026

**Desarrolla, Depura y Defiende**

La plataforma centraliza el reporte y seguimiento de incidentes dentro del campus universitario, permitiendo una administración eficiente de:

* Incendios
* Fallas eléctricas
* Emergencias médicas
* Otros eventos de riesgo

La solución reemplaza los canales informales de comunicación mediante una aplicación web desarrollada bajo la arquitectura **Modelo - Vista - Controlador (MVC)**.

---

## Funcionalidades Principales

### Gestión de Incidentes

* Registro de incidentes
* Descripción detallada
* Clasificación por tipo
* Fecha y hora automáticas
* Seguimiento completo del incidente

### Flujo de Atención

| Estado     |
| ---------- |
| Pendiente  |
| En Proceso |
| Resuelto   |

---

## Gestión de Usuarios y Roles

| Rol         | Funcionalidades                                               |
| ----------- | ------------------------------------------------------------- |
| Operador    | Registrar incidentes y consultar reportes                     |
| Coordinador | Consultar reportes, asignar responsables y actualizar estados |

---

## Tecnologías Utilizadas

| Tecnología      | Descripción                     |
| --------------- | ------------------------------- |
| Laravel 11      | Framework backend basado en MVC |
| PHP 8.2         | Lenguaje de programación        |
| MySQL / MariaDB | Sistema gestor de base de datos |
| Tailwind CSS    | Framework CSS                   |
| Laragon         | Entorno de desarrollo local     |

---

## Arquitectura del Proyecto

```text
gestion-emergencias/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── IncidenteController.php
│   │
│   └── Models/
│       └── Incidente.php
│
├── database/
│   ├── migrations/
│   │   └── create_incidentes_table.php
│   │
│   └── database.sql
│
├── resources/
│   └── views/
│       └── incidentes/
│           ├── create.blade.php
│           └── index.blade.php
│
├── routes/
│   └── web.php
│
├── .env.example
│
└── README.md
```

### Componentes Principales

| Ruta        | Función                          |
| ----------- | -------------------------------- |
| Controllers | Lógica de negocio                |
| Models      | Acceso y representación de datos |
| Migrations  | Esquema de la base de datos      |
| Views       | Interfaces Blade                 |
| Routes      | Configuración de rutas           |
| .env        | Variables de entorno             |

---

## Cuentas de Acceso

Para la evaluación y pruebas del sistema:

| Rol         | Correo                                              | Contraseña  |
| ----------- | --------------------------------------------------- | ----------- |
| Operador    | [operador@upds.net](mailto:operador@upds.net)       | password123 |
| Coordinador | [coordinador@upds.net](mailto:coordinador@upds.net) | password123 |

> Estas credenciales fueron creadas exclusivamente para fines de demostración y evaluación académica.

---

## Requisitos de Ejecución

* PHP 8.2 o superior
* Composer
* MySQL o MariaDB
* Laragon (recomendado)
* Navegador web moderno

---

## Instalación

### Clonar el repositorio

```bash
git clone <URL_DEL_REPOSITORIO>
cd gestion-emergencias
```

### Instalar dependencias

```bash
composer install
```

### Configurar variables de entorno

```bash
cp .env.example .env
```

### Generar clave de aplicación

```bash
php artisan key:generate
```

### Ejecutar migraciones

```bash
php artisan migrate
```

### Iniciar servidor local

```bash
php artisan serve
```

Acceder desde:

```text
http://localhost:8000
```

---

## Estado del Proyecto

| Módulo                   | Estado    |
| ------------------------ | --------- |
| **Autenticación de Usuarios (Session Auth)** | Completo |
| **Control de Acceso Basado en Roles (Operador/Coordinador)** | Completo |
| **Registro de Incidentes Críticos** | Completo |
| **Persistencia de Datos en Base de Datos (MySQL)** | Completo |
| **Cuaderno de Eventos (Dashboard de Seguimiento)** | Completo |
| **Navegación Dinámica Interfaz (UPDS Online Style)** | Completo |
| **Módulo de Notificaciones en Tiempo Real** | Pendiente |
| **Generación de Reportes Estadísticos y Exportación PDF** | Pendiente |

---

## Equipo de Desarrollo

| Integrante                   | Responsabilidad                           |
| ---------------------------- | ----------------------------------------- |
| Leonardo Nogales Torres      | Backend, Autenticación y Control de Roles |
| Rafael Leandro Gómez Escobar | Frontend, Diseño UI y JavaScript          |
| Mauricio Cartagena Alba      | Base de Datos, QA y Pruebas               |

---

## Universidad Privada Domingo Savio

**Carrera de Ingeniería de Sistemas**

**Desarrollo de Sistemas II (DSII)**

**Gestión 2026**

---


Desarrollado para la Hackatón DSII 2026

Universidad Privada Domingo Savio
