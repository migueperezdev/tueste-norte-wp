# Ejercicio 1 — Leer la template hierarchy

En este ejercicio se indica qué fichero de plantilla cargaría WordPress en cada situación, siguiendo su jerarquía de plantillas.

## 1. Ficha de una entrada del blog

WordPress cargaría el fichero `single.php`.

La entrada «Cómo preparar café en V60» es una entrada individual del blog. WordPress buscaría primero plantillas específicas para el tipo de contenido `post`, pero ninguna existe en el tema indicado. Como `single.php` sí existe, WordPress utiliza ese fichero.

## 2. Ficha de un café

WordPress cargaría el fichero `single.php`.

El café «Etiopía Yirgacheffe» pertenece al tipo de contenido personalizado `cafe`. WordPress buscaría primero el fichero específico `single-cafe.php`, pero este no existe en el tema. Después buscaría `single.php` y, como sí existe, utilizaría ese fichero.

## 3. Listado de todos los cafés

WordPress cargaría el fichero `archive-cafe.php`.

La dirección `/cafes/` muestra el archivo o listado de todos los contenidos pertenecientes al tipo de contenido personalizado `cafe`. WordPress busca primero la plantilla específica `archive-cafe.php` y, como existe en el tema, utiliza ese fichero.

## 4. Página estática «Quiénes somos»

WordPress cargaría el fichero `index.php`.

«Quiénes somos» es una página estática. WordPress buscaría primero `page-quienes-somos.php` y después otras plantillas para páginas, como `page.php`. Como ninguna de ellas existe en el tema indicado, termina utilizando `index.php` como plantilla general de respaldo.

## 5. Portada del sitio

WordPress cargaría el fichero `index.php`.

WordPress buscaría primero `front-page.php` para mostrar la portada. Como ese fichero no existe en el tema indicado, continúa recorriendo la jerarquía de plantillas. Al no encontrar otra plantilla más específica disponible, utiliza `index.php` como plantilla general de respaldo.

## 6. Plantilla exclusiva para «Quiénes somos»

Crearía el fichero `page-quienes-somos.php`.

WordPress reconoce el slug `quienes-somos` en el nombre del fichero y utilizaría esta plantilla únicamente para la página «Quiénes somos», sin modificar el diseño del resto de páginas.
