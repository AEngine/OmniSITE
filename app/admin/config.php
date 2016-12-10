<?php

use AEngine\Orchid\App;
use AEngine\Orchid\Misc\Asset;

$app = App::getInstance();

Asset::$map = [
    "/asset/build/app.min.css",
    "/asset/build/app.min.js",
];

$router = $app->router();

$router->get('/*', \Main\Controller\Main::class, -15);
