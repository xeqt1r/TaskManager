<?php
require_once 'common.php';
$userService = new \TManagment\Service\UserService(new \TManagment\Repository\UserRepository($db));
$userHandler = new \TManagment\Http\UserHttpHandler($userService,$template,$dataBinder);
$userHandler->register($_POST);