<?php

namespace Main\Controller;

use AEngine\Orchid\App;
use AEngine\Orchid\Controller;
use AEngine\Orchid\View;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Main extends Controller
{
    public function index(RequestInterface $request, ResponseInterface $response)
    {
        return $response
            ->write(View::fetch(App::getInstance()->path('view:Layout.php')));
    }
}