<?php
//examples/3.php -- Ejemplo de edición de un registro de la tabla
require_once __DIR__ . '/../bootstrap.php';
 
//Finding Greeting with id = 1
$greeting = $em->find('Entity\Greeting', 1);
 
if($greeting) {
    echo $greeting->getContent() . PHP_EOL;
    $nuevoTexto = 'Hola mundo a las '.time().'!';
    echo 'Actualizando el contenido del registro encontrado por '.$nuevoTexto. PHP_EOL;
    $greeting->setContent($nuevoTexto);   
    $em->flush(); //Guarda los cambios en la base datos (triggers SQL updates)
    echo 'Este cambio se podrá comprobar cargando el 2.php' . PHP_EOL;
}else{
    echo 'No se ha encontrado la fila con id=1';
}