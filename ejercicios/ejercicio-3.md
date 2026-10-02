# Ejercicio 3 — Explorar la REST API con el navegador

En este ejercicio se ha utilizado el navegador para consultar la REST API de WordPress. Las respuestas JSON se han formateado para facilitar su lectura.

## 1. Obtener las entradas del blog

URL utilizada:

```text
http://localhost/tueste-norte-wp/wp-json/wp/v2/posts?_fields=id,slug,title
```

Respuesta:

```json
[
  {
    "id": 48,
    "slug": "como-conservar-el-cafe-en-casa",
    "title": {
      "rendered": "Cómo conservar el café en casa"
    }
  },
  {
    "id": 46,
    "slug": "volcan-de-antigua",
    "title": {
      "rendered": "Volcán de Antigua"
    }
  },
  {
    "id": 44,
    "slug": "cerrado-natural",
    "title": {
      "rendered": "Cerrado Natural"
    }
  },
  {
    "id": 42,
    "slug": "sierra-dulce",
    "title": {
      "rendered": "Sierra Dulce"
    }
  },
  {
    "id": 40,
    "slug": "sidamo-floral",
    "title": {
      "rendered": "Sidamo Floral"
    }
  }
]
```

El parámetro `_fields=id,slug,title` hace que la API muestre solamente el identificador, el slug y el título de cada entrada.

## 2. Obtener una entrada concreta a partir de su slug

URL utilizada:

```text
http://localhost/tueste-norte-wp/wp-json/wp/v2/posts?slug=como-conservar-el-cafe-en-casa&_fields=id,slug,title
```

Respuesta:

```json
[
  {
    "id": 48,
    "slug": "como-conservar-el-cafe-en-casa",
    "title": {
      "rendered": "Cómo conservar el café en casa"
    }
  }
]
```

El parámetro `slug=como-conservar-el-cafe-en-casa` permite buscar únicamente la entrada que tiene ese slug.

## 3. Obtener la lista de páginas del sitio

URL utilizada:

```text
http://localhost/tueste-norte-wp/wp-json/wp/v2/pages?_fields=id,slug,title
```

Respuesta:

```json
[
  {
    "id": 21,
    "slug": "blog",
    "title": {
      "rendered": "Blog"
    }
  },
  {
    "id": 19,
    "slug": "contacto",
    "title": {
      "rendered": "Contacto"
    }
  },
  {
    "id": 17,
    "slug": "quienes-somos",
    "title": {
      "rendered": "Quiénes somos"
    }
  },
  {
    "id": 13,
    "slug": "inicio",
    "title": {
      "rendered": "Inicio"
    }
  }
]
```

La ruta `/pages` devuelve las páginas estáticas publicadas en el sitio.

## 4. Solicitar un tipo de contenido que no existe

URL utilizada:

```text
http://localhost/tueste-norte-wp/wp-json/wp/v2/tazas
```

Respuesta:

```json
{
  "code": "rest_no_route",
  "message": "No se ha encontrado ninguna ruta que coincida con la URL y el método de la solicitud.",
  "data": {
    "status": 404
  }
}
```

La API devuelve el error `rest_no_route` con el estado `404` porque no existe ningún tipo de contenido ni ninguna ruta registrada con el nombre `tazas`.