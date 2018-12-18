<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 18.11.2018 г.
 * Time: 12:22
 */

namespace TManagment\Service;


use TManagment\DTO\UserDTO;
use TManagment\Repository\UserRepositoryInterface;

class UserService implements UserServiceInsterface
{

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($userName, $password): bool
    {
       $user = $this->userRepository->findOneByUserName($userName);
       if (null===$user){
           echo "User Name NOT Found!!!";
       }

       $passwordHash = $user->getPassword();
       if(!password_verify($password,$passwordHash)){
           echo "Wrong password";
       }

       $_SESSION['id'] = $user->getId();

       return true;

    }

    public function register(UserDTO $user, string $confirmPassword): bool
    {
        if ($user->getPassword() != $confirmPassword){
            echo "password mismatch";
        }

        $plainPassword = $user->getPassword();
        $passwordHash = password_hash($plainPassword,PASSWORD_BCRYPT);
        $user->setPassword($passwordHash);

        return $this->userRepository->insert($user);
    }

    public function getCurentUser(): UserDTO
    {
        if (!isset($_SESSION['id'])){
            echo "No current User";
        }

        return $this->userRepository->findOneById(intval($_SESSION['id']));
    }
}