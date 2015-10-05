<?php 
//examples/1.php --  Ejemplo de creación de registro en la tabla 
 
use Entity\Greeting;
 
require_once __DIR__ . '/../bootstrap.php';
 
//Creamos una instancia de Greeting ("saludos" en inglés) lo que se transformará al finale en una fila de la tabla.
$greeting = new Greeting('Hola mundo a las '.time().'!');
 
//Guardandolo en el EntityManager
$em->persist($greeting);
 
//mandando que guarde todo lo almacenado en la BBDD
$em->flush();
 
echo 'OK!';