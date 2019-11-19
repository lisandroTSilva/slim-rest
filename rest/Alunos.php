<?php

namespace Rest;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

final class Alunos
{
    static public function configRoutes(App $app)
    {
        $app->group('/alunos', function (RouteCollectorProxy $group) {
            $group->get('', Alunos::class . ":index");
            $group->get('/{id:[0-9]+}', Alunos::class . ":getItem");
            $group->post('', Alunos::class . ":create");
            $group->put('/{id:[0-9]+}', Alunos::class . ":update");
            $group->delete('/{id:[0-9]+}', Alunos::class . ":delete");
        });
    }

    public static function index(Request $request, Response $response, $args)
    {
        $response
            ->getBody()
            ->write(json_encode(self::getAlunos()));
        return $response;
    }

    public static function getItem(Request $request, Response $response, $args)
    {
        $data = array_filter(self::getAlunos(), function ($item) use ($args) {
            return $item['id'] == $args['id'];
        });
        $response->getBody()->write(json_encode($data));
        return $response;
    }

    public static function create(Request $request, Response $response, $args)
    { }

    public static function update(Request $request, Response $response, $args)
    { }

    public static function delete(Request $request, Response $response, $args)
    { }

    private static function getAlunos()
    {
        return [
            ['id' => 1, 'name' => 'Lisandro Silva'],
            ['id' => 2, 'name' => 'Diogo Paludo'],
            ['id' => 3, 'name' => 'Douglas Silveira'],
            ['id' => 4, 'name' => 'Vanderson'],
            ['id' => 5, 'name' => 'Fábio']
        ];
    }
}
