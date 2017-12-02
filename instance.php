<?php declare(strict_types=1);

require_once(__DIR__ . '/vendor/autoload.php');

use AEngine\Orchid\App;

$config = array_replace_recursive([
    'debug'    => false,
    'base_dir' => __DIR__,
    'database' => [],
    'memory'   => [],
    'modules'  => [],
], (file_exists(__DIR__ . '/config.php') ? require_once(__DIR__ . '/config.php') : []));

// check debug mode
if ($config['debug'] ||
    (
        isset($_COOKIE['debug']) &&
        $_COOKIE['debug'] == 'orchid'
    ) || (
        isset($_GET['debug']) &&
        $_GET['debug'] == 'orchid'
    )
) {
    $config['debug'] = true;
    ini_set('display_errors', '1');
    ini_set('html_errors', '1');
    ini_set('error_reporting', '30719');
} else {
    ini_set('display_errors', '1');
    ini_set('html_errors', '1');
    ini_set('error_reporting', '0');
}

// load app
$app = App::getInstance($config);

// load from src folder
$app->add('autoload', __DIR__ . '/src');

// connect database
Db::setup($config['database']);

// connect memcache
Mem::setup($config['memory']);

// load modules
$app->loadModule($config['modules']);
