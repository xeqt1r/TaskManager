<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 29.11.2018 г.
 * Time: 8:34
 */

namespace TManagment\DTO;


class EditTaskDTO
{

    /**
     * @var TasksDTO
     */
    private $task;
    /**
     * @var CategoryDTO[]
     */
    private $category;

    /**
     * @return TasksDTO
     */
    public function getTask(): TasksDTO
    {
        return $this->task;
    }

    /**
     * @param TasksDTO $task
     */
    public function setTask(TasksDTO $task): void
    {
        $this->task = $task;
    }

    /**
     * @return CategoryDTO[]
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param CategoryDTO[] $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }


}