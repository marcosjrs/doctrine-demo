Este proyecto fué creado según las instrucciones de:
http://marco-pivetta.com/doctrine2-orm-tutorial/

Ejecutamos en consola, linea a linea:

//Creamos la estructura de carpetas library/EntityProxy
// y a esta última damos modo escritura (por temas de permisos)
mkdir doctrine-demo
cd doctrine-demo
mkdir library
mkdir library/Entity
mkdir library/EntityProxy
chmod +w library/EntityProxy

//creamos el php Greeting
touch library/Entity/Greeting.php
//Creamos el archivo composer.json con contenido =>  {}
echo "{}" > composer.json
//Descargamos el composer
sudo curl -s https://getcomposer.org/installer | php
//Descargamos el composer y descarmos doctrine.
sudo composer.phar require doctrine/orm:2.*
//Creamos el php  bootstrap
touch bootstrap.php

//finalmente le cambié el dueño a lo creado con sudo:
sudo chown mjrs:mjrs *

//Modificamos las entidades correpondientes, para luego crear la BBDD según estas entidades (Greeting.php y los que necesitemos).

//Ejecutamos el orm:schema-tool:create para crear la base de datos sqlite con toda la estructura.
php doctrine-cli.php orm:schema-tool:create
