# Tueste Norte — WordPress

Proyecto realizado durante la segunda semana de prácticas de DAW. Consiste en la adaptación a WordPress de la web Tueste Norte, dedicada al café de especialidad.

## Funcionalidades

* Página de inicio estática.
* Página “Quiénes somos”.
* Página de contacto.
* Página Blog para mostrar las entradas.
* Menú principal de navegación.
* Formulario creado con Contact Form 7.
* Optimización SEO mediante Yoast SEO.
* Campos personalizados creados con Advanced Custom Fields.
* Categoría “Cafés”.
* Cuatro fichas de cafés de especialidad.
* Una entrada normal de blog.
* Usuario “Marta” con perfil de Editor.
* Enlaces permanentes configurados con nombres amigables.

## Tema hijo

Se ha creado el tema hijo `tueste-norte`, basado en el tema Twenty Twenty-One.

El tema hijo contiene:

* `style.css`: información del tema y estilos personalizados.
* `functions.php`: carga de los estilos del tema padre y del tema hijo.
* `template-parts/content/content-single.php`: plantilla personalizada para mostrar las fichas de café.
* `acf-json`: configuración de los campos personalizados de ACF.

## Campos personalizados

El grupo de campos “Ficha de café” aparece únicamente en las entradas de la categoría “Cafés”.

Campos utilizados:

* `origen`: texto.
* `notas_de_cata`: área de texto.
* `nivel_de_tueste`: selección entre claro, medio y oscuro.
* `precio`: campo numérico expresado en euros por 250 gramos.

La plantilla comprueba que los campos tengan contenido antes de mostrarlos y utiliza funciones de escape de WordPress para imprimir los datos de forma segura.

## Cafés publicados

* Sidamo Floral.
* Sierra Dulce.
* Cerrado Natural.
* Volcán de Antigua.

## Plugins utilizados

### Advanced Custom Fields

Utilizado para crear la ficha estructurada de cada café. Permite administrar el origen, las notas de cata, el nivel de tueste y el precio desde el editor de WordPress.

### Contact Form 7

Utilizado para crear y validar el formulario de contacto con los campos nombre, correo electrónico y mensaje.

### Yoast SEO

Utilizado para añadir herramientas de optimización SEO al sitio.

## Instalación local

1. Instalar XAMPP e iniciar Apache y MySQL.
2. Instalar WordPress dentro de `C:\xampp\htdocs\tueste-norte-wp`.
3. Copiar los archivos del repositorio dentro de esa instalación.
4. Crear una base de datos para el proyecto desde phpMyAdmin.
5. Importar el archivo `db/tueste-norte-wp.sql`.
6. Configurar en `wp-config.php` el nombre de la base de datos, el usuario y la contraseña.
7. Comprobar que el tema padre Twenty Twenty-One esté instalado.
8. Activar el tema hijo Tueste Norte.
9. Activar Advanced Custom Fields, Contact Form 7 y Yoast SEO.
10. Configurar los enlaces permanentes con la opción “Nombre de la entrada”.

La dirección local utilizada durante el desarrollo es:

`http://localhost/tueste-norte-wp/`

## Depuración

Durante el desarrollo se utilizó `WP_DEBUG` para detectar posibles errores de WordPress y PHP.

## Base de datos

La copia de seguridad de la base de datos está disponible en:

`db/tueste-norte-wp.sql`

## Repositorio

https://github.com/migueperezdev/tueste-norte-wp

## Autor

Miguel Ángel Pérez Rodríguez
