<?php
namespace App\Action;

use App\Domain\User\Data\BetCreateData;
use App\Domain\User\Service\BetCreator;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

final class BetCreateAction
{
    private $betCreator;

    public function __construct(BetCreator $betCreator)
    {
        $this->betCreator = $betCreator;
    }

    public function __invoke(ServerRequest $request, Response $response): Response
    {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Mapping (should be done in a mapper class)
        $bet = new BetCreateData();
        $bet->betPlacer      = $data['bet_placer'];
        $bet->betDescription = $data['bet_description'];
        $bet->betTakers      = $data['bet_takers'];
        $bet->betSecret      = $data['bet_secret'];

        // Invoke the Domain with inputs and retain the result
        $betId = $this->betCreator->createBet($bet);

        // Transform the result into the JSON representation
        $result = [
            'bet_id'  => $betId
        ];

        // Build the HTTP response
        return $response->withJson($result)->withStatus(201);
    }
}