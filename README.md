# SGIC - Sistema de Gestión de Incidentes de Clientes 

# Planteamiento del problema:

En muchos centros de atención, las gestiones se registran en hojas, Excel o sistemas que son insuficientes por sí mismos. Esto genera una pérdida de información, la duplicidad, la falta de indicadores y las demoras en la resolución. En este proyecto se propone un sistema que permita:

Registrar a los clientes y los usuarios.
Crear y hacer el seguimiento a tickets/incidentes (CRUD).
Clasificar y priorizar las gestiones realizadas.
Generar reportes de manera simple a fin de medir los tiempos y el volumen de atenciones.
	
Este proceso ayudará a mejorar la organización del trabajo y la calidad del servicio.

# Requerimientos: 

# Requerimientos funcionales

RF1 — Autenticación: usuarios pueden registrarse/iniciar sesión (login). Roles: administrador y agente.
RF2 — Gestión de usuarios: administrador puede crear/editar/eliminar usuarios (CRUD).
RF3 — Gestión de clientes: crear/leer/actualizar/eliminar clientes (CRUD).
RF4 — Gestión de tickets: agentes/usuarios pueden crear tickets con título, descripción, estado, prioridad, cliente asociado, archivos adjuntos; pueden editar estado (CRUD).
RF5 — Asignación: administrador puede asignar tickets a agentes.
RF6 — Búsqueda y filtros: listar tickets por estado, prioridad, agente, fechas.
RF7 — Reportes: generar reportes simples (nº de tickets por mes, tiempos promedio de resolución).
RF8 — Exportación: exportar listado de tickets a CSV (opcional, básico).
RF9 — Manual de usuario: sistema incluirá un documento para el usuario final.
RF10 — Idioma: el sistema será implementado en español.

# Requerimientos no funcionales

RNF1 — Desempeño: respuesta < 2s en búsquedas básicas en entorno local (depende del hardware).
RNF2 — Seguridad: contraseñas cifradas (bcrypt), sanitización básica de entradas.
RNF3 — Usabilidad: interfaz simple y responsive (Vue 3 con componentes claros).
RNF4 — Portabilidad: correr en Laragon (Windows) sin dependencias externas.
RNF5 — Mantenibilidad: código limpio y organizado (Laravel API + Vue frontend separados).

# Tecnologías utilizadas 
* **Backend:** Laravel 10 (PHP 8.1+)
* **Frontend:** Vue.js 3 (Composition API)
* **Comunicación:** Inertia.js. 
* **Peticiones:** Axios.
* **Estilos:** Tailwind CSS.
* **Base de Datos:** MySQL (Relacional).

##  Módulos del Sistema
1. **Autenticación (RF1):** Control de acceso seguro para Administradores y Agentes.
2. **Gestión de Usuarios (RF2):** CRUD administrativo para control de personal.
3. **Gestión de Clientes (RF3):** Registro y actualización de cartera de clientes.
4. **Centro de Tickets (RF4, RF5, RF6):** Creación, asignación y filtrado de incidentes.
5. **Dashboard de Reportes (RF7):** Visualización de métricas críticas en tiempo real.

## Instalación y Despliegue (Entorno Local)
El sistema está optimizado para correr en **Laragon** o **XAMPP**:
1. **Clonar y Preparar:**
   ```bash
   git clone [https://github.com/Gitayespica/PROYECTO_FINAL_SGIC]
   composer install
   npm install

2. **Configuración de Base de Datos:**

Crear base de datos sgic_db en MySQL.

Configurar el archivo .env con las credenciales.

Ejecutar migraciones: php artisan migrate --seed

3. **Ejecución:**

En una terminal: php artisan serve

En otra terminal: npm run dev

4. **Acceso: http://127.0.0.1:8000**
