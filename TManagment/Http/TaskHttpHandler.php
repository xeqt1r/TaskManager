<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 28.11.2018 г.
 * Time: 8:28
 */

namespace TManagment\Http;

use TManagment\DTO\EditTaskDTO;
use TManagment\DTO\TasksDTO;
use TManagment\Service\CategoryServiceInterface;
use TManagment\Service\TaskServiceInterface;
use TManagment\Service\UserServiceInsterface;

class TaskHttpHandler extends httpHandlerAbstract
{
    public function add(TaskServiceInterface $taskService,
                        UserServiceInsterface $userService,
                        CategoryServiceInterface $categoryService,
                        array $formData=[])
    {
        if (!isset($formData['save'])){
            $categoryes = $categoryService->getAll();
            $this->render("tasks/add",$categoryes);
        }else{
            $this->handlerAddProcess($taskService,$userService,$categoryService,$formData);
        }

    }

    public function handlerAddProcess(TaskServiceInterface $taskService,
                                      UserServiceInsterface $userService,
                                      CategoryServiceInterface $categoryService,
                                      array $formData=[])
    {
        $author = $userService->getCurentUser();
        $category = $categoryService->view(intval($formData['category_id']));
        /** @var TasksDTO $task */
        $task = $this->binder->bind($formData,TasksDTO::class);

        $task->setAuthor($author);
        $task->setCategory($category);

        $taskService->insert($task);

        $this->redirect("dashboard.php");

    }

    public function edit(TaskServiceInterface $taskService,
                         UserServiceInsterface $userService,
                         CategoryServiceInterface $categoryService,
                         array $getData=[],array $formData=[])
    {
        if (!isset($formData['edit'])){
            $task  = $taskService->view(intval($getData['id']));
            $editTaskDTO = new EditTaskDTO();
            $categorys = $categoryService->getAll();
            $editTaskDTO->setTask($task);
            $editTaskDTO->setCategory($categorys);

            $this->render("tasks/edit",$editTaskDTO);

        }else{
            $this->editHandlerProcess($taskService,$userService,$categoryService,$getData,$formData);
        }

    }

    public function editHandlerProcess(TaskServiceInterface $taskService,
                                       UserServiceInsterface $userService,
                                       CategoryServiceInterface $categoryService,
                                        array $getData=[],array $formData=[])
    {


        $author = $userService->getCurentUser();
        $category = $categoryService->view(intval($formData['category_id']));
        /**
         * @var TasksDTO $task
         */
        $task = $this->binder->bind($formData,TasksDTO::class);

        $task->setAuthor($author);
        $task->setCategory($category);

        $taskService->edit($task,$getData['id']);

        $this->redirect("dashboard.php");


    }

    public function delete(TaskServiceInterface $taskService,
                           UserServiceInsterface $userService,
                           CategoryServiceInterface $categoryService,
                           array $getData=[],array $formData=[])
    {
        if (!isset($formData['delete'])){
            $task = $taskService->view(intval($getData['id']));
            //$category = $categoryService->view(intval($task->getCategory()->getId()));
            $editTaskDTO = new EditTaskDTO();
            $editTaskDTO->setTask($task);

            $this->render("tasks/delete",$editTaskDTO);

        }else{
            $this->deleteHandlerProcess($taskService,$userService,$categoryService,$getData,$formData);
        }

    }

    public function deleteHandlerProcess(TaskServiceInterface $taskService,
                                         UserServiceInsterface $userService,
                                         CategoryServiceInterface $categoryService,
                                         array $getData=[],array $formData=[])
    {

        $taskService->delete(intval($getData['id']));

        $this->redirect("dashboard.php");
    }
}