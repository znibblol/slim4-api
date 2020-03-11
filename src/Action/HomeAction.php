<?php
namespace App\Action;

use Slim\Http\Response;
use Slim\Http\ServerRequest;

final class HomeAction
{

    public $takers = ['Oeberg', 'Jonas', 'Oskar', 'Henke'];

    public function __invoke(ServerRequest $request, Response $response): Response
    {

        $theArr = serialize($this->takers);

        $response->getBody()->write($theArr);



        return $response;

        // $result = ['error' => ['message' => 'Validation fialed']];

        // return $response->withJson($result)->withStatus(422);
    }
}