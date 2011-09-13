<?php

use Symfony\Component\HttpFoundation\Response;

$app->get('/log/{name}', function($name) use ($app) {

    $app['monolog']->addInfo(sprintf("Received name '%s'", $name));

    return new Response('Success!');

});

$app->get('/hello', function() use ($app) {

    return new Response('Hello World!');

});

$app->get('/', function() use ($app) {

    return new Response(file_get_contents(__DIR__.'/../web/index.html'));

});
