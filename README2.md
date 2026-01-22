# Propuesta de proyecto final: Sistema de gestión de incidentes y clientes (SGIC)

Profesor: Jorge Prado	
Alumno: Arianna Yéspica
C.I.V-30715027
Extensión: Caracas

# Título del proyecto: Sistema de gestión de incidentes y clientes (SGIC)

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

# Cronograma mes a mes:

Noviembre 2025 

Semana 1:
Definir requisitos finales y alcance.
Instalar Laragon y herramientas (HeidiSQL, Composer, Node).

Semana 2:
Crear repositorio (local / Git).
Crear proyecto Laravel y configuración .env.

Semana 3:
Diseñar base de datos (migrations esquemáticas).
Crear migraciones iniciales (users, clients, tickets).

Semana 4:
Implementar autenticación básica (Sanctum).
Probar endpoints básicos (usuarios, clientes).
Documento de requisitos y primeras migraciones + auth básica.

Diciembre 2025 

Semana 1:
Implementar controllers y API resources para Clientes.
Implementar pruebas manuales de CRUD.

Semana 2:
Implementar controllers para Tickets (create, update, list).
Modelo de adjuntos y comentarios (migrations).

Semana 3:
Endpoints para comentarios y adjuntos.
Validaciones y manejo de errores.

Semana 4:
Primer control de calidad: pruebas funcionales API.
Preparar seeders con datos de prueba.
API CRUD completo para Clientes y Tickets, documentación de endpoints.

Enero 2026 

Semana 1:
Estructura del frontend (router, componentes básicos).
Login y manejo de sesión.

Semana 2:
Implementar vistas Clientes (list, form).
Conectar con API.

Semana 3:
Implementar vistas Tickets (list, form, detalle).
Funcionalidad de asignación y comentarios.

Semana 4:
Implementar módulo de Reportes (consulta API y visualización).
Ajustes UI/UX y validaciones frontend.

Febrero 2026 

Semana 1:
Pruebas integradas (end-to-end manual).
Corregir bugs.

Semana 2:
Preparar manual de usuario y guía de instalación.

Semana 3:
Ensayo de presentación (demo).
Empaquetado: exportar DB de prueba y entorno de Laragon.

Semana 4:
Presentación final y entrega del proyecto.

