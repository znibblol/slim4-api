<?php
namespace App\Domain\User\Service;

use App\Domain\User\Data\BetCreateData;
use App\Domain\User\Repository\BetCreatorRepository;
use UnexpectedValueException;

/** 
 * Service
*/
final class BetCreator
{
    /**
     * @var BetCreatorRepository
     */
    private $repository;

    /**
     * The constructor
     * 
     * @param BetCreatorRepository
     */
    public function __construct(BetCreatorRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new bet.
     * 
     * @param BetCreateData $bet The bet data
     * 
     * @return int The new bet ID
     */
    public function createBet(BetCreateData $bet): int
    {
        // Validation
        if(empty($bet->betPlacer) || empty($bet->betTakers) || empty($bet->betDescription)) {
            throw new UnexpectedValueException('Placer, takers and description must be set.');
        }

        // Insert bet
        $betId = $this->repository->insertBet($bet);

        // Logging here: Bet created successfully

        return $betId;
    }
}