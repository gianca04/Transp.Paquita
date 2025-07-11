# 🏷️ Módulo de Gestión de Categorías

## Descripción General
El módulo de Gestión de Categorías te permite organizar y clasificar los productos del inventario en diferentes categorías. Esta clasificación facilita la búsqueda, organización y gestión de los productos en el sistema.

## 🎯 Funcionalidades Principales

### 📋 Listado de Categorías
- **Visualización**: Consulta todas las categorías registradas en una tabla organizada
- **Búsqueda**: Utiliza la función de búsqueda para encontrar categorías específicas
- **Ordenamiento**: Ordena por nombre, descripción o fechas de creación/actualización
- **Navegación**: Interfaz intuitiva con iconos y etiquetas en español

#### Columnas Disponibles:
- **Nombre**: Nombre de la categoría
- **Descripción**: Descripción detallada de la categoría
- **Fecha de Creación**: Cuándo se registró la categoría
- **Fecha de Actualización**: Última modificación realizada

### ➕ Crear Nueva Categoría

#### Proceso paso a paso:
1. **Acceder**: Haz clic en el botón "Nuevo" en la parte superior
2. **Completar información**:
   - **Nombre**: Ingresa el nombre de la categoría (campo obligatorio)
   - **Descripción**: Añade una breve descripción de la categoría (opcional)

3. **Detalles del formulario**:
   - El campo nombre incluye un icono de etiqueta para mayor claridad
   - Los placeholders te guían sobre qué información ingresar
   - Validación automática para campos requeridos

4. **Guardar**: Haz clic en "Crear" para registrar la nueva categoría

### ✏️ Editar Categoría Existente

#### Cómo modificar una categoría:
1. **Localizar**: Encuentra la categoría en la lista
2. **Acceder**: Haz clic en el icono de lápiz (✏️) en las acciones
3. **Modificar**: Actualiza el nombre y/o descripción
4. **Guardar**: Confirma los cambios haciendo clic en "Actualizar"

#### Consideraciones al editar:
- Los cambios se reflejan automáticamente en todos los productos asociados
- El sistema mantiene un historial de las modificaciones
- No afecta el stock ni las relaciones existentes

### 👁️ Ver Detalles de la Categoría

#### Información disponible:
1. **Acceder**: Haz clic en el icono del ojo (👁️)
2. **Visualizar**:
   - Información completa de la categoría
   - Lista de productos que pertenecen a esta categoría
   - Estadísticas de uso
   - Historial de modificaciones

### 🗑️ Eliminar Categoría

#### Proceso de eliminación:
1. **Seleccionar**: Haz clic en el icono de papelera (🗑️)
2. **Confirmar**: El sistema solicitará confirmación
3. **Validación**: No podrás eliminar categorías con productos asociados

#### Antes de eliminar considera:
- Reasignar productos a otras categorías si es necesario
- Verificar que no hay dependencias en el sistema
- Crear respaldo si la información es crítica

## 🔧 Funciones Adicionales

### 🔍 Sistema de Búsqueda
- **Búsqueda por nombre**: Encuentra categorías por su nombre
- **Búsqueda por descripción**: Localiza categorías por palabras clave en la descripción
- **Filtro en tiempo real**: Los resultados se actualizan mientras escribes

### 📊 Acciones en Lote
- **Eliminación múltiple**: Selecciona y elimina varias categorías simultáneamente
- **Validación masiva**: El sistema verifica que las categorías seleccionadas puedan eliminarse

### 🎨 Interfaz de Usuario
- **Iconos intuitivos**: Cada acción tiene un icono representativo
- **Colores significativos**: 
  - Azul para ver detalles
  - Verde para editar
  - Rojo para eliminar
- **Navegación clara**: Agrupado en "Gestión de Inventarios y Productos"

## 💡 Mejores Prácticas

### 🏗️ Estructura de Categorías
1. **Nombres descriptivos**: Usa nombres claros y específicos
2. **Consistencia**: Mantén un patrón en la nomenclatura
3. **Jerarquía lógica**: Organiza las categorías de manera intuitiva
4. **Actualizaciones**: Revisa y actualiza regularmente las descripciones

### 📝 Gestión de Contenido
1. **Descripciones útiles**: Incluye información que ayude a identificar qué productos van en cada categoría
2. **Evita duplicados**: Verifica que no existan categorías similares antes de crear nuevas
3. **Planificación**: Define tu estructura de categorías antes de agregar productos

## 🔗 Integración con Otros Módulos

### 📦 Relación con Productos
- Cada producto debe tener una categoría asignada
- Las categorías facilitan la organización del inventario
- Permiten generar reportes por tipo de producto

### 📊 Reportes y Análisis
- Estadísticas de productos por categoría
- Análisis de rotación de inventario por categoría
- Identificación de categorías más/menos utilizadas

## ⚠️ Consideraciones Importantes

### 🚫 Restricciones
- No puedes eliminar categorías que tengan productos asociados
- Los nombres de categorías deben ser únicos
- Campo nombre es obligatorio, descripción es opcional

### 🔄 Mantenimiento
- Revisa periódicamente las categorías para mantener la organización
- Elimina categorías obsoletas (solo si no tienen productos)
- Actualiza descripciones según evolucionen los tipos de productos

## 🔐 Permisos y Acceso

### Niveles de Acceso:
- **Visualización**: Ver listado y detalles de categorías
- **Creación**: Agregar nuevas categorías al sistema
- **Edición**: Modificar categorías existentes
- **Eliminación**: Eliminar categorías (requiere permisos especiales)

### Roles Típicos:
- **Administrador**: Acceso completo a todas las funciones
- **Supervisor**: Crear, editar y ver categorías
- **Operador**: Solo visualización de categorías

---
*Manual del Módulo de Categorías - Sistema de Inventario Transportes Paquita*
