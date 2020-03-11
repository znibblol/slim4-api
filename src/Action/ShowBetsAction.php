<?php
namespace App\Action;

use App\Domain\User\Repository;
use App\Domain\User\Repository\ShowBetRepository;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

// (require __DIR__ . '/../../config/settings.php')->settings['db'];

final class ShowBetsAction
{
    private $showBets;
    
    // public function __construct($showBets)
    // {
    //     $this->showBets = $showBets;
    // }

    

    public function __invoke(ServerRequest $request, Response $response): Response
    {


        $test = new ShowBetRepository($request);
        // $arr = [
        //     [
        //         'bet_id'            => '1',
        //         'bet_placer'        => 'Emil',
        //         'bet_description'   => 'Detta är ett test bet, det finns inte egentligen',
        //         'bet_takers'        => unserialize('a:4:{i:0;s:6:"Oeberg";i:1;s:5:"Jonas";i:2;s:5:"Oskar";i:3;s:5:"Henke";}'),
        //         'bet_secret'        => 0,
        //     ],
        //     [
        //         'bet_id'            => '2',
        //         'bet_placer'        => 'Emil',
        //         'bet_description'   => 'Detta är ett test bet, det finns inte egentligen',
        //         'bet_takers'        => unserialize('a:4:{i:0;s:6:"Oeberg";i:1;s:5:"Jonas";i:2;s:5:"Oskar";i:3;s:5:"Henke";}'),
        //         'bet_secret'        => 1,                
        //     ]
        // ];

        print_r($test->getBets());exit;


        return $response->withJson($arr)->withStatus(200);
    }
}