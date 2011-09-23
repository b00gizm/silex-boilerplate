<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

use Silex\Provider\TwigServiceProvider;

// Create the application
$app = new Application();

// Register Silex service providers
//$app->register(new MyAwesomeServiceProvider());

// Add services to the DI container
//$app['my.service'] = function() {
//    // ...
//    return new My\Service();
//};
//$app['my.shared_service'] = $app->share(function() {
//    // ...
//    return new My\SharedService();
//});

// Configuration parameters
$app['debug'] = false;
//$app['my.param'] = '...';

// Override settings for your dev environment
$env = isset($_ENV['SILEX_ENV']) ? $_ENV['SILEX_ENV'] : 'dev';

if ('dev' == $env) {
    $app['debug'] = true;
    //$app['my.param'] = '...';
}

$app->register(new TwigServiceProvider(), array(
    'twig.path'       => __DIR__.'/../views',
    'twig.class_path' => __DIR__.'/../vendor/Silex/vendor/twig/lib',
    'twig.options'    => array(
        'cache' => __DIR__.sprintf('/../cache/%s/twig/', $env),
    ),
));

// Error handling
$app->error(function (\Exception $ex, $code) use ($app) {

    if ($app['debug']) {
        return;
    }

    if (404 == $code) {
        return new Response(file_get_contents(__DIR__.'/../web/404.html'));
    } else {
        // Do something more sophisticated here (logging etc.)
        return new Response('<h1>Error!</h1>');
    }

});

return $app;
