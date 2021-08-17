# IBERMEDIA ECOMMERCE

## Instalacion proyecto laravel:

### Requisitos:
* Composer
* NPM
* Laravel 7.0
* PHP 7.2
* Mysql

### Pasos
1. Clonar el repositorio de github y acceder a la carpeta del proyecto.
2. Ejecutar "composer install --no-dev" para instalar las dependencias del proyecto sin incluir las dependencias de desarrollo (development) como el debugbar.
3. Duplicar archivo .env.example y renombrarlo a .env.
4. Ejecutar php artisan key:generate.
5. Añadir a .env las credenciales de la base de datos y otros parámetros como la APP_NAME, COMPANY_NAME, ajustes para el envío de correos y las claves de las pasarelas de pago como REDSYS, STRIPE o PAYPAL.
6. Ejecutar "php artisan migrate:fresh --seed" para migrar y rellenar la base de datos con los datos iniciales.
7. Ejecutar "php artisan createDatabaseDeletes" para crear la base de datos de gestión de registros borrados
8. Ejecutar "php artisan storage:link" para crear el enlace simbólico de la carpeta de storage en /public


#Errores
1. Ejecutar composer dump-autoload y seguido punto 5 de arriba
