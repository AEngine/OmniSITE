<?php

require_once(__DIR__ . '/../instance.php');

use AEngine\Orchid\Misc\Str;

try {
    $appName = explode('.', $_SERVER['HTTP_HOST'])[0];
    $app->setApp($appName);
} catch (RuntimeException $e) {
    $appName = $app->getApp();
}

// links on app folders
$app->path('app', __DIR__ . '/../app/' . $appName);
$app->path('view', __DIR__ . '/../app/' . $appName . '/View');

// load from app folder
$app->add('autoload', __DIR__ . '/../app/' . $appName);

// load config file if exists
if ($appConfig = $app->path('app:config.php')) {
    require_once($appConfig);
}

if ($app->isDebug()) {
    $response = $app->run(true);

    register_shutdown_function(function () use ($app, $response) {
        $time   = round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 7);
        $memory = Str::convertSize(memory_get_usage());

        $response = $response
            ->withAddedHeader('X-Memory', $memory)
            ->withAddedHeader('X-Time', $time . 'ms');

        $app->respond($response);
    });

    exit;
}

$app->run();
