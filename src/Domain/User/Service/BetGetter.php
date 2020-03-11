<?php
namespace App\Domain\User\Service;

use App\Domain\User\Repository\ShowBetRepository;
// use UnexpectedValueException;

/**
 * Service
 */
final class BetGetter
{
    /**
     * @var ShowBetRepository
     */
    private $repository;

    /**
     * The constructor
     * 
     * @param ShowBetRepository
     */
    public function __construct(ShowBetRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Fetch all bets
     * 
     * @return arr The bets
     */
    public function showBets()
    {
        $betArr = $this->repository->getBets();

        return $betArr;
    }
}