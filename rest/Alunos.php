<?php

namespace Rest;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

class Alunos
{
    static public function configRoutes(App $app)
    {
        $app->group('/alunos', function (RouteCollectorProxy $group) {
            $group->get('/', \HomeController::class . ':index');
            //$group->get('/{id:[0-9]+}', \HomeController::class . ':get');
        });
        // ->add(new GroupMiddleware());
    }

    public static function index(Request $request, Response $response, $args)
    {
        $data = array('name' => 'Bob', 'age' => 40);
        $payload = json_encode($data);
        return $response->getBody()->write($payload);
        // return $response
        //     ->withHeader('Content-Type', 'application/json');
    }

    public static function get(Request $request, Response $response, $args)
    {
        $data = array('name' => 'Bob', 'age' => 40);
        $payload = json_encode($data);
        return $response->getBody()->write($payload);
    }
}
