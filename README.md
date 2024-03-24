# laravel-validate-ec
[![Latest Stable Version](http://poser.pugx.org/tonystore/laravel-validate-ec/v)](https://packagist.org/packages/tonystore/laravel-validate-ec) [![Total Downloads](http://poser.pugx.org/tonystore/laravel-validate-ec/downloads)](https://packagist.org/packages/tonystore/laravel-validate-ec) [![Latest Unstable Version](http://poser.pugx.org/tonystore/laravel-validate-ec/v/unstable)](https://packagist.org/packages/tonystore/laravel-validate-ec) [![License](http://poser.pugx.org/tonystore/laravel-validate-ec/license)](https://packagist.org/packages/tonystore/laravel-validate-ec) [![PHP Version Require](http://poser.pugx.org/tonystore/laravel-validate-ec/require/php)](https://packagist.org/packages/tonystore/laravel-validate-ec)

Librería para validar la estructura de los diferentes tipos de documentos de identificación emitidos para ecuador. 

Para realizar las validaciones, se usa la librería [tavo1987/ec-validador-cedula-ruc](https://github.com/tavo1987/ec-validador-cedula-ruc) desarrollada por  [tavo1987](https://github.com/tavo1987) para PHP


Se podrá validar los números de identificación de los siguientes tipos:
* Cédula

## Requerimientos

-   [PHP >= ^7.4](http://php.net)
-   [Laravel 5| 6 | 7 | 8 | 9 | 10 | 11](https://laravel.com)


## Instalación via composer

Ejecuta este comando en la consola
``` bash
composer require tonystore/laravel-validate-ec
```
## Publicar archivos de traducciones
Por defecto, la librería contiene su mensaje de traducción para es y en, usted puede sobreescribir este mensaje de la siguiente manera

```sh
php artisan vendor:publish --provider="Tonystore\LaravelValidateEc\LaravelValidateEcProvider" --tag="validate-lang-es" // Validación en español
php artisan vendor:publish --provider="Tonystore\LaravelValidateEc\LaravelValidateEcProvider" --tag="validate-lang-en" // Validación en ingles
```

## Casos de uso
### Ejemplo 1
Uso mediante las validaciones de laravel
```php
<?php

$validatedData = $request->validate([
    'cedula' => ['required', 'document_ec:ci'],
]);
        
```

### Ejemplo 2
Uso mediante una Regla de validación
```php
<?php

use Tonystore\LaravelValidateEc\Rules\ValidDocumentEc;

$validatedData = $request->validate([
    'cedula' => ['required', new ValidDocumentEc('ci')],
]);
        
```

## Autor

Esta librería fue desarrollada y es mantenido por [Anthony Medina](https://github.com/tony98ms)

Si deseas contribuir con este proyecto o encuentras algún error, puedes crear un issue o un pull request, para esto deberá pasar todos los tests

## Licencia

Licencia de tipo [MIT License](LICENSE).