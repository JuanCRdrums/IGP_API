## Prueba técnica - Integral Group Solutions

El presente repositorio corresponde a la prueba técnica para el cargo de desarrollador de Backend en Integral Group Solutions. Se trata de una API que tiene 4 funcionalidades principales:
1. Registro de usuarios.
2. Login de usuarios.
3. Visualización de productos guardados en base de datos, relacionados con su respectiva categoría.
4. Visualización de categorías guardadas en base de datos.

La API está desarrollada utilizando Laravel 8.83.2. A continuación, se detallan los pasos para realizar una instalación local del proyecto:

1. Clonar el repositorio:  ``` git clone https://github.com/JuanCRdrums/IGP_API ```
2. Instalar las dependencias usando Composer: ``` composer install ```
3. Crear una base de datos MySQL para almacenar los datos del proyecto.
4. Ingresar las credenciales de acceso para la base de datos en el archivo .env. Se puede utilizar el archivo .env.example (cambiar el nombre a .env), teniendo especial cuidado en las siguiente información, donde DB_DATABASE es el nombre de la base de datos creada en el paso 3:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
5. Ejecutar las migraciones con el comando ``` php artisan migrate ```
6. Llenar algunos campos en las tablas Products y Categories de la base de datos. El requerimiento (ver archivo "Test Backend.pdf") no contemplaba que se agregaran productos y categorías a través de la API, así que es necesario llenar estos campos manualmente. Se debe tener en cuenta que el campo category de la tabla Products corresponde al Id de la categoría con la que estará relacionado el producto.
7. Correr el proyecto en un entorno de desarrollo local con el comando ``` php artisan serve ```
8. Incorporar la colección de Postman para ver los métodos soportados y un ejemplo de su implementación. Esta colección puede incorporarse utilizando el siguiente enlace: https://www.getpostman.com/collections/8fc0361746ce2028bcee

------------------------------------------------------------
En caso de inquietudes, comunicarse al correo electrónico juankdrums14@gmail.com
