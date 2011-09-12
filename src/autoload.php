<?php

require_once __DIR__.'/../vendor/Symfony/Component/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

// Register classes with namespaces
$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Symfony' => array(__DIR__.'/../vendor/silex/vendor', __DIR__.'/../vendor'),
    'Silex'   => __DIR__.'/../vendor/Silex/src',
));

// Register prefixes for libraries mathing the PEAR naming convention
$loader->registerPrefixes(array(
    'Pimple'  => __DIR__.'/../vendor/Silex/vendor/pimple/lib',
));

// Use the include path, too
//$loader->useIncludePath(true);

$loader->register();

