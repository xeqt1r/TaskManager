<?php
spl_autoload_register();
session_start();
$dbInfo = parse_ini_file('Config/db.ini');
$db = new \Database\PDODatabase(new PDO($dbInfo['dsn'],$dbInfo['user'],$dbInfo['pass']));
$template = new \Core\Template();
$dataBinder = new \Core\DataBinder();


$homeHandler = new \TManagment\Http\HomeHttpHandler($template,$dataBinder);
$taskReposiroy = new \TManagment\Repository\TaskRepository($db,$dataBinder);
$taskService = new \TManagment\Service\TaskService($taskReposiroy);
$homeHandler->dashboard($taskService);





