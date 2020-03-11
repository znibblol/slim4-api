<?php
namespace App\Domain\User\Repository;

use App\Domain\User\Data\BetCreateData;
use PDO;

/** 
 * Repository
 */
class BetCreatorRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /** 
     * Constructor
     * 
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Insert bet row
     * 
     * @param BetCreateData $bet The bet
     * 
     * $return int The new ID
     */
    public function insertBet(BetCreateData $bet): int
    {
        $row = [
            'bet_placer'        => $bet->betPlacer,
            'bet_description'   => $bet->betDescription,
            'bet_takers'        => $bet->betTakers,
            'bet_secret'       => $bet->betSecret
        ];

        $sql = "INSERT INTO beerbets SET
                bet_placer=:bet_placer,
                bet_description=:bet_description,
                bet_takers=:bet_takers,
                bet_secret=:bet_secret;";

        $this->connection->prepare($sql)->execute($row);

        return (int)$this->connection->lastInsertId();
    }
}