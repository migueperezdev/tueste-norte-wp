# Tueste Norte — WordPress

Proyecto desarrollado durante la segunda y tercera semana de prácticas de DAW. Consiste en la adaptación a WordPress de la web Tueste Norte, dedicada al café de especialidad.

Durante la Semana 2 se trabajó con un tema hijo, plugins, páginas, entradas y campos personalizados. En la Semana 3 se desarrolló un tema propio, un plugin personalizado y un catálogo dinámico de cafés.

## Funcionalidades

- Página de inicio estática.
- Página «Quiénes somos».
- Página de contacto.
- Página Blog para mostrar las entradas.
- Menú principal de navegación.
- Enlace directo al catálogo de cafés.
- Formulario creado con Contact Form 7.
- Optimización SEO mediante Yoast SEO.
- Campos personalizados administrados mediante Advanced Custom Fields.
- Tipo de contenido personalizado `cafe`.
- Catálogo dinámico disponible en `/cafes/`.
- Fichas individuales para cada café.
- Imágenes destacadas.
- Identificación del «Tueste de la semana».
- API REST personalizada para consultar los cafés.
- Diseño adaptable a diferentes tamaños de pantalla.
- Usuario «Marta» con perfil de Editor.
- Enlaces permanentes configurados con nombres amigables.
- Control de versiones mediante Git y GitHub.

## Tema propio

El tema activo se encuentra en:

`wp-content/themes/tueste-norte-propio`

Se trata de un tema propio desarrollado para trabajar la jerarquía de plantillas de WordPress.

### Archivos principales

- `style.css`: información del tema, estilos generales, catálogo y fichas de cafés.
- `functions.php`: configuración del tema, carga de estilos, soporte para imágenes destacadas y registro del menú.
- `header.php`: cabecera, nombre del sitio y menú principal.
- `footer.php`: pie de página.
- `index.php`: plantilla general y página de respaldo.
- `page.php`: muestra el contenido completo de las páginas estáticas.
- `single.php`: plantilla para las entradas normales del blog.
- `archive-cafe.php`: catálogo de cafés.
- `single-cafe.php`: ficha individual de cada café.

## Jerarquía de plantillas

WordPress selecciona automáticamente la plantilla adecuada según el contenido solicitado.

- Las entradas normales utilizan `single.php`.
- El archivo del tipo de contenido `cafe` utiliza `archive-cafe.php`.
- Los cafés individuales utilizan `single-cafe.php`.
- `index.php` actúa como plantilla general de respaldo.
- Las páginas estáticas utilizan `page.php`.

El catálogo se encuentra en:

`http://localhost/tueste-norte-wp/cafes/`

## Plugin TN Cafés

El plugin personalizado se encuentra en:

`wp-content/plugins/tn-cafes/tn-cafes.php`

Este plugin se encarga de:

- Registrar el tipo de contenido personalizado `cafe`.
- Crear el archivo público con la dirección `/cafes/`.
- Habilitar el editor, el extracto y la imagen destacada.
- Mostrar la sección «Cafés» en el escritorio de WordPress.
- Registrar los campos personalizados mediante ACF.
- Mostrar la etiqueta «Tueste de la semana».
- Exponer los cafés y sus datos en la API REST.
- Regenerar las reglas de enlaces al activar y desactivar el plugin.

### Decisión sobre el «Tueste de la semana»

Para implementar el «Tueste de la semana» se ha utilizado un campo ACF de tipo verdadero/falso llamado `tueste_semana`.

Esta solución permite que el equipo de Tueste Norte marque o desmarque el café destacado directamente desde el editor de WordPress, sin modificar código. Se eligió porque integra esta función en la misma pantalla donde se administran los datos de cada café y resulta sencilla para el cliente.

## Tipo de contenido Café

El tipo de contenido personalizado utiliza el identificador:

`cafe`

Sus principales características son:

- Es público.
- Dispone de archivo propio.
- Utiliza el slug `cafes`.
- Permite título, editor, extracto e imagen destacada.
- Está disponible mediante la API REST de WordPress.

## Campos personalizados

El grupo «Datos del café» aparece únicamente al editar contenidos del tipo `cafe`.

Campos utilizados:

- `origen`: procedencia del café.
- `notas_cata`: sabores y aromas principales.
- `nivel_tueste`: selección entre claro, medio y oscuro.
- `precio`: precio expresado en euros.
- `tueste_semana`: indica si el café está destacado durante la semana.

Las plantillas comprueban que cada campo tenga contenido antes de mostrarlo y utilizan funciones de escape de WordPress para imprimir los datos de manera segura.

## Cafés publicados

- Sidamo Floral.
- Sierra Dulce.
- Cerrado Natural.
- Volcán de Antigua.

Volcán de Antigua está seleccionado como «Tueste de la semana».

Cada café contiene:

- Título.
- Descripción completa.
- Extracto.
- Imagen destacada.
- Origen.
- Notas de cata.
- Nivel de tueste.
- Precio.
- Enlace a su ficha individual.

## Catálogo de cafés

La plantilla `archive-cafe.php` muestra los cafés mediante tarjetas.

Cada tarjeta incluye:

- Imagen destacada.
- Nombre del café.
- Etiqueta «Tueste de la semana» cuando corresponde.
- Campos personalizados.
- Extracto.
- Botón «Ver café».

El catálogo utiliza un diseño adaptable que reorganiza las tarjetas según el ancho de la pantalla.

## Fichas individuales

La plantilla `single-cafe.php` muestra:

- Nombre del café.
- Fecha de publicación.
- Imagen destacada.
- Origen.
- Notas de cata.
- Nivel de tueste.
- Precio.
- Descripción completa.
- Botón para volver al catálogo.

## API REST

Los cafés pueden consultarse desde la API REST de WordPress.

Endpoint utilizado:

`http://localhost/tueste-norte-wp/wp-json/wp/v2/cafes`

Además de los datos habituales de WordPress, la respuesta incluye:

- `origen`.
- `notas_cata`.
- `nivel_tueste`.
- `precio`.
- `tueste_semana`.
- `imagen_destacada`.

Ejemplo recortado de una respuesta JSON real:

```json
[
    {
        "id": 65,
        "slug": "sidamo-floral",
        "title": {
            "rendered": "Sidamo Floral"
        },
        "acf": {
            "origen": "Sidamo, Etiopía",
            "notas_cata": "Jazmín, bergamota y arándanos",
            "nivel_tueste": "claro",
            "precio": "14.5",
            "tueste_semana": false
        },
        "imagen_destacada": "http://localhost/tueste-norte-wp/wp-content/uploads/2026/10/sidamo-floral.avif"
    }
]
```

## Plugins utilizados

### TN Cafés

Categoría: plugin personalizado.

Registra el tipo de contenido `cafe`, los campos ACF, el tueste de la semana y los datos adicionales de la API REST.

### TN Ejercicios

Categoría: plugin personalizado para los ejercicios de asimilación.

Utiliza el filtro `excerpt_length` para limitar los resúmenes automáticos a 20 palabras y la acción `wp_footer` para imprimir un comentario HTML con la fecha en que se sirve la página.

### Advanced Custom Fields

Categoría: gestión de contenido y campos personalizados.

Permite administrar los datos estructurados de cada café desde el editor de WordPress.

### Contact Form 7

Categoría: formularios de contacto.

Se utiliza para crear y validar el formulario de contacto con los campos nombre, correo electrónico y mensaje.

### Yoast SEO

Categoría: posicionamiento y optimización SEO.

Se utiliza para configurar herramientas de optimización SEO y la representación general del sitio en los buscadores.

## Entrada de blog

Se ha publicado la entrada:

`Cómo conservar el café en casa`

Esta entrada utiliza `single.php` y no muestra los campos personalizados de los cafés.

## Ejercicios previos

La carpeta `ejercicios/mi-child` contiene el tema hijo realizado durante los ejercicios iniciales.

También se conserva el tema hijo `tueste-norte`, basado en Twenty Twenty-One, desarrollado durante la Semana 2.

Estos ejercicios incluyen:

- Carga de hojas de estilo mediante `functions.php`.
- Modificación del pie de página.
- Plantillas personalizadas.
- Campos personalizados de ACF.
- Configuración local mediante `acf-json`.

El tema utilizado en la Semana 3 es `tueste-norte-propio`.

## Instalación local

1. Instalar XAMPP.
2. Iniciar Apache y MySQL.
3. Instalar WordPress en `C:\xampp\htdocs\tueste-norte-wp`.
4. Copiar los archivos del repositorio dentro de la instalación local.
5. Crear una base de datos desde phpMyAdmin.
6. Importar `db/tueste-norte.sql`.
7. Configurar en `wp-config.php` el nombre de la base de datos, el usuario y la contraseña.
8. Instalar y activar Advanced Custom Fields, Contact Form 7 y Yoast SEO.
9. Activar los plugins TN Cafés y TN Ejercicios.
10. Activar el tema Tueste Norte Propio.
11. Configurar los enlaces permanentes con la opción «Nombre de la entrada».
12. Comprobar que «Inicio» esté seleccionada como portada estática y «Blog» como página de entradas.
13. Comprobar que el menú esté asignado a la ubicación «Menú principal».

La dirección local utilizada durante el desarrollo es:

`http://localhost/tueste-norte-wp/`

## Depuración

Durante el desarrollo se utilizó `WP_DEBUG` con el valor `true` para detectar errores de WordPress y PHP.

Esta configuración se encuentra en `wp-config.php`, archivo que no se incluye en el repositorio porque contiene datos de conexión propios de cada instalación.

## Base de datos

La copia de seguridad está disponible en:

`db/tueste-norte.sql`

Esta copia contiene:

- Páginas.
- Entradas.
- Cafés.
- Campos personalizados.
- Menús.
- Usuarios.
- Configuración del sitio.
- Configuración de los plugins.

Los archivos de la biblioteca de medios no forman parte de la base de datos. Por este motivo, las imágenes necesarias para reproducir el proyecto también se incluyen en `wp-content/uploads/2026/09` y `wp-content/uploads/2026/10`.

## Control de versiones

Se incluyen en el repositorio:

- La carpeta `wp-content` necesaria para el proyecto.
- Los temas desarrollados.
- Los plugins personalizados TN Cafés y TN Ejercicios.
- La carpeta `ejercicios`.
- La documentación de `docs`.
- La copia de la base de datos.
- `README.md`.
- `.gitignore`.
- Las imágenes necesarias para reproducir el sitio.

No se incluyen:

- Los archivos del núcleo de WordPress.
- Las carpetas `wp-admin` y `wp-includes`.
- `wp-config.php`.
- Otros archivos de `wp-content/uploads` que no sean necesarios para el proyecto, incluida la carpeta temporal `wpcf7_uploads`.
- Archivos temporales del sistema operativo.
- La configuración personal de Visual Studio Code.

## Restauración y cambio de URL

Para restaurar el proyecto:

1. Instalar WordPress.
2. Copiar la carpeta `wp-content`.
3. Crear una base de datos.
4. Importar `db/tueste-norte.sql`.
5. Configurar `wp-config.php`.
6. Activar el tema y los plugins necesarios.
7. Guardar nuevamente los enlaces permanentes.

Si la dirección local es diferente de `http://localhost/tueste-norte-wp/`, deben actualizarse los valores `siteurl` y `home` de la tabla `wp_options`.

También debe realizarse una sustitución segura de la URL antigua mediante WP-CLI o una herramienta compatible con datos serializados.

## Documentación

Las capturas que demuestran la configuración y el funcionamiento del proyecto se encuentran en:

`docs/capturas`

Entre las evidencias se incluyen:

- Tema propio.
- Plugin personalizado.
- Tipo de contenido Café.
- Campos personalizados.
- Catálogo de cafés.
- Ficha individual.
- Tueste de la semana.
- API REST.
- Historial de Git.
- Estado final del repositorio.

## Repositorio

[Repositorio Tueste Norte en GitHub](https://github.com/migueperezdev/tueste-norte-wp)

## Autor

Miguel Ángel Pérez Rodríguez