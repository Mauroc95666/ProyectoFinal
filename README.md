# 🌤️ Sistema Meteorológico Multilingüe

Proyecto final desarrollado para la asignatura de **Tecnología Web II** de la Universidad Privada Domingo Savio (UPDS). 

Este sistema web permite la gestión de registros climáticos mediante perfiles de usuario, integrando soporte nativo para múltiples idiomas, seguridad de acceso y un despliegue moderno a través de contenedores.

## 🚀 Características y Funcionalidades Implementadas

* **Gestión de Usuarios (Autenticación y Autorización):**
  * Sistema de Login y Logout para proteger la información.
  * Restricción de acceso: Solo los usuarios autenticados pueden ver, crear, editar o eliminar registros meteorológicos.
  * CRUD completo para la administración de cuentas de usuario.
* **Buscadores Avanzados:**
  * **Módulo Usuarios:** Implementación de un buscador combinado inteligente que permite filtrar registros ingresando el *nombre* **O** el *correo electrónico* simultáneamente.
  * **Módulo Clima:** Filtro de búsqueda por *ubicación* geográfica.
* **Internacionalización (i18n):**
  * Interfaz de usuario con soporte bilingüe (Español / Inglés).
  * Adaptación dinámica de menús, botones, tablas de datos y mensajes flash utilizando archivos de traducción `.po`.
* **Infraestructura y Despliegue (DevOps):**
  * Empaquetado completo del sistema utilizando Podman/Docker.
  * Implementación de una imagen optimizada basada en **Alpine Linux** con **PHP 8.4**, garantizando un entorno ligero, estable y libre de conflictos de dependencias.
  * Orquestación mediante `docker-compose.yml` para levantar el servidor web integrado (puerto 8765) con un solo comando.

## 🛠️ Stack Tecnológico
* **Backend:** CakePHP 5.x, PHP 8.4
* **Base de Datos:** [Menciona aquí tu base de datos, ej. MySQL / PostgreSQL]
* **Despliegue:** Podman / Docker Compose, Alpine Linux
* **Control de Versiones:** Git & GitHub

---

## ⚙️ Instrucciones de Instalación y Despliegue

Este proyecto está diseñado para ser clonado y ejecutado en cualquier máquina sin necesidad de instalar PHP o configuraciones locales complejas.

**1. Clonar el repositorio:**
```bash
git clone [https://github.com/Mauroc95666/ProyectoFinal.git](https://github.com/Mauroc95666/ProyectoFinal.git)
cd ProyectoFinal