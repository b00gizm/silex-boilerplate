<?php

namespace Codenugget\Provider;

use Monolog\Processor\MemoryPeakUsageProcessor;
use Monolog\Formatter\LineFormatter;

use Silex\Application;
use Silex\Provider\MonologServiceProvider;

class MonologExtraServiceProvider extends MonologServiceProvider
{
    public function register(Application $app)
    {
        parent::register($app);

        $app['monolog.configure'] = $app->protect(function ($log) use ($app) {
            $handler = $app['monolog.handler'];
            $handler->setFormatter($app['monolog.formatter']);

            $log->pushHandler($handler);
            $log->pushProcessor($app['monolog.processor']);
        });

        $app['monolog.processor'] = function() use ($app) {
            return new MemoryPeakUsageProcessor();
        };

        $app['monolog.formatter'] = function() use ($app) {
            return new LineFormatter();
        };
    }
}
