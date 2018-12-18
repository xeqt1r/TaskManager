<?php
/**
 * Created by PhpStorm.
 * User: mira
 * Date: 7.9.2018 г.
 * Time: 8:03
 */

namespace Database;


class PDOResultSet implements ResulSetInterface
{
    /**
     * @var \PDOStatement
     */
    private $pdoStatement;

    /**
     * PDOPreparedStatement constructor.
     * @param \PDOStatement $pdoStatement
     */
    public function __construct(\PDOStatement $pdoStatement)
    {
        $this->pdoStatement = $pdoStatement;
    }

    /**
     * @param $className
     * @return \Generator
     */
    public function fetch($className = null) :\Generator
    {
        if (null === $className) {
            while ($row = $this->pdoStatement->fetch(\PDO::FETCH_ASSOC)) {
                yield $row;
            }
        }else{
        while ($row = $this->pdoStatement->fetchObject($className)){
            yield $row;

             }
        }

    }

    public function fetchColumn(int $colNum = 0)
    {
        return $this->pdoStatement->fetchColumn($colNum);
    }
}