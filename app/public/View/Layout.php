<?php

use AEngine\Orchid\App;
use AEngine\Orchid\Misc\Asset;

$app = App::getInstance();
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

    <?= Asset::resource() . PHP_EOL; ?>

    <title>Omnisite Example</title>
</head>
<body>
    Hello World!
</body>
</html>
