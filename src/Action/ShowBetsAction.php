<?php
namespace App\Action;

use App\Domain\User\Service\BetGetter;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

// (require __DIR__ . '/../../config/settings.php')->settings['db'];

final class ShowBetsAction
{
    private $showBets;
    
    public function __construct(BetGetter $showBets)
    {
        $this->showBets = $showBets;
    }

    

    public function __invoke(ServerRequest $request, Response $response): Response
    {
        $betArr = $this->showBets->showBets();

        echo '<pre>';
        foreach($betArr as $key) {
            foreach($key as $test => $val) {
                if($test == 'bet_takers') {
                    $val = unserialize($val);
                }
            }
        }
        print_r($betArr);
        exit;
        return $response->withJson($betArr)->withStatus(200);
    }
}