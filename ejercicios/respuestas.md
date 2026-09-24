# Respuestas de los ejercicios

## Ejercicio 1: instalación y puesta a punto

### ¿Por qué al cliente se le da un usuario Editor y no Administrador?

A Marta se le asigna el rol Editor porque necesita crear y modificar el contenido de la web, como las páginas, las entradas, las imágenes y los cafés. No necesita instalar plugins, cambiar temas, modificar la configuración de WordPress ni administrar otros usuarios.

El rol Editor permite gestionar el contenido sin darle acceso a opciones que podrían afectar al funcionamiento de toda la web. De esta forma se reducen los errores accidentales y se mantiene la instalación más segura.

## Ejercicio 2: tema hijo

### ¿Por qué `functions.php` no sustituye al del tema padre, pero `footer.php` sí?

El archivo `functions.php` del tema hijo no sustituye al del tema padre. WordPress carga primero las funciones del tema padre y después añade las funciones del tema hijo. Esto permite agregar nuevas funcionalidades sin perder las que ya incluye el tema padre.

En cambio, `footer.php` es un archivo de plantilla. Cuando WordPress encuentra un archivo `footer.php` dentro del tema hijo, utiliza ese archivo en lugar del que se encuentra en el tema padre. De esta forma se puede personalizar el pie de página sin modificar directamente el tema original.

## Ejercicio 3: campos personalizados con ACF

### ¿Cuál es la diferencia entre `get_field()` y `the_field()`?

`get_field()` obtiene el valor de un campo de ACF y lo devuelve. Esto permite guardarlo en una variable, comprobarlo o modificarlo antes de mostrarlo.

`the_field()` obtiene el valor y lo muestra directamente en la página.

Por ejemplo, `get_field('subtitulo')` permite comprobar primero si el subtítulo contiene información, mientras que `the_field('subtitulo')` lo imprimiría directamente.