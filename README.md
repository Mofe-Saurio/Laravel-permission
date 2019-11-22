<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## El proyecto

CRUD con el package laravel permission
## Requerimiento
- [PHP >= 7.0](http://php.net/)
- [Laravel 5.x|6.x](https://github.com/laravel/framework)

## Instalación
Clonar el repositorio

```bash
git clone https://github.com/Mofe-Saurio/Laravel-permission.git
```
Actualizamos el composer
```bash
composer update
```
Creamos el archivo .env a partir de .env.example en la raiz del proyecto 
<p align="center"><img src="https://raw.githubusercontent.com/Mofe-Saurio/Laravel-DataTable/master/public/img/env.png"></p>

Generamos la llave del proyecto
```bash
php artisan key:generate
```

Configurar el archivo .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre de la db
DB_USERNAME=root
DB_PASSWORD=
```

Realizar la migración y cargamos los datos de prueba
```bash
php artisan migrate:refresh --seed
```

Iniciamos el servidor
```bash
php artisan serve
```

<p align="center"><img src="https://raw.githubusercontent.com/Mofe-Saurio/Laravel-permission/master/public/img/view.PNG" width="800"></p>

## Documentación
- [Laravel Permission Documentation](https://docs.spatie.be/laravel-permission/v3/introduction/)


## Referencia
- [spatie/laravel-permission](https://github.com/spatie/laravel-permission)
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
