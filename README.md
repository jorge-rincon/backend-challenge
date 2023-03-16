<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Backend-challenge

Backend-challenge consiste en la realizacion de una prueba tecnica donde se puede demostrar las siguientes habilidades

- Consumir y manunipular datos de la API https://jsonplaceholder.typicode.com/posts y https://jsonplaceholder.typicode.com/users.
- Crear modelos, controladores, recursos API, migraciones, rutas.
- Insertar y actualizar datos en base de datos.
- Clonar un proyecto con Git.
- Realizar commits.
- Hacer push de los cambios en GitHub.


El reto esta desarrollado en Laravel V8.

## Instrucciones

 - Clonar el repositorio.
 - Instalar las dependencias del proyecto.
 - Duplicar el archivo .env.example, renombrarlo a .env.
 - La base de datos se encuentra en la ruta storage/database/database.sqlite.
 - Generar la clave de la aplicacion.
 - Ejecutar la migracion.
 

## Documentación
## Paso 1
 ### Recuperar los 50 primeros posts de la API https://jsonplaceholder.typicode.com/posts.
- Ir a la ruta /posts en el navegador, esto realizara la insercion de los posts en la base de datos y generara una valoracion para cada post.

### Nota
- La cantidad de posts insertados se puede configurar, actualizando la cantidad en la constante POST_LIMIT que se encuentra en el archivo .env

### Dar de alta en la base de datos los usuarios de la API https://jsonplaceholder.typicode.com/users.
- Damos de alta unicamente a los usuarios que han escrito algun post, para esto debemos ir a la ruta /post-users

# Paso 2

Crear una API para la consulta de los datos almacenados en el paso 1.

## Endpoints
- GET /api/users  - Consulta usuarios con cada uno de sus post.
- GET /api/posts/1 - Consulta un post y muestra el nombredel usuario.
- GET /api/posts/top - Consulta los mejores post segun su valoracion de cada usuario.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
