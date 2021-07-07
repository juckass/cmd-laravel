#!/bin/bash -e

## parametros
nombre_imagen=`grep container_name: docker-compose.yml`
my_arr=($(echo $nombre_imagen | tr ":" "\n"))
nombre_imagen=${my_arr[1]}

## fin parametros inciales ##

## si no existe php.ini --> ocupamos php.ini modo produccion ##
file=etc/php/php.ini
php_cambiarModo=php_cambiarModo.sh

if [ ! -s $file ]
then
        echo "No encuentro archivo php.ini --> genero php.ini con base en php.ini-production . Utilice comando ./$php_cambiarModo para cambiar de modo desarrollo a produccion. "
        ./$php_cambiarModo prod
fi

## destruyo container y vuelvo a crear
docker-compose down
docker-compose up -d
sleep 2

## update tzdata --> timezone
docker exec $nombre_imagen sh -cc " apk update tzdata --quiet "

## ajuste de permisos archivo log de xdebug
docker exec $nombre_imagen sh -cc " chown 48.600 /usr/local/log/xdebug.log"

