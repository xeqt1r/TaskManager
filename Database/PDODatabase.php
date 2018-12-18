<?php
/**
 * Created by PhpStorm.
 * User: mira
 * Date: 7.9.2018 г.
 * Time: 7:52
 */

namespace Database;


class PDODatabase implements DatabaseInterface
{
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * PDODatabase constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function query(string $query): StatementInterface
    {
        $stmt = $this->pdo->prepare($query);

        return new PDOPreparedStatement($stmt);
    }

    public function getLastError(): array
    {
        // TODO: Implement getLastError() method.
    }
}