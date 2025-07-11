# 📦 Módulo de Gestión de Productos

## Descripción General
El módulo de Gestión de Productos es el corazón del sistema de inventario de Transportes Paquita. Permite registrar, organizar y administrar todos los productos del inventario, integrando información de áreas, categorías, marcas, proveedores y stock en una interfaz centralizada y eficiente.

## 🎯 Funcionalidades Principales

### 📋 Listado de Productos
- **Vista completa**: Consulta todos los productos registrados con información organizada por prioridad
- **Búsqueda avanzada**: Localiza productos por nombre, área, categoría, marca o proveedor
- **Ordenamiento inteligente**: Ordena por cualquier campo para análisis específicos
- **Filtros de fecha**: Utiliza filtros de rango de fechas para análisis temporal
- **Exportación**: Funcionalidad de exportación masiva de datos

#### Columnas Disponibles (organizadas por prioridad):
1. **📦 Nombre**: Nombre del producto (búsqueda habilitada)
2. **🏢 Área**: Área asignada al producto (peso 1)
3. **🏠 Subárea**: Subárea específica del producto (peso 1)
4. **🏷️ Categoría**: Categoría del producto (peso 2)
5. **📏 Medida**: Unidad de medida del stock (peso 2)
6. **📊 Stock**: Cantidad actual disponible (peso 2)
7. **⚠️ Mínimo**: Nivel mínimo de stock (badge rojo, peso 2)
8. **📈 Máximo**: Nivel máximo de stock (badge azul, peso 2)
9. **🏭 Marca**: Marca del producto (peso 3)
10. **🚚 Proveedor**: Proveedor del producto (peso 3)
11. **👤 Usuario**: Usuario responsable del registro (peso 4)
12. **📸 Foto**: Imagen del producto (circular)
13. **📅 Creado**: Fecha de creación (oculta por defecto)
14. **🔄 Actualizado**: Fecha de última actualización

### ➕ Crear Nuevo Producto

#### Proceso completo paso a paso:

**1. Sección "Referencias" (2 columnas)**

**🏢 Área** (Obligatorio)
- Selecciona el área donde se ubicará el producto
- Búsqueda inteligente con filtrado en tiempo real
- Icono de apilamiento 3D para identificación visual
- Al seleccionar área, se habilita la selección de subárea

**🏠 Subárea** (Opcional)
- Subárea específica dentro del área seleccionada
- Se filtra automáticamente según el área elegida
- Deshabilitado hasta seleccionar área
- Icono de casa moderna para identificación

**🏷️ Categoría** (Opcional)
- Clasificación del tipo de producto
- Búsqueda con filtrado por nombre y descripción
- Icono de etiqueta para identificación visual
- Búsqueda asincrónica para grandes catálogos

**🏭 Marca** (Opcional)
- Marca o fabricante del producto
- Búsqueda inteligente por nombre y descripción
- Icono de muestra de colores para identificación
- Integración con catálogo de marcas

**🚚 Proveedor** (Opcional)
- Proveedor que suministra el producto
- Búsqueda por nombre y email del proveedor
- Icono de camión para identificación
- Facilita trazabilidad de origen

**👤 Usuario Responsable**
- Usuario que registra el producto
- Campo deshabilitado, se asigna automáticamente
- Muestra el usuario actualmente logueado
- Icono de usuario para identificación

**2. Sección "Detalles del producto"**

**📦 Nombre del Producto** (Obligatorio)
- Nombre descriptivo y único del producto
- Máximo 255 caracteres
- Icono de bolsa de compras
- Campo de búsqueda principal del sistema

**📝 Descripción** (Opcional)
- Descripción detallada del producto
- Campo de texto expandible
- Ocupa ancho completo de la sección
- Información adicional para identificación

**📸 Foto del Producto** (Opcional)
- Imagen representativa del producto
- Formatos soportados: JPG, PNG, GIF
- Tamaño máximo: 1MB
- Editor de imágenes integrado
- Previsualización automática
- Almacenamiento en directorio `/uploads/productos`

**3. Sección "Información del Stock"**

**📏 Medida** (Opcional)
- Unidad de medida del producto (piezas, kg, litros, etc.)
- Campo de texto libre
- Importante para control de inventario

**📊 Cantidad Inicial** (Obligatorio)
- Stock inicial del producto
- Solo números positivos (mínimo 1)
- Icono de suma para identificación
- Mensaje de ayuda: "Debe ser mayor a 0"

**⚠️ Stock Mínimo** (Obligatorio)
- Nivel mínimo de alerta de stock
- Solo números positivos (mínimo 1)
- Icono de resta para identificación
- Genera alertas cuando el stock baja de este nivel

**📈 Stock Máximo** (Obligatorio)
- Nivel máximo recomendado de stock
- Solo números positivos (mínimo 1)
- Icono de suma para identificación
- Ayuda en planificación de compras

**4. Proceso de Creación Automática**
- Al crear el producto, se genera automáticamente un registro de stock
- Si no se especifican valores, se crean con valores por defecto (0)
- El sistema mantiene la integridad relacional automáticamente

### ✏️ Editar Producto Existente

#### Modificación completa:
1. **Localizar**: Encuentra el producto en la lista principal
2. **Acceder**: Haz clic en el icono de lápiz (✏️) en color primario
3. **Modificar cualquier sección**:
   - **Referencias**: Cambiar área, subárea, categoría, marca, proveedor
   - **Detalles**: Actualizar nombre, descripción, foto
   - **Stock**: Modificar medida, cantidad, mínimos y máximos

4. **Validaciones dinámicas**:
   - Subárea se filtra según área seleccionada
   - Validaciones de stock en tiempo real
   - Verificación de unicidad de nombres

5. **Impacto de cambios**:
   - Cambios en stock se reflejan inmediatamente
   - Modificaciones de área/subárea actualizan ubicación
   - Historial de cambios se mantiene para auditoría

### 👁️ Ver Detalles del Producto

#### Información completa disponible:
1. **Acceder**: Haz clic en el icono del ojo (👁️) en color informativo
2. **Vista integral**:
   - Información completa del producto con todas las relaciones
   - Historial de entradas y salidas del producto
   - Estadísticas de rotación y movimiento
   - Alertas de stock (si está por debajo del mínimo)
   - Datos del proveedor y área asignada
   - Usuario responsable del registro
   - Fechas de creación y última actualización

### 🗑️ Eliminar Producto

#### Proceso seguro de eliminación:
1. **Seleccionar**: Haz clic en el icono de papelera (🗑️) en color de peligro
2. **Validaciones críticas**:
   - Verificación de movimientos de stock existentes
   - Revisión de transacciones pendientes
   - Confirmación de eliminación de stock asociado

3. **Confirmación múltiple**: Sistema requiere confirmación explícita
4. **Eliminación en cascada**: Se elimina automáticamente el registro de stock asociado

## 🔧 Funciones Avanzadas

### 🔍 Sistema de Búsqueda y Filtros
- **Búsqueda por nombre**: Localización rápida por nombre de producto
- **Filtros de fecha**: Análisis temporal con rangos de fechas personalizables
- **Búsqueda relacional**: Encuentra productos por área, marca, categoría o proveedor
- **Filtrado en tiempo real**: Resultados instantáneos mientras escribes

### 📊 Exportación y Reportes
- **Exportación masiva**: Descarga datos de productos seleccionados
- **Formatos múltiples**: Excel, CSV, PDF según configuración
- **Filtros aplicados**: La exportación respeta los filtros activos
- **Datos relacionales**: Incluye información de áreas, marcas, proveedores

### 📈 Gestión de Stock Inteligente
- **Alertas automáticas**: Notificaciones cuando el stock está por debajo del mínimo
- **Códigos de color**: Visualización rápida de niveles de stock
- **Cálculos automáticos**: Actualización automática de stock con entradas/salidas
- **Trazabilidad completa**: Historial de todos los movimientos de stock

### 🔗 Integración Relacional
- **Dependencias dinámicas**: Subáreas se filtran según área seleccionada
- **Búsquedas inteligentes**: Opciones se filtran según criterios de búsqueda
- **Validaciones cruzadas**: Verificación de coherencia entre datos relacionados
- **Actualizaciones automáticas**: Cambios se propagan a módulos relacionados

## 💡 Mejores Prácticas de Gestión

### 🏗️ Estructura de Productos
1. **Organización jerárquica**:
   - Asigna área y subárea para ubicación física
   - Usa categorías para clasificación lógica
   - Especifica marca para identificación del fabricante
   - Registra proveedor para trazabilidad de origen

2. **Información completa**:
   - Nombres descriptivos y únicos
   - Descripciones detalladas para evitar confusiones
   - Fotos claras y representativas
   - Unidades de medida específicas y consistentes

3. **Gestión de stock efectiva**:
   - Define mínimos realistas según rotación
   - Establece máximos según capacidad de almacenamiento
   - Mantén cantidades iniciales precisas
   - Revisa y ajusta niveles periódicamente

### 📝 Mantenimiento del Catálogo
1. **Revisión periódica**:
   - Actualiza información de productos obsoletos
   - Verifica precisión de niveles de stock
   - Confirma vigencia de proveedores asignados
   - Optimiza estructura de áreas y categorías

2. **Calidad de datos**:
   - Mantén nombres consistentes y descriptivos
   - Actualiza fotos cuando sea necesario
   - Revisa y mejora descripciones
   - Elimina productos discontinuados

### 🔄 Workflow Operativo
1. **Proceso de alta**:
   - Verifica que no existe el producto previamente
   - Completa toda la información disponible
   - Asigna área y subárea correctas
   - Define niveles de stock apropiados

2. **Mantenimiento continuo**:
   - Actualiza stock según movimientos reales
   - Ajusta mínimos y máximos según experiencia
   - Mantén información de proveedores actualizada
   - Documenta cambios importantes

## 🔗 Integración con el Ecosistema

### 📦 Módulos Relacionados
- **Entradas**: Cada entrada aumenta el stock del producto
- **Salidas**: Cada salida disminuye el stock del producto
- **Áreas**: Ubicación física y organización espacial
- **Categorías**: Clasificación lógica para reportes y análisis
- **Marcas**: Identificación de fabricante y calidad
- **Proveedores**: Trazabilidad de origen y gestión de compras

### 📊 Reportes y Analytics
- **Rotación de productos**: Análisis de movimiento por producto
- **Niveles de stock**: Reportes de productos con stock crítico
- **Análisis por área**: Distribución de inventario por ubicación
- **Performance por marca**: Análisis de productos más/menos activos
- **Gestión de proveedores**: Evaluación de productos por proveedor

### 🔄 Automatizaciones
- **Creación de stock**: Automática al crear producto
- **Actualizaciones de stock**: Automáticas con entradas/salidas
- **Alertas de nivel**: Notificaciones automáticas por stock bajo
- **Validaciones**: Verificaciones automáticas de integridad

## ⚠️ Consideraciones Importantes

### 🚫 Restricciones del Sistema
- **Nombre único**: No se permiten productos con nombres duplicados
- **Stock positivo**: Todos los valores de stock deben ser positivos
- **Relaciones obligatorias**: Ciertos campos relacionales son requeridos
- **Eliminación protegida**: Productos con movimientos no pueden eliminarse

### 🔄 Mantenimiento Recomendado
- **Auditoría mensual**: Verificación de niveles de stock vs realidad física
- **Actualización trimestral**: Revisión de mínimos y máximos según rotación
- **Limpieza semestral**: Eliminación de productos obsoletos o discontinuados
- **Optimización anual**: Reorganización de estructura de áreas y categorías

### 📈 Escalabilidad y Performance
- **Productos ilimitados**: Sistema preparado para grandes catálogos
- **Búsquedas optimizadas**: Performance mantenida con miles de productos
- **Carga de imágenes**: Optimización automática de fotos subidas
- **Integración futura**: Preparado para códigos de barras y etiquetas

## 🔐 Seguridad y Permisos

### Niveles de Acceso:
- **👁️ Visualización**: Consultar catálogo y detalles de productos
- **➕ Creación**: Agregar nuevos productos al catálogo
- **✏️ Edición**: Modificar información de productos existentes
- **🗑️ Eliminación**: Eliminar productos (solo roles administrativos)
- **📊 Exportación**: Descargar datos de productos

### Roles Típicos:
- **🔧 Administrador**: Acceso completo a todas las funciones
- **📋 Jefe de Inventario**: Crear, editar y gestionar productos completos
- **👤 Supervisor**: Crear y editar productos, sin eliminación
- **📦 Operador de Almacén**: Consulta y actualización básica de stock
- **👁️ Auditor**: Solo lectura para verificaciones y reportes

### 🔒 Auditoría y Trazabilidad
- **Registro de cambios**: Historial completo de modificaciones por producto
- **Usuario responsable**: Identificación de quien creó/modificó cada producto
- **Timestamps**: Fecha y hora exacta de cada operación
- **Trazabilidad de stock**: Seguimiento completo de movimientos

---
*Manual del Módulo de Productos - Sistema de Inventario Transportes Paquita*
