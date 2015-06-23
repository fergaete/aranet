## Introducción ##

El siguiente tutorial permitirá instalar y configurar la aplicación ARANet.

## Requerimientos previos ##

Se requiere un sistema (Windows/Linux o Mac) con:
  * Un servidor web (preferiblemente apache 2.x) con intérprete de PHP > 5.2.3
  * Un servidor de bases de datos (preferiblemente MySQL 5.x)

## Descarga del software ##

### Para desarrolladores ###

Descargar la aplicación del repositorio (ver pestaña "Source" para instrucciones). La rama estable, basada en las librerías symfony 1.0.x, se encuentran en branches/aranet\_10 mientras que la rama en desarrollo, con las librerías 1.1.x, se pueden descargar del trunk.

### Para usuarios ###

Descargar el paquete ARANet-1.0-latest.zip de la pestaña "Downloads" y descomprimirlo en una carpeta que pueda tener acceso el servidor web, por ejemplo en c:\ARANet
También es preciso descargar las librerías symfony y descomprimirlas dentro del directorio lib/vendor.

## Comprobaciones previas ##

Desde una interfaz de comandos, en la carpeta dónde se haya descomprimido la aplicación, ejecutar:
```
php symfony --version
```
La salida deberá mostrar algo como "symfony version 1.0.x". Luego se ejecutarán las siguientes órdenes:
```
php symfony fix-perms   # Para reparar los permisos de lectura/escritura de los directorios
```
Si todo ha ido bien, podrá pasarse al siguiente punto.

## Configuración del servidor web ##

Se debe crear y configurar en apache un host virtual para que ARANet pueda funcionar correctamente, para esto:
  1. Editar el fichero hosts (en Windows en C:\WINDOWS\system32\drivers\etc\) y añadir el nombre del host a usar. Por ejemplo, si se quiere acceder mediante http://aranet.local, se añadirá aranet.local a la derecha de la ip 127.0.0.1
```
127.0.0.1	aranet.local
```
  1. Editar el fichero httpd.conf del directosrio conf de apache e incluir al final esta informción:
```
NameVirtualHost 127.0.0.1:80

<VirtualHost 127.0.0.1:80>
  ServerName aranet.local
  DocumentRoot "c:/ARANet/web"
  DirectoryIndex index.php
  Alias /sf C:/ARANet/lib/vendor/symfony/data/sf

  <Directory "C:/ARANet/web">
   AllowOverride All
   Allow from All
  </Directory>
  <Directory "C:/ARANet/lib/vendor/symfony/data/sf">
    AllowOverride All
    Allow from All
  </Directory>
</VirtualHost>
```
  1. Asegurarse de que está activada la reescritura de URL's. Buscar y descomentar o añadir el siguiente código al fichero httpd.conf
```
AddModule mod_rewrite.c
LoadModule rewrite_module modules/mod_rewrite.so
```
  1. Reiniciar el servidor web

## Creación y configuración de la base de datos ##

ARANet puede utilizar numerosos motores de bases de datos (todos los soportados por Creole), pero por tratarse de una aplicación profesional, se recomienda usar MySQL, PostgreSQL o Microsoft SQL Server.

### En MySQL ###
  1. Crear la base de datos con:
```
mysqladmin -u youruser -pyourpassword create aranet
```
  1. Editar el fichero config/databases.yml, que deberá quedar así:
```
all:
  propel:
    class:          sfPropelDatabase
    param:
      dsn:          mysql://youruser:yourpassword@localhost/aranet
```
Es muy importante respetar los tabuladores y usar espacios y no tabulaciones al editar los ficheros yml.

## Instalar ARANet ##

Para instalar la aplicación se deberá ejecutar el comando:
```
php symfony install-aranet
```

Si todo ha ido bien, al finalizar se podrá acceder a la url http://aranet.local, que mostrará un panel de login.

Nota: Para asegurarse que todo está bien, puede accederse a la dirección http://aranet.local/frontend_dev.php que mostrará todo tipo de errores e información de debug.