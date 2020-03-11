<?php
namespace App\Domain\User\Repository;

use PDO;

/**
 * Repository
 */
class ShowBetRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor
     * 
     * @param PDO $connection The database conneciton
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * FetchAll bets
     */
    public function getBets()
    {
        $stmt = "SELECT * FROM beerbets";

        $query = $this->connection->prepare($stmt)->execute();

        $result = $query->fetchAll();

        return $result;
    }
}