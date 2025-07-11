# 👥 Módulo de Gestión de Usuarios

## Descripción General
El módulo de Gestión de Usuarios permite administrar a todas las personas que tienen acceso al sistema de inventario de Transportes Paquita. Este módulo es fundamental para la seguridad, trazabilidad y control de acceso a las diferentes funcionalidades del sistema.

## 🎯 Funcionalidades Principales

### 📋 Listado de Usuarios
- **Vista completa**: Consulta todos los usuarios registrados en el sistema
- **Búsqueda inteligente**: Localiza usuarios por nombre, email, apellido o número de documento
- **Interfaz organizada**: Iconos descriptivos y etiquetas en español
- **Información relevante**: Datos personales y de acceso organizados claramente

#### Columnas Disponibles:
- **👤 Nombre de Usuario**: Username utilizado para iniciar sesión
- **📧 Correo Electrónico**: Email principal del usuario
- **🆔 Nombre**: Nombre real de la persona
- **👨‍👩‍👧‍👦 Apellido**: Apellido(s) del usuario
- **📄 Tipo de Documento**: DNI, RUC o Carnet de Extranjería
- **🔢 Número de Documento**: Número de identificación oficial
- **📅 Fecha de Creación**: Cuándo se creó la cuenta (oculta por defecto)
- **🔄 Fecha de Actualización**: Última modificación (oculta por defecto)

### ➕ Crear Nuevo Usuario

#### Proceso completo paso a paso:
1. **Acceder**: Haz clic en "Nuevo" en la parte superior de la lista
2. **Sección "Datos del usuario"** - Distribución en dos columnas:

   **Información de Acceso:**
   - **👤 Nombre de Usuario** (Obligatorio)
     - Username único para iniciar sesión
     - Será usado para identificar al usuario en el sistema
     
   - **📧 Correo Electrónico** (Obligatorio)
     - Email principal de contacto
     - Validación automática de formato
     - Debe ser único en el sistema
     
   - **🔒 Contraseña** (Obligatorio solo al crear)
     - Contraseña segura para acceso al sistema
     - Se encripta automáticamente
     - Campo oculto por seguridad

   **Información Personal:**
   - **🆔 Nombre** (Opcional)
     - Nombre real de la persona
     
   - **👨‍👩‍👧‍👦 Apellido** (Opcional)
     - Apellido(s) del usuario
     
   - **📄 Tipo de Documento** (Opcional)
     - Selecciona entre: DNI, RUC, Carnet de Extranjería
     - Dropdown con opciones predefinidas
     
   - **🔢 Número de Documento** (Opcional)
     - Número de identificación oficial correspondiente

   **Permisos y Roles:**
   - **🔐 Roles** (Opcional)
     - Selección múltiple de roles disponibles
     - Búsqueda inteligente para encontrar roles
     - Precarga de roles existentes

3. **Validaciones automáticas**: Email único, username único, formato de contraseña
4. **Guardar**: Haz clic en "Crear" para registrar el nuevo usuario

### ✏️ Editar Usuario Existente

#### Modificación de información:
1. **Localizar**: Encuentra el usuario en la lista principal
2. **Acceder a edición**: Haz clic en el icono de lápiz (✏️) en color primario
3. **Actualizar información**:
   - **Información de acceso**: Modifica username, email
   - **Contraseña**: Campo opcional - solo completar si quieres cambiarla
   - **Datos personales**: Actualiza nombre, apellido, documentos
   - **Roles**: Asigna o remueve roles según necesidades

4. **Consideraciones especiales**:
   - La contraseña solo se actualiza si se ingresa un nuevo valor
   - Los cambios de roles afectan inmediatamente los permisos
   - El username debe mantenerse único

### 👁️ Ver Detalles del Usuario

#### Información completa disponible:
1. **Acceder**: Haz clic en el icono del ojo (👁️) en color informativo
2. **Visualización detallada**:
   - Información completa del usuario
   - Roles y permisos asignados
   - Historial de actividad en el sistema
   - Última fecha de acceso
   - Productos y transacciones asociadas

### 🗑️ Eliminar Usuario

#### Proceso seguro de eliminación:
1. **Seleccionar**: Haz clic en el icono de papelera (🗑️) en color de peligro
2. **Confirmación**: Sistema requiere confirmación explícita
3. **Validaciones de seguridad**:
   - Verificación de transacciones asociadas
   - Revisión de responsabilidades activas
   - Prevención de eliminación de administradores únicos

## 🔧 Funciones Avanzadas

### 🔍 Sistema de Búsqueda Integral
- **Búsqueda por username**: Localiza usuarios por nombre de usuario
- **Búsqueda por email**: Encuentra usando dirección de correo
- **Búsqueda por nombre real**: Busca por nombre y apellido
- **Búsqueda por documento**: Localiza por número de identificación
- **Filtrado en tiempo real**: Resultados instantáneos mientras escribes

### 📊 Gestión en Lote
- **Eliminación múltiple**: Selecciona y elimina varios usuarios simultáneamente
- **Validación masiva**: Verificación automática de dependencias
- **Protección de roles críticos**: Previene eliminación de administradores esenciales

### 🔐 Gestión de Seguridad
- **Encriptación de contraseñas**: Todas las contraseñas se almacenan encriptadas
- **Validación de roles**: Sistema de permisos basado en roles
- **Auditoría de accesos**: Registro completo de actividad de usuarios

## 💡 Mejores Prácticas de Gestión

### 🏗️ Creación de Usuarios
1. **Información mínima requerida**:
   - Username único y fácil de recordar
   - Email válido y activo
   - Contraseña segura (combinación de letras, números, símbolos)

2. **Datos adicionales recomendados**:
   - Nombre y apellido completos para identificación
   - Tipo y número de documento para trazabilidad
   - Roles apropiados según responsabilidades

3. **Seguridad de contraseñas**:
   - Mínimo 8 caracteres
   - Incluir mayúsculas, minúsculas, números
   - Cambio periódico recomendado

### 📝 Mantenimiento de Usuarios
1. **Revisión periódica**:
   - Verifica usuarios activos vs inactivos
   - Actualiza roles según cambios organizacionales
   - Confirma vigencia de emails de contacto

2. **Gestión de roles**:
   - Asigna roles mínimos necesarios (principio de menor privilegio)
   - Revisa permisos regularmente
   - Documenta cambios de roles importantes

## 🔗 Integración con el Sistema

### 📦 Trazabilidad de Operaciones
- **Entradas**: Cada entrada registra el usuario responsable
- **Salidas**: Seguimiento de quién autoriza y ejecuta salidas
- **Modificaciones**: Historial de cambios por usuario
- **Auditoría**: Trazabilidad completa de todas las operaciones

### 📊 Reportes de Usuario
- **Actividad por usuario**: Resumen de operaciones realizadas
- **Productividad**: Estadísticas de uso del sistema
- **Accesos**: Registro de sesiones y horarios

### 🔄 Workflow del Sistema
- **Autenticación**: Control de acceso basado en credenciales
- **Autorización**: Verificación de permisos por función
- **Registro**: Logging automático de todas las acciones

## ⚠️ Consideraciones de Seguridad

### 🚫 Restricciones Importantes
- **Username único**: No se permiten nombres de usuario duplicados
- **Email único**: Cada email solo puede estar asociado a un usuario
- **Roles obligatorios**: Al menos un administrador debe existir siempre
- **Eliminación protegida**: Usuarios con transacciones no pueden eliminarse

### 🔄 Políticas de Acceso
- **Sesión única**: Un usuario puede tener múltiples sesiones
- **Timeout automático**: Cierre de sesión por inactividad
- **Bloqueo por intentos**: Protección contra ataques de fuerza bruta

### 📈 Escalabilidad
- **Usuarios ilimitados**: Sistema preparado para crecimiento organizacional
- **Performance optimizada**: Búsquedas eficientes con gran cantidad de usuarios
- **Integración LDAP**: Preparado para futura integración con directorios empresariales

## 🔐 Roles y Permisos

### Tipos de Roles Típicos:
- **🔧 Super Administrador**: Acceso completo al sistema
- **📋 Administrador**: Gestión completa excepto configuración crítica
- **👤 Jefe de Almacén**: Gestión de inventario y usuarios operativos
- **📦 Supervisor**: Operaciones de inventario sin gestión de usuarios
- **👁️ Operador**: Consultas y operaciones básicas de inventario
- **📊 Auditor**: Solo lectura para revisiones y reportes

### Permisos Específicos por Módulo:
- **Usuarios**: Ver, crear, editar, eliminar usuarios
- **Productos**: Gestión completa del catálogo
- **Inventario**: Entradas, salidas, ajustes de stock
- **Reportes**: Generación y visualización de reportes
- **Configuración**: Acceso a configuraciones del sistema

### 🔒 Auditoría de Seguridad
- **Registro de cambios**: Todas las modificaciones quedan registradas
- **Acceso a datos**: Log de consultas y exportaciones
- **Cambios de roles**: Historial de modificaciones de permisos
- **Sesiones**: Registro de inicios y cierres de sesión

---
*Manual del Módulo de Usuarios - Sistema de Inventario Transportes Paquita*
