<?php
namespace App\Action;

use Slim\Http\Response;
use Slim\Http\ServerRequest;

final class HomeAction
{
    public function __invoke(ServerRequest $request, Response $response): Response
    {
        $response->getBody()->write('Hello this is documentaion');

        return $response;

        // $result = ['error' => ['message' => 'Validation fialed']];

        // return $response->withJson($result)->withStatus(422);
    }
}