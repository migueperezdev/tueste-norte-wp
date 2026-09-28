# Tueste Norte — WordPress

Proyecto realizado durante la segunda semana de prácticas de DAW. Consiste en la adaptación a WordPress de la web Tueste Norte, dedicada al café de especialidad.

## Funcionalidades

- Página de inicio estática.
- Página “Quiénes somos”.
- Página de contacto.
- Página Blog para mostrar las entradas.
- Menú principal de navegación.
- Formulario creado con Contact Form 7.
- Optimización SEO mediante Yoast SEO.
- Campos personalizados creados con Advanced Custom Fields.
- Categoría “Cafés”.
- Cuatro fichas de cafés de especialidad.
- Una entrada normal de blog.
- Usuario “Marta” con perfil de Editor.
- Enlaces permanentes configurados con nombres amigables.
- Identidad visual personalizada mediante un tema hijo.

## Tema hijo

Se ha creado el tema hijo `tueste-norte`, basado en el tema Twenty Twenty-One.

El tema hijo contiene:

- `style.css`: información del tema y estilos personalizados.
- `functions.php`: carga de los estilos del tema padre y del tema hijo.
- `template-parts/content/content-single.php`: plantilla personalizada para mostrar las fichas de café.
- `acf-json`: configuración local de los campos personalizados de ACF.

La plantilla personalizada comprueba que la entrada pertenezca a la categoría “Cafés” antes de mostrar su ficha.

## Campos personalizados

El grupo de campos “Ficha de café” aparece únicamente en las entradas pertenecientes a la categoría “Cafés”.

Campos utilizados:

- `origen`: campo de texto.
- `notas_de_cata`: área de texto.
- `nivel_tueste`: selección entre claro, medio y oscuro.
- `precio`: campo numérico expresado en euros por 250 gramos.

La plantilla comprueba que cada campo tenga contenido antes de mostrarlo. También utiliza funciones de escape de WordPress para imprimir los datos de manera segura.

## Cafés publicados

- Sidamo Floral.
- Sierra Dulce.
- Cerrado Natural.
- Volcán de Antigua.

Además, se ha publicado la entrada normal de blog “Cómo conservar el café en casa”. Esta entrada no pertenece a la categoría “Cafés” y, por tanto, no muestra la ficha personalizada.

## Plugins utilizados

### Advanced Custom Fields

Categoría: gestión de contenido y campos personalizados.

Se utiliza para crear la ficha estructurada de cada café. Permite administrar el origen, las notas de cata, el nivel de tueste y el precio desde el editor de WordPress.

### Contact Form 7

Categoría: formularios de contacto.

Se utiliza para crear y validar el formulario de contacto con los campos nombre, correo electrónico y mensaje.

### Yoast SEO

Categoría: posicionamiento y optimización SEO.

Se utiliza para añadir herramientas de optimización SEO y configurar la representación general del sitio en los buscadores.

## Ejercicios previos

La carpeta `ejercicios/mi-child` contiene el tema hijo realizado en los ejercicios iniciales.

Este tema incluye estilos personalizados, carga de hojas de estilo mediante `functions.php`, una modificación del pie de página y una plantilla `page.php` que muestra campos personalizados de ACF.

## Instalación local

1. Instalar XAMPP e iniciar Apache y MySQL.
2. Instalar WordPress dentro de `C:\xampp\htdocs\tueste-norte-wp`.
3. Copiar los archivos del repositorio dentro de la instalación local.
4. Crear una base de datos para el proyecto desde phpMyAdmin.
5. Importar el archivo `db/tueste-norte.sql`.
6. Configurar en `wp-config.php` el nombre de la base de datos, el usuario y la contraseña.
7. Comprobar que el tema padre Twenty Twenty-One esté instalado.
8. Instalar y activar Advanced Custom Fields, Contact Form 7 y Yoast SEO.
9. Activar el tema hijo Tueste Norte.
10. Configurar los enlaces permanentes con la opción “Nombre de la entrada”.
11. Comprobar que “Inicio” esté seleccionada como portada estática y “Blog” como página de entradas.

La dirección local utilizada durante el desarrollo es:

[http://localhost/tueste-norte-wp/](http://localhost/tueste-norte-wp/)

## Depuración

Durante el desarrollo se utilizó `WP_DEBUG` con el valor `true` para detectar posibles errores de WordPress y PHP.

Esta configuración se encuentra en `wp-config.php`, archivo que no se incluye en el repositorio porque contiene datos de conexión propios de cada instalación.

## Base de datos

La copia de seguridad de la base de datos está disponible en:

`db/tueste-norte.sql`

Esta copia contiene las páginas, entradas, usuarios, configuraciones y campos personalizados necesarios para restaurar el sitio.

## Control de versiones

Se incluyen en el repositorio:

- La carpeta `wp-content` necesaria para el proyecto.
- Los temas hijos desarrollados.
- La carpeta `ejercicios`.
- La documentación y las capturas de pantalla de `docs`.
- La copia de la base de datos `db/tueste-norte.sql`.
- Los archivos `README.md` y `.gitignore`.

No se incluyen:

- Los archivos del núcleo de WordPress.
- Las carpetas `wp-admin` y `wp-includes`.
- El archivo `wp-config.php`, porque contiene configuración local y datos de conexión.
- La carpeta `wp-content/uploads`, porque contiene archivos subidos desde la instalación local.
- Archivos temporales del sistema operativo y de Visual Studio Code.

## Restauración y cambio de URL

Para restaurar el proyecto hay que instalar WordPress, copiar la carpeta `wp-content`, crear una base de datos e importar el archivo `db/tueste-norte.sql`.

Después se debe configurar `wp-config.php` con los datos de conexión de la nueva base de datos.

Si la dirección local es diferente de `http://localhost/tueste-norte-wp/`, deben actualizarse los valores `siteurl` y `home` de la tabla `wp_options`.

También debe realizarse una sustitución segura de la URL antigua por la nueva mediante WP-CLI o un plugin de búsqueda y reemplazo compatible con datos serializados.

Después del cambio de URL, se recomienda entrar en **Ajustes → Enlaces permanentes** y guardar de nuevo la configuración para regenerar las reglas de enlaces.

## Documentación

Las capturas de pantalla que demuestran la configuración y el funcionamiento del proyecto se encuentran en la carpeta `docs/capturas`.

## Repositorio

[https://github.com/migueperezdev/tueste-norte-wp](https://github.com/migueperezdev/tueste-norte-wp)

## Autor

Miguel Ángel Pérez Rodríguez
