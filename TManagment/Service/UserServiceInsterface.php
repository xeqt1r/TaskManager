<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 18.11.2018 г.
 * Time: 12:18
 */

namespace TManagment\Service;


use TManagment\DTO\UserDTO;

interface UserServiceInsterface
{
    public function login($userName, $password): bool;

    public function register( UserDTO $user, string $confirmPassword):bool;

    public function getCurentUser(): UserDTO;

}