<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\EntityManager,
    Doctrine\ORM\Configuration,
    Doctrine\Common\Cache\ArrayCache as Cache,
    Doctrine\Common\Annotations\AnnotationRegistry,
    Doctrine\Common\ClassLoader;
 
//autoloading de Entity y EntityProxy
require_once __DIR__ . '/vendor/autoload.php';
$loader = new ClassLoader('Entity', __DIR__ . '/library');
$loader->register();
$loader = new ClassLoader('EntityProxy', __DIR__ . '/library');
$loader->register();
 
//configuramos proxy y cache
$config = new Configuration();
$cache = new Cache();
$config->setQueryCacheImpl($cache);
$config->setProxyDir(__DIR__ . '/library/EntityProxy');
$config->setProxyNamespace('EntityProxy');
$config->setAutoGenerateProxyClasses(true);
 
//Para que pueda interpretar las anotaciones en todas las clases contenidas en carpeta /library/Entity...
AnnotationRegistry::registerFile(__DIR__ . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');
$driver = new Doctrine\ORM\Mapping\Driver\AnnotationDriver(
    new Doctrine\Common\Annotations\AnnotationReader(),
    array(__DIR__ . '/library/Entity')
);
$config->setMetadataDriverImpl($driver);
$config->setMetadataCacheImpl($cache);
 
//obtnemos el EntityManager
$em = EntityManager::create(
    array(
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ .'/database.sqlite'
    ),
    $config
);