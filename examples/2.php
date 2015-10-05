<?php
//examples/2.php  --  Ejemplo de recogida de registro con id=1 de la tabla
require_once __DIR__ . '/../bootstrap.php';
 
//Primero se debería ejecutar el 1.php, si queremos ver un saludo...
$greeting = $em->find('Entity\Greeting', 1);
 
if($greeting) {
    //The EntityManager has already provided us an object of type Entity\Greeting!
    echo 'Encontrado un "saludo" (instancia de ' . get_class($greeting)
        . ') con contenido ' . $greeting->getContent();
}else{
    echo 'No se ha encontrado la fila con id=1';
}