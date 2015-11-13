<?php
//examples/4.php -- Ejemplo de edición de un registro de la tabla
require_once __DIR__ . '/../bootstrap.php';
 
//Buscamos el usuario con id = 1, si existe cambiaremos el nombre, "aumentando 1"
/* @var $user \Entity\User */
$user = $em->find('Entity\User', 1);
 
if($user) {
    //cambiando nombre
    $parts = explode("_", $user->getName());
    $name = $parts[0];
    $number = (int) $parts[1];
    echo $user->getName() . PHP_EOL;
    $user->setName($name."_".($number+1));    
    echo ', cambiando el nombre a: '.$user->getName().'<br/>'. PHP_EOL;
    
    //cambiando dirección
    $parts = explode("_", $user->getAddressName());
    $name = $parts[0];
    $number = (int) $parts[1];
    echo $user->getAddressName(). PHP_EOL;
    $user->setAddressName($name."_".($number+1));    
    echo ', cambiando la dirección a: '.$user->getAddressName().'<br/>'. PHP_EOL;
    $em->flush(); //Guarda los cambios en la base datos (triggers SQL updates)
   
    echo '<br>Este cambio se podrá comprobar cargando de nuevo (porque lo recogerá y volverá modificarlo)' . PHP_EOL;
}else{
    $user = new Entity\User("Pepe_1");
    $em->persist($user);
    $em->flush();
    
    $address = new Entity\Address($user,"World_1");
    $user->setAddress($address);   
    
    $em->persist($address);
    $em->persist($user);
    $em->flush();
}