<?php
require_once 'common.php';
$taskRepository = new \TManagment\Repository\TaskRepository($db,$dataBinder);
$taskService = new \TManagment\Service\TaskService($taskRepository);
$userService = new \TManagment\Service\UserService(new \TManagment\Repository\UserRepository($db));
$categoryService = new \TManagment\Service\CategoryService(new \TManagment\Repository\CategoryRepository($db));
$taskHandler = new \TManagment\Http\TaskHttpHandler($template,$dataBinder);
$taskHandler->edit($taskService,$userService,$categoryService,$_GET,$_POST);
