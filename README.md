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

Para ello, crearemos el siguiente fichero:

```
src/Resources/config/validators/author-validation.yml
```

y agregaremos lo siguiente:

``` yaml
App\Entity\Author:
  properties:
    name:
      - NotBlank: {}
      - Length:
          min: 2
```
