<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 18.11.2018 г.
 * Time: 19:17
 */

namespace TManagment\Service;


use TManagment\DTO\TasksDTO;
use TManagment\Repository\TaskRepositoryInterface;

class TaskService implements TaskServiceInterface
{
    /**
     * @var TaskRepositoryInterface
     */
    private $taskReposytory;

    /**
     * TaskService constructor.
     * @param $taskReposytory
     */
    public function __construct(TaskRepositoryInterface $taskReposytory)
    {
        $this->taskReposytory = $taskReposytory;
    }



    public function view(int $id): TasksDTO
    {
        return $this->taskReposytory->findOneById($id);
    }


    public function viewMyTasks(int $authorId)
    {
        return $this->taskReposytory->findByAuthorId($authorId);
    }

    public function insert(TasksDTO $task): bool
    {
        return $this->taskReposytory->insert($task);
    }

    public function edit(TasksDTO $task, int $id): bool
    {
        return $this->taskReposytory->update($task,$id);
    }

    public function delete(int $id): bool
    {
        return $this->taskReposytory->delete($id);
    }
}