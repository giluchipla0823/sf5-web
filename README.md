# sf5-web
Aprendiendo Symfony 5

# Crear mapa de entidades YML
```
$ php bin/console doctrine:mapping:import "App\Entity" yml --path=[PATH]
```

# Crear entidades
```
$ php bin/console make:entity --regenerate [MAPPING]
```


# Crear CRUD en base a un modelo
```
$ php bin/console make:crud [ENTITY_NAME]
```
