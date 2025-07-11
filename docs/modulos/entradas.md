# 📥 Módulo de Gestión de Entradas

## Descripción General
El módulo de Gestión de Entradas permite registrar y controlar todos los ingresos de productos al inventario de Transportes Paquita. Este sistema mantiene la trazabilidad completa de las recepciones de mercancía, actualiza automáticamente el stock y proporciona funcionalidades avanzadas para entradas masivas.

## 🎯 Funcionalidades Principales

### 📋 Listado de Entradas
- **Vista organizada**: Consulta todas las entradas registradas con información priorizada
- **Búsqueda integral**: Localiza entradas por responsable, producto, fecha o documento
- **Filtros de fecha**: Análisis temporal con rangos de fechas personalizables
- **Exportación avanzada**: Descarga de datos filtrados en múltiples formatos
- **Actualización en tiempo real**: Stock actualizado automáticamente con cada entrada

#### Columnas Disponibles (organizadas por importancia):
1. **👤 Responsable**: Usuario que registra la entrada (peso 1)
2. **📦 Producto**: Nombre del producto ingresado
3. **➕ Ingresado**: Cantidad que ingresó al inventario (peso 3)
4. **📊 Cantidad Total**: Stock total actual después de la entrada
5. **📅 Fecha**: Fecha de la entrada (formato dd/mm/yyyy)
6. **⏰ Hora**: Hora específica del registro
7. **📄 Tipo de Documento**: Boleta, Factura o Guía
8. **🔢 Número de Documento**: Número del documento respaldatorio
9. **📅 Creado**: Fecha de registro en sistema (oculta por defecto)
10. **🔄 Actualizado**: Última modificación (oculta por defecto)

### ➕ Crear Nueva Entrada Individual

#### Proceso paso a paso:

**1. Información del Responsable**
**👤 Usuario Encargado** (Automático)
- Campo deshabilitado que muestra el usuario actual
- Se asigna automáticamente al usuario logueado
- Icono de usuario para identificación visual
- Garantiza trazabilidad de quien registra la entrada

**2. Selección del Producto**
**📦 Producto** (Obligatorio)
- Búsqueda inteligente por nombre o descripción
- Lista desplegable con todos los productos disponibles
- Búsqueda asincrónica para catálogos grandes
- Icono de cubo para identificación visual
- Placeholder: "Buscar producto"

**3. Información Temporal**
**📅 Fecha de Entrada** (Automático/Editable)
- Se asigna automáticamente la fecha actual
- Puede modificarse si la entrada fue en fecha diferente
- Icono de calendario para identificación
- Formato estándar del sistema

**⏰ Hora de Entrada** (Obligatorio)
- Se asigna automáticamente la hora actual
- Campo editable para correcciones
- Icono de reloj para identificación
- Placeholder: "Hora de salida" (mantenido para consistencia)

**4. Documentación Respaldatoria**
**📄 Tipo de Documento** (Obligatorio)
- Selección entre opciones predefinidas:
  - **BOLETA**: Para compras menores
  - **FACTURA**: Para compras comerciales
  - **GUÍA**: Para traslados y remisiones
- Lista desplegable nativa para selección rápida

**🔢 Número de Documento** (Obligatorio)
- Número del documento respaldatorio
- Máximo 255 caracteres
- Campo de texto libre para flexibilidad
- Importante para auditorías y seguimiento

**5. Cantidad de Entrada**
**➕ Cantidad** (Obligatorio)
- Cantidad de productos que ingresan al inventario
- Solo números positivos (mínimo 1)
- Icono de suma para identificación visual
- Mensaje de ayuda: "Debe ser mayor a 0"
- Actualiza automáticamente el stock del producto

### 📦 Entrada Masiva de Productos

#### Funcionalidad Avanzada:
1. **Acceder**: Botón "Entrada Masiva" en la parte superior de la lista
2. **Características**:
   - Registro de múltiples productos en una sola operación
   - Información común compartida (fecha, hora, responsable, documento)
   - Repetidor para agregar múltiples productos
   - Validación individual por producto
   - Procesamiento eficiente en lote

3. **Formulario de Entrada Masiva**:
   - **Información General**: Fecha, hora, tipo y número de documento
   - **Usuario**: Asignación automática del usuario logueado
   - **Lista de Productos**: Repetidor con campos individuales:
     - Producto (búsqueda inteligente)
     - Cantidad (validación mínima)
   - **Acciones**: Agregar/eliminar productos dinámicamente

4. **Procesamiento**:
   - Validación de stock disponible para cada producto
   - Actualización automática de inventario
   - Generación de registros individuales por producto
   - Notificaciones de éxito o errores específicos

### ✏️ Editar Entrada Existente

#### Modificación controlada:
1. **Localizar**: Encuentra la entrada en la lista principal
2. **Acceder**: Haz clic en el icono de lápiz (✏️) en color primario
3. **Campos modificables**:
   - **Fecha y hora**: Corrección de timestamps
   - **Documentación**: Actualización de tipo y número de documento
   - **Cantidad**: Modificación con recálculo automático de stock

4. **Validaciones especiales**:
   - Verificación de que la nueva cantidad no genere stock negativo
   - Recálculo automático del stock total
   - Verificación de coherencia temporal
   - Mantenimiento de trazabilidad de cambios

5. **Impacto de cambios**:
   - **Aumento de cantidad**: Incremento automático del stock
   - **Reducción de cantidad**: Disminución automática del stock
   - **Cambio de producto**: Transferencia de cantidades entre productos
   - **Historial**: Registro de modificaciones para auditoría

### 👁️ Ver Detalles de la Entrada

#### Información completa disponible:
1. **Acceder**: Haz clic en el icono del ojo (👁️) en color informativo
2. **Vista detallada**:
   - Información completa de la entrada
   - Datos del producto ingresado (con stock actual)
   - Información del responsable del registro
   - Documentación respaldatoria completa
   - Historial de modificaciones si las hay
   - Impacto en el stock total del producto
   - Fecha y hora exacta del registro

### 🗑️ Eliminar Entrada

#### Proceso seguro de eliminación:
1. **Seleccionar**: Haz clic en el icono de papelera (🗑️) en color de peligro
2. **Validaciones críticas**:
   - Verificación de que la eliminación no cause stock negativo
   - Revisión de dependencias con otras transacciones
   - Confirmación de impacto en inventario actual

3. **Confirmación múltiple**: Requiere confirmación explícita del usuario
4. **Reversión automática**: Al eliminar, se reduce automáticamente el stock del producto

## 🔧 Funciones Avanzadas

### 🔍 Sistema de Búsqueda y Filtros
- **Búsqueda por responsable**: Localiza entradas por usuario específico
- **Búsqueda por producto**: Encuentra todas las entradas de un producto
- **Filtro de fechas**: Rango personalizable para análisis temporal
- **Búsqueda por documento**: Localiza por tipo o número de documento
- **Filtrado combinado**: Múltiples criterios simultáneos

### 📊 Reportes y Exportación
- **Exportación masiva**: Descarga datos de entradas filtradas
- **Formato Excel**: Integración con herramientas de análisis
- **Datos relacionales**: Incluye información de productos y usuarios
- **Filtros aplicados**: Respeta los filtros activos en la exportación
- **Análisis temporal**: Reportes por períodos específicos

### 🔄 Automatizaciones del Sistema
- **Actualización de stock**: Automática con cada entrada registrada
- **Asignación de usuario**: Automática del usuario logueado
- **Timestamp**: Registro automático de fecha y hora
- **Validaciones**: Verificaciones automáticas de integridad
- **Notificaciones**: Alertas de éxito o errores en procesamiento

### 📈 Análisis de Inventario
- **Seguimiento de ingresos**: Historial completo por producto
- **Análisis de frecuencia**: Productos con más entradas
- **Evaluación de proveedores**: Indirecta a través de productos
- **Tendencias temporales**: Patrones de ingreso por períodos

## 💡 Mejores Prácticas de Uso

### 🏗️ Registro de Entradas
1. **Documentación completa**:
   - Siempre registra el documento respaldatorio
   - Utiliza el tipo correcto de documento
   - Mantén números de documento únicos y precisos
   - Registra la fecha y hora real de la entrada

2. **Precisión en cantidades**:
   - Verifica físicamente antes de registrar
   - Utiliza unidades de medida consistentes
   - Revisa el stock resultante para coherencia
   - Corrige inmediatamente cualquier error

3. **Uso de entrada masiva**:
   - Utiliza para recepciones grandes de múltiples productos
   - Mantén documentación común (fecha, proveedor, documento)
   - Verifica cada producto antes de confirmar
   - Aprovecha para actualizaciones eficientes de inventario

### 📝 Mantenimiento del Registro
1. **Revisión periódica**:
   - Verifica concordancia entre registros y stock físico
   - Audita documentación respaldatoria regularmente
   - Confirma que todas las entradas están documentadas
   - Revisa tendencias de ingreso por producto

2. **Corrección de errores**:
   - Corrige inmediatamente discrepancias detectadas
   - Utiliza la función de edición para ajustes menores
   - Documenta razones de cambios importantes
   - Mantén comunicación con el equipo sobre correcciones

### 🔄 Workflow Operativo
1. **Proceso de recepción**:
   - Verificación física de mercancía recibida
   - Cotejo con documentación del proveedor
   - Registro inmediato en el sistema
   - Confirmación de actualización de stock

2. **Control de calidad**:
   - Verificación de estado de productos recibidos
   - Registro de observaciones relevantes
   - Separación de productos defectuosos si es necesario
   - Comunicación de incidencias al área correspondiente

## 🔗 Integración con el Ecosistema

### 📦 Impacto en Módulos Relacionados
- **Productos**: Actualización automática de stock por cada entrada
- **Stock**: Incremento automático de cantidad disponible
- **Usuarios**: Trazabilidad de responsables de cada entrada
- **Reportes**: Datos para análisis de rotación y tendencias

### 📊 Reportes Derivados
- **Análisis de ingresos**: Estadísticas por producto, período, responsable
- **Evaluación de actividad**: Productos con mayor/menor rotación de entrada
- **Seguimiento temporal**: Tendencias de ingreso por períodos
- **Control de documentación**: Verificación de respaldos por tipo de documento

### 🔄 Automatizaciones Futuras
- **Integración con proveedores**: Registro automático desde órdenes de compra
- **Códigos de barras**: Lectura automática para agilizar registro
- **Notificaciones**: Alertas automáticas de recepciones esperadas
- **Validaciones avanzadas**: Verificación contra órdenes de compra

## ⚠️ Consideraciones Importantes

### 🚫 Restricciones del Sistema
- **Cantidades positivas**: Solo se permiten valores mayores a cero
- **Producto obligatorio**: Toda entrada debe asociarse a un producto existente
- **Usuario automático**: No se puede cambiar el usuario responsable
- **Documentación obligatoria**: Tipo y número de documento son requeridos

### 🔄 Validaciones Críticas
- **Stock coherente**: Verificación de que las operaciones mantengan coherencia
- **Fechas válidas**: No se permiten fechas futuras (configurable)
- **Documentos únicos**: Recomendación de no duplicar números de documento
- **Productos activos**: Solo productos activos pueden recibir entradas

### 📈 Consideraciones de Performance
- **Entradas masivas**: Optimización para procesamiento de múltiples productos
- **Búsquedas eficientes**: Índices optimizados para consultas frecuentes
- **Exportación**: Limitaciones apropiadas para evitar sobrecarga del sistema
- **Tiempo real**: Actualizaciones inmediatas de stock disponible

### 🔒 Seguridad y Auditoría
- **Trazabilidad completa**: Registro de usuario, fecha y hora de cada operación
- **Historial inmutable**: Los registros históricos no se pueden modificar
- **Respaldo documental**: Vinculación obligatoria con documentación física
- **Control de acceso**: Permisos diferenciados por rol de usuario

## 🔐 Permisos y Roles

### Niveles de Acceso Recomendados:
- **👁️ Visualización**: Consultar historial de entradas y stock
- **➕ Registro Individual**: Crear entradas de productos individuales
- **📦 Entrada Masiva**: Acceso a funcionalidad de entrada masiva
- **✏️ Edición**: Modificar entradas existentes (con restricciones)
- **🗑️ Eliminación**: Eliminar entradas (solo roles administrativos)
- **📊 Exportación**: Descargar reportes y análisis

### Roles Típicos:
- **🔧 Administrador de Inventario**: Acceso completo a todas las funciones
- **📦 Jefe de Almacén**: Registro, edición y entrada masiva
- **👤 Supervisor de Recepción**: Registro individual y consultas
- **📥 Operador de Entrada**: Solo registro de entradas individuales
- **👁️ Auditor**: Solo consulta para verificaciones y reportes

### 🔒 Controles de Seguridad
- **Registro automático**: Usuario responsable se asigna automáticamente
- **Timestamps inmutables**: Fecha y hora de registro no modificables
- **Trazabilidad completa**: Historial de todos los cambios realizados
- **Validación de permisos**: Verificación de autorización para cada operación

---
*Manual del Módulo de Entradas - Sistema de Inventario Transportes Paquita*
