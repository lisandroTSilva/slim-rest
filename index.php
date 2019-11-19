<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Rest\Alunos;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

/* Middleware que fixa o content-type como json */
$app->add(function (Request $request, RequestHandler $handler) {
    return $handler
        ->handle($request)
        ->withHeader('Content-type', 'application/json');
});

Alunos::configRoutes($app);
$app->run();