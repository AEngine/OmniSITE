<?php

namespace Controller;

use AEngine\Orchid\App;
use AEngine\Orchid\Controller;
use AEngine\Orchid\Http\Request;
use AEngine\Orchid\Http\Response;
use AEngine\Orchid\View;

class Main extends Controller
{
    public function index(Request $request, Response $response)
    {
        return $response
            ->write(
                View::fetch(
                    App::getInstance()->path('view:Layout.php')
                )
            );
    }
}
