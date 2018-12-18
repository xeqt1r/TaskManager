<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 18.11.2018 г.
 * Time: 18:59
 */

namespace TManagment\Service;


use TManagment\DTO\TasksDTO;

interface TaskServiceInterface
{

    public function view(int $id): TasksDTO;

    public function viewMyTasks(int $authorId);

    public function insert(TasksDTO $task) :bool;

    public function edit(TasksDTO $task, int $id): bool;

    public function delete(int $id) : bool;

}