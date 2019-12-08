# sf5-web
Aprendiendo Symfony 5

## Crear mapa de entidades YML
```
$ php bin/console doctrine:mapping:import [MAPPING_PREFIX] yml --path=[MAPPING_DIR]
```

Ejemplo: 
```
$ php bin/console doctrine:mapping:import "App\Entity" yml --path=src/Resources/config/doctrine
```

## Crear entidades
```
$ php bin/console make:entity --regenerate [MAPPING_NAME]
```

Ejemplo:
```
$ php bin/console make:entity --regenerate App
```


## Crear CRUD en base a un modelo
```
$ php bin/console make:crud [ENTITY_NAME]
```

Ejemplo:
```
$ php bin/console make:crud Book
```

## Configurar validaciones en YAML
Hay muchas formas de crear validaciones para campos
de formularios. Sin embargo, la manera más limpia, según 
mi criterio, es tener separado esta configuración en un fichero
YAML.

Lo primero que tenemos que hacer es activar la funcionalidad
de validación para el framework. Para ello, tenemos que 
realizar algunas configuraciones en el siguiente
fichero:

```
config/packages/validator.yml
```

y agregamos lo siguiente:

``` yaml
framework:
    validation:
        enabled: true
        email_validation_mode: html5
        mapping:
            paths:
                - "%kernel.project_dir%/src/Resources/config/validators/"
```

Se puede observar que en el fichero mencionado anteriormente,
hemos agregado la propiedad "paths", en donde, estaremos creando
los ficheros de validación para nuestras entidades que 
serán usados en nuestros formularios.

Si queremos crear validaciones para la entidad "Author",
debemos crear primero el fichero:

```
src/Resources/config/validators/author-validation.yml
```

y agregar lo siguiente:

``` yaml
App\Entity\Author:
  properties:
    name:
      - NotBlank: {}
      - Length:
          min: 2
```

Este es un sencillo ejemplo, en el cual, estamos especificando
validaciones para el campo "name" de la entidad "Author"
