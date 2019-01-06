<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 18.11.2018 г.
 * Time: 13:27
 */

namespace TManagment\Http;


use TManagment\Service\TaskServiceInterface;
use TManagment\Service\UserServiceInsterface;

class HomeHttpHandler extends httpHandlerAbstract
{
    public function index()
    {

        if (!isset($_SESSION['id'])){
            $this->render("users/login");
        }else{
            $this->redirect("dashboard.php");
        }
    }

    public function dashboard(TaskServiceInterface $taskService)
    {
        if (!isset($_SESSION['id'])){
            $this->redirect("login.php");
        }


        $authorId = $_SESSION['id'];
        $taskDTO = $taskService->viewMyTasks(intval($authorId));
        $this->render("tasks/dashboard",$taskDTO);


    }

    public function logout(){

        session_destroy();
        $this->redirect("login.php");
    }


}