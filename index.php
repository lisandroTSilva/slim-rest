<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Factory\AppFactory;
use Rest\Alunos;
use Slim\Routing\RouteCollectorProxy;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->add(function (Request $request, RequestHandler $handler) {
    return $handler
        ->handle($request)
        ->withHeader('Content-type', 'application/json');
});

//Alunos::configRoutes($app);
$app->group('/alunos', function (RouteCollectorProxy $group) {
    $group->get('/', function (Request $request, Response $response, $args) {
        $data = array('name' => 'Bob', 'age' => 40);
        $payload = json_encode($data);
        return $response->getBody()->write($payload);
    });
});

$app->run();
