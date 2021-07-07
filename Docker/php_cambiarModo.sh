#!/bin/bash

##parametros
me=`basename "$0"`
path_cp=`which cp`
path_rm=`which rm`


modo_de_uso="
modo de uso ./$me [tipo]

tipo = dev  (modo developer)
tipo = prod (modo production)
"

if [ $# -eq 0 ]
  then
    echo "Falta Parametro: 'dev' o 'prod' . $modo_de_uso "
    exit
fi

if [ $1 != "dev" ]
then
        if [ $1 != "prod" ]
        then
                echo "Falta Parametro: 'dev' o 'prod' . $modo_de_uso "
                exit
        fi
fi

nombre_imagen=`grep container_name: docker-compose.yml`
my_arr=($(echo $nombre_imagen | tr ":" "\n"))
nombre_imagen=${my_arr[1]}

${path_rm} -f ./etc/php/php.ini

if [ $1 == "dev" ]
then
        ${path_cp} ./etc/php/php.ini-development ./etc/php/php.ini
fi

if [ $1 == "prod" ]
then
        ${path_cp} ./etc/php/php.ini-production ./etc/php/php.ini
fi

docker container restart $nombre_imagen


