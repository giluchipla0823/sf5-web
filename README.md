# sf5-web
Aprendiendo Symfony 5

## Crear mapa de entidades YML
```
$ php bin/console doctrine:mapping:import [MAPPING_PREFIX] yml --path=[MAPPING_DIR]
```

Ejemplo: 
```
$ php bin/console doctrine:mapping:import "App\Entity" yml --path=src/Resources/doctrine
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
