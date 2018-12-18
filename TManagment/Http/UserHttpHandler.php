<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 18.11.2018 г.
 * Time: 12:57
 */

namespace TManagment\Http;


use Core\DataBinderInterface;
use Core\TemplateInterface;
use TManagment\DTO\UserDTO;
use TManagment\Service\UserServiceInsterface;

class UserHttpHandler extends httpHandlerAbstract
{

    /**
     * @var UserServiceInsterface
     */
    private $userService;

    /**
     * UserHttpHandler constructor.
     * @param UserServiceInsterface $userService
     */
    public function __construct(UserServiceInsterface $userService,
                                TemplateInterface $template,
                                DataBinderInterface $binder)
    {
        parent::__construct($template,$binder);
        $this->userService = $userService;
    }

    public function login(array $formData = []){

        if (!isset($formData['login'])){
            $this->render("users/login");
        }else{
            $this->handlerLoginProcess($formData);
        }
    }

    public function register(array $formData = []){
        if (!isset($formData['register'])){
            $this->render("users/register");
        }else{
            $this->handlerRegisterProcess($formData);
        }

    }

    public function handlerLoginProcess(array $formData = []){

        $this->userService->login($formData['username'],$formData['password']);
        $this->redirect("dashboard.php");

    }

    public function handlerRegisterProcess(array $formData = []){
        $user = $this->binder->bind($formData,UserDTO::class);
        $this->userService->register($user,$formData['confirm_password']);
        $this->redirect("login.php");

    }


}