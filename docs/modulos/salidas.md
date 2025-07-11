# 📤 Módulo de Gestión de Salidas

## Descripción General
El módulo de Gestión de Salidas permite registrar y controlar todas las salidas de productos del inventario de Transportes Paquita. Este sistema mantiene la trazabilidad completa de los despachos, actualiza automáticamente el stock, gestiona diferentes tipos de salidas y proporciona funcionalidades avanzadas para salidas masivas.

## 🎯 Funcionalidades Principales

### 📋 Listado de Salidas
- **Vista organizada**: Consulta todas las salidas registradas con información priorizada por peso
- **Búsqueda integral**: Localiza salidas por responsable, producto, destino o tipo de despacho
- **Filtros de fecha**: Análisis temporal con rangos de fechas personalizables
- **Exportación avanzada**: Descarga de datos filtrados en múltiples formatos
- **Actualización automática**: Stock disminuido automáticamente con cada salida

#### Columnas Disponibles (organizadas por importancia):
1. **👤 Responsable**: Usuario que autoriza/registra la salida (peso 1)
2. **📦 Producto**: Nombre del producto despachado
3. **➖ Retirado**: Cantidad que salió del inventario (peso 3)
4. **📊 Cantidad Total**: Stock total actual después de la salida
5. **📅 Fecha**: Fecha de la salida (formato dd/mm/yyyy, peso 4)
6. **⏰ Hora**: Hora específica del despacho (peso 5)
7. **📍 Destino**: Lugar o cliente de destino (peso 6)
8. **🚛 Tipo de Despacho**: Clasificación del tipo de salida (peso 7)
9. **📅 Creado**: Fecha de registro en sistema (peso 8, oculta)
10. **🔄 Actualizado**: Última modificación (peso 9, oculta)

### ➕ Crear Nueva Salida Individual

#### Proceso completo paso a paso:

**Sección: "Datos de la salida"**

**1. Información del Responsable**
**👤 Usuario Encargado** (Automático)
- Campo deshabilitado que muestra el usuario actual
- Se asigna automáticamente al usuario logueado
- Icono de usuario para identificación visual
- Garantiza trazabilidad de quien autoriza la salida

**2. Selección del Producto**
**📦 Producto** (Obligatorio)
- Búsqueda inteligente por nombre o descripción
- Lista desplegable con productos disponibles en stock
- Búsqueda asincrónica para catálogos grandes
- Icono de cubo para identificación visual
- Placeholder: "Información del producto"

**3. Cantidad de Salida**
**➖ Cantidad** (Obligatorio)
- Cantidad de productos que salen del inventario
- Solo números positivos (mínimo 1)
- Icono de resta para identificación visual
- Mensaje de ayuda: "Debe ser mayor a 0"
- Validación automática contra stock disponible
- Actualiza automáticamente el stock del producto

**4. Información Temporal**
**📅 Fecha de Salida** (Automático/Editable)
- Se asigna automáticamente la fecha actual
- Puede modificarse para registros retroactivos
- Icono de calendario para identificación
- Formato estándar del sistema

**⏰ Hora de Salida** (Obligatorio)
- Se asigna automáticamente la hora actual
- Campo editable para ajustes precisos
- Icono de reloj para identificación
- Importante para trazabilidad temporal

**5. Información de Destino**
**📍 Destino** (Obligatorio)
- Lugar, cliente o área de destino de la mercancía
- Campo de texto libre (máximo 255 caracteres)
- Icono de marcador de ubicación
- Placeholder: "Destino de la mercancía"
- Fundamental para trazabilidad de distribución

**6. Clasificación del Despacho**
**🚛 Tipo de Despacho** (Opcional)
- Selección entre tipos predefinidos:
  - **Envío a Cliente**: Despachos a clientes externos
  - **Transferencia entre Almacenes**: Movimientos internos
  - **Devolución a Proveedor**: Productos devueltos
  - **Merma o Pérdida**: Productos dañados o perdidos
  - **Otros**: Casos especiales no clasificados
- Lista desplegable nativa para selección rápida
- Icono de camión para identificación

### 📦 Salida Masiva de Productos

#### Funcionalidad Avanzada:
1. **Acceder**: Botón "Salida Masiva" en la parte superior de la lista
2. **Características**:
   - **Icono**: Camión para identificación visual
   - **Color**: Advertencia (amarillo/naranja) para indicar operación especial
   - **Modal amplio**: Ventana de 7xl para mejor visualización
   - **Descripción**: "Registra múltiples productos para un mismo despacho o envío"

3. **Información Común Compartida**:
   - **Fecha y hora**: Misma para todos los productos
   - **Destino**: Destino común para todo el despacho
   - **Tipo de despacho**: Clasificación única para toda la operación
   - **Responsable**: Usuario logueado automáticamente asignado

4. **Lista de Productos (Repetidor)**:
   - **Selección de producto**: Búsqueda individual por producto
   - **Cantidad**: Cantidad específica para cada producto
   - **Validación independiente**: Verificación de stock para cada item
   - **Agregar/Eliminar**: Gestión dinámica de productos en la lista

5. **Procesamiento Inteligente**:
   - **Validación en lote**: Verificación de stock disponible para todos los productos
   - **Actualización masiva**: Actualización automática de inventario
   - **Transacción atómica**: Todo se procesa correctamente o nada se registra
   - **Notificaciones específicas**: Alertas de éxito o errores por producto

### ✏️ Editar Salida Existente

#### Modificación controlada:
1. **Localizar**: Encuentra la salida en la lista principal
2. **Acceder**: Haz clic en el icono de lápiz (✏️) en color primario
3. **Campos modificables**:
   - **Cantidad**: Ajuste con recálculo automático de stock
   - **Fecha y hora**: Corrección de timestamps si es necesario
   - **Destino**: Actualización de información de destino
   - **Tipo de despacho**: Reclasificación del tipo de salida

4. **Validaciones especiales**:
   - **Stock disponible**: Verificación de que los cambios no generen inconsistencias
   - **Recálculo automático**: Ajuste del stock según nueva cantidad
   - **Coherencia temporal**: Verificación de fechas lógicas
   - **Trazabilidad**: Registro de modificaciones para auditoría

5. **Impacto de cambios**:
   - **Aumento de cantidad**: Mayor reducción del stock
   - **Reducción de cantidad**: Menor reducción del stock (recuperación parcial)
   - **Cambio de producto**: Transferencia entre productos (cuidado especial)
   - **Historial**: Registro completo de modificaciones

### 👁️ Ver Detalles de la Salida

#### Información completa disponible:
1. **Acceder**: Haz clic en el icono del ojo (👁️) en color informativo
2. **Vista integral**:
   - **Información completa**: Todos los datos de la salida
   - **Producto despachado**: Detalles del producto con stock actual
   - **Responsable**: Información del usuario que autorizó la salida
   - **Destino y tipo**: Información completa de distribución
   - **Impacto en stock**: Cómo afectó el inventario total
   - **Historial**: Modificaciones realizadas si las hay
   - **Timestamps**: Fecha y hora exacta de registro y modificaciones

### 🗑️ Eliminar Salida

#### Proceso seguro de eliminación:
1. **Seleccionar**: Haz clic en el icono de papelera (🗑️) en color de peligro
2. **Validaciones críticas**:
   - **Verificación de dependencias**: Revisión de transacciones relacionadas
   - **Impacto en stock**: Confirmación de que la eliminación es segura
   - **Estado actual**: Verificación del estado actual del inventario

3. **Confirmación múltiple**: Requiere confirmación explícita del usuario
4. **Reversión automática**: Al eliminar, se incrementa automáticamente el stock del producto

## 🔧 Funciones Avanzadas

### 🔍 Sistema de Búsqueda y Filtros
- **Búsqueda por responsable**: Localiza salidas por usuario específico
- **Búsqueda por producto**: Encuentra todas las salidas de un producto
- **Búsqueda por destino**: Localiza envíos a destinos específicos
- **Filtro por tipo de despacho**: Clasifica por tipo de salida
- **Filtro de fechas**: Rango personalizable para análisis temporal
- **Búsqueda combinada**: Múltiples criterios simultáneos

### 📊 Reportes y Exportación
- **Exportación masiva**: Descarga datos de salidas filtradas
- **Formato Excel**: Integración con herramientas de análisis externas
- **Datos relacionales**: Incluye información de productos, usuarios y destinos
- **Filtros aplicados**: Respeta los filtros activos en la exportación
- **Análisis de distribución**: Reportes por destino y tipo de despacho

### 🔄 Automatizaciones del Sistema
- **Actualización de stock**: Automática con cada salida registrada
- **Asignación de usuario**: Automática del usuario logueado
- **Timestamp automático**: Registro de fecha y hora actual
- **Validaciones de stock**: Verificación automática de disponibilidad
- **Notificaciones**: Alertas de éxito, errores o stock insuficiente

### 📈 Análisis de Distribución
- **Seguimiento de salidas**: Historial completo por producto
- **Análisis de destinos**: Productos más enviados por destino
- **Evaluación de tipos**: Distribución por tipo de despacho
- **Tendencias temporales**: Patrones de salida por períodos
- **Control de stock**: Monitoreo de niveles después de salidas

## 💡 Mejores Prácticas de Uso

### 🏗️ Registro de Salidas
1. **Información precisa**:
   - Verifica disponibilidad de stock antes de registrar
   - Utiliza destinos específicos y descriptivos
   - Registra la fecha y hora real de la salida
   - Clasifica correctamente el tipo de despacho

2. **Validación física**:
   - Confirma físicamente la salida antes de registrar
   - Verifica que el producto corresponde al seleccionado
   - Cuenta exactamente la cantidad despachada
   - Documenta cualquier observación relevante

3. **Uso de salida masiva**:
   - Ideal para despachos de múltiples productos al mismo destino
   - Utiliza para transferencias entre almacenes
   - Aprovecha para envíos completos a clientes
   - Mantén coherencia en fecha, destino y tipo de despacho

### 📝 Gestión de Destinos
1. **Consistencia en nomenclatura**:
   - Utiliza nombres estándar para destinos frecuentes
   - Mantén formato uniforme (ej: "Sucursal Central", "Cliente ABC")
   - Evita abreviaciones confusas
   - Incluye información de ubicación si es relevante

2. **Clasificación de tipos**:
   - **Envío a Cliente**: Para ventas y entregas comerciales
   - **Transferencia**: Para movimientos entre ubicaciones propias
   - **Devolución**: Para productos que regresan a proveedores
   - **Merma**: Para productos dañados, vencidos o perdidos
   - **Otros**: Solo para casos especiales bien documentados

### 🔄 Control de Inventario
1. **Verificación de stock**:
   - Confirma disponibilidad antes de programar salidas
   - Revisa niveles mínimos después de salidas importantes
   - Identifica productos con rotación alta para reposición
   - Monitorea productos que se acercan a stock mínimo

2. **Planificación de despachos**:
   - Agrupa salidas por destino cuando sea posible
   - Programa salidas considerando disponibilidad de transporte
   - Coordina con áreas de compras para reposición oportuna
   - Mantén comunicación con clientes sobre disponibilidad

## 🔗 Integración con el Ecosistema

### 📦 Impacto en Módulos Relacionados
- **Productos**: Actualización automática de stock por cada salida
- **Stock**: Disminución automática de cantidad disponible
- **Usuarios**: Trazabilidad de responsables de cada salida
- **Entradas**: Balanceado con entradas para control de inventario
- **Reportes**: Datos para análisis de rotación y distribución

### 📊 Reportes Derivados
- **Análisis de salidas**: Estadísticas por producto, período, destino
- **Evaluación de rotación**: Productos con mayor/menor movimiento de salida
- **Seguimiento de destinos**: Análisis de distribución por ubicación
- **Control de tipos**: Estadísticas por tipo de despacho
- **Balance de inventario**: Comparación entre entradas y salidas

### 🔄 Integraciones Futuras
- **Sistemas de transporte**: Conexión con gestión de flota y entregas
- **CRM de clientes**: Integración con información de clientes
- **Códigos de barras**: Lectura automática para agilizar despachos
- **Firmas digitales**: Confirmación digital de recepciones
- **GPS tracking**: Seguimiento de entregas en tiempo real

## ⚠️ Consideraciones Importantes

### 🚫 Restricciones del Sistema
- **Cantidades positivas**: Solo se permiten valores mayores a cero
- **Stock disponible**: No se puede despachar más de lo disponible
- **Producto obligatorio**: Toda salida debe asociarse a un producto existente
- **Usuario automático**: No se puede cambiar el usuario responsable
- **Destino obligatorio**: Campo requerido para trazabilidad

### 🔄 Validaciones Críticas
- **Stock suficiente**: Verificación automática de disponibilidad antes de confirmar
- **Fechas válidas**: Validación de coherencia temporal
- **Productos activos**: Solo productos activos pueden tener salidas
- **Integridad relacional**: Mantenimiento de consistencia entre módulos

### 📈 Consideraciones de Performance
- **Salidas masivas**: Optimización para procesamiento de múltiples productos
- **Búsquedas eficientes**: Índices optimizados para consultas frecuentes
- **Validaciones rápidas**: Verificaciones de stock en tiempo real
- **Exportación controlada**: Limitaciones apropiadas para evitar sobrecarga

### 🔒 Seguridad y Auditoría
- **Trazabilidad completa**: Registro de usuario, fecha y hora de cada operación
- **Historial inmutable**: Los registros históricos conservan integridad
- **Control de stock**: Validaciones estrictas para evitar inconsistencias
- **Autorización**: Verificación de permisos para cada tipo de operación

## 🔐 Permisos y Roles

### Niveles de Acceso Recomendados:
- **👁️ Visualización**: Consultar historial de salidas y stock
- **➕ Registro Individual**: Crear salidas de productos individuales
- **📦 Salida Masiva**: Acceso a funcionalidad de salida masiva
- **✏️ Edición**: Modificar salidas existentes (con restricciones temporales)
- **🗑️ Eliminación**: Eliminar salidas (solo roles administrativos, tiempo limitado)
- **📊 Exportación**: Descargar reportes y análisis

### Roles Típicos:
- **🔧 Administrador de Inventario**: Acceso completo a todas las funciones
- **📦 Jefe de Almacén**: Registro, edición y salida masiva
- **🚛 Supervisor de Despacho**: Registro individual y masivo, consultas
- **📤 Operador de Salida**: Solo registro de salidas individuales
- **👁️ Auditor**: Solo consulta para verificaciones y reportes
- **📊 Analista**: Consultas y exportación para análisis de negocio

### 🔒 Controles de Seguridad
- **Registro automático**: Usuario responsable se asigna automáticamente
- **Validación de stock**: Verificación obligatoria de disponibilidad
- **Timestamps inmutables**: Fecha y hora de registro protegidas
- **Trazabilidad completa**: Historial de todos los cambios realizados
- **Autorización por operación**: Verificación de permisos específicos

### 🚨 Alertas y Notificaciones
- **Stock bajo**: Alerta cuando productos llegan a nivel mínimo
- **Stock insuficiente**: Notificación al intentar despachar más de lo disponible
- **Salidas masivas**: Confirmación de procesamiento exitoso o errores
- **Modificaciones**: Notificación de cambios en salidas existentes

---
*Manual del Módulo de Salidas - Sistema de Inventario Transportes Paquita*
