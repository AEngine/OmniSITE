<?php

use AEngine\Orchid\App;
use AEngine\Orchid\Misc\Asset;
use Controller\Main;

// app obj
$app = App::getInstance();

// resource map
Asset::$map = [
    // for e.g. indexed array line by line
];

// router obj
$router = $app->router();

/*
 * GET      - get resource
 * POST     - create resource
 * PUT      - update resource
 * DELETE   - delete resource
 */

// example route
$router->get('/*', Main::class, -15);