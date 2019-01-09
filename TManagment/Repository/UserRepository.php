<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 18.11.2018 г.
 * Time: 11:54
 */

namespace TManagment\Repository;


use Database\DatabaseInterface;
use TManagment\DTO\UserDTO;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * UserRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function findOneByUserName(string $userName): ?UserDTO
    {
        $query = "
        SELECT id, username, password, first_name, last_name
        FROM users
        WHERE username = ?
        ";

        return $this->db
            ->query($query)
            ->execute($userName)
            ->fetch(UserDTO::class)
            ->current();
    }

    public function insert(UserDTO $user): bool
    {
        $query = "
        INSERT INTO users
        (username, password, first_name, last_name) 
        VALUE 
        (?,?,?,?)
        ";

       $this->db
            ->query($query)
            ->execute(
                $user->getUserName(),
                $user->getPassword(),
                $user->getFirstName(),
                $user->getLastName()
            );

        return true;
    }

    public function findOneById(int $id): UserDTO
    {
        $query = "
        SELECT * 
        FROM users
        WHERE id = ?
        ";

        return $this->db
            ->query($query)
            ->execute($id)
            ->fetch(UserDTO::class)
            ->current();
    }
}