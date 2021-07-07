# Laravel-CMS

CMS desarrollado en laravel v8, permite crear y administrar tus paginas web, subir imágenes, css y js.  

Ver demo en http://35.209.184.152/
Para poder acceder al administrador http://35.209.184.152/backend

Usuario: admin@admin.com
Contraseña: 12345678

El sistema esta contemplado con los siguientes modulos:
- Admin: Permite gestionar usuarios.
- Paginas: Permite gestionar paginas, menús  y carga de multimedia.

### Modulos
   - Admin
     - Listar usuarios
        - Editar usuarios
        - Eliminar usuarios
     - Crear usuarios   
   - Páginas
     - Listar páginas
       - Editar páginas
       - Eliminar páginas
     - Crear  páginas
   - Multimedia
   - Menus

# Instalacion

## Instalación con docker
Primero que todo deben de contar con docker instalado en el ordenador o servidor, en el reposito encontraremos un directorio llamado docker, donde contiene todo lo necesarios para levantar un ambiente local o de producción.

Una vez completada la instalación con docker podemos acceder atravez se la siguiente url: http://prueba-ilogica.local y url del backend  http://prueba-ilogica.local/backend

### Para la instalación local del sistema de debe de seguir los siguientes pasos:
- Agregar host, se debe agregar ruta en archivo de host local para re-direccionamiento:

```

Linux: sudo vi /etc/hosts
mac: sudo vi /etc/hosts

Se debe agregar la siguiente línea al archivo hosts:
127.0.0.1	prueba-ilogica.local

```

- Levantar docker, Para ejecutar el proyecto debemos ejecutar el comando:

```
    ./levantar_servicio.sh
```
- Inslalacion de dependecia de composer, para ingresar al contenedor nos ubicamos en el directorio docker y ejecutamos el siguiente comando:

```
    ./ingresar

    Una vez adentro del contenedor deber ir a la ruta del app:

    cd /data/sitios/prueba-ilogica.local

```
- luego ejecutamos, el siguiente comando demora entre unos 5 a 10 minutos en descargar todas las dependencias necesarias para ejecutar el sistema:

```
   composer update
```
## Instalacion de la base de datos.

En el repositorio encontraremos un directorio llamado Base de datos, y en su interior un archivo llamado cms.sq
Podemos descargar imagen docker mysql o utilizar bases de datos mysql instalada en su ordenador o servidor.

Una vez cargado el sql se debe configurar archivo .env con los datos de conexión.

NOTA: CMS cuenta con migraciones automarizadas, pero no se cargará las paginas por defecto con el siguiente comando:


```
   php artisan module:migrate
```

## Configuración de archivo .env 

se debe de crear archivo llamada .env para almacenar las configuraciones del sistema, para lo cual tenemos un modelo de ejemplo llamado env.example, el cual tiene todas las configuraciones predeterminadas del cms.

```
	
    DB_CONNECTION=mysql
    DB_HOST={host de base de datos}
    DB_PORT=3306
    DB_DATABASE={nombre de base de datos}
    DB_USERNAME={usuario}
    DB_PASSWORD={contraseña}

```	
