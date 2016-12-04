<?php declare(strict_types = 1);

use AEngine\Orchid\App;
use AEngine\Orchid\Misc\Str;

require_once(__DIR__ . '/../vendor/autoload.php');

$config = array_replace_recursive([
    'debug'     => false,
    'base_port' => 80,
    'base_dir'  => __DIR__ . '/..',
], (file_exists(__DIR__ . '/../config.php') ? require_once(__DIR__ . '/../config.php') : []));

// определение что включен debug режим
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
    ini_set('error_reporting', 'E_ALL');
} else {
    ini_set('display_errors', '0');
    ini_set('html_errors', '0');
    ini_set('error_reporting', '0');
}

// загрузка приложения
$app = App::getInstance($config);

$app->path('storage', __DIR__ . '/storage');
$app->path('log', __DIR__ . '/storage/log');
$app->path('asset', __DIR__ . '/asset');

try {
    $appName = explode('.', $_SERVER['HTTP_HOST'])[0];
    $app->setApp($appName);
} catch (RuntimeException $e) {
    $appName = $app->getApp();
}

$app->path('app', __DIR__ . '/../app/' . $appName);
$app->path('template', __DIR__ . '/../app/' . $appName . '/template');
$app->path('view', __DIR__ . '/../app/' . $appName . '/view');

// поддержка загрузка из папки приложения
$app->add('autoload', __DIR__ . '/../app/' . $appName);

// подключение базы данных
Db::setup($config['database']);

// подключение кеша
Mem::setup($config['memory']);

// загрузка модулей
$app->loadModule($config['modules']);

if ($app->isDebug()) {
    $response = $app->run(true);
    register_shutdown_function(function () use ($app, $response) {
        $time = round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 7);
        $memory = Str::convertSize(memory_get_usage());
        $response = $response
            ->withAddedHeader('X-Memory', $memory)
            ->withAddedHeader('X-Time', $time . 'ms');
        $app->respond($response);
    });
    exit;
}

$app->run();