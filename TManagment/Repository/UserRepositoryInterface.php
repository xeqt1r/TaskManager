<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 18.11.2018 г.
 * Time: 11:48
 */

namespace TManagment\Repository;


use TManagment\DTO\UserDTO;

interface UserRepositoryInterface
{
    public function findOneByUserName(string $userName): ?UserDTO;

    public function insert(UserDTO $user) : bool;

    public function findOneById(int $id): UserDTO;

}