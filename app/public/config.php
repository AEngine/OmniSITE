<?php

use AEngine\Orchid\Misc\Asset;
use Controller\Main;

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
