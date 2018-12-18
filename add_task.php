<?php
require_once 'common.php';
$taskReposytory = new \TManagment\Repository\TaskRepository($db,$dataBinder);
$taskService = new \TManagment\Service\TaskService($taskReposytory);
$userService = new \TManagment\Service\UserService(new \TManagment\Repository\UserRepository($db));
$categoryService = new \TManagment\Service\CategoryService(new \TManagment\Repository\CategoryRepository($db));
$taskHandler = new \TManagment\Http\TaskHttpHandler($template,$dataBinder);
$taskHandler->add($taskService,$userService,$categoryService,$_POST);