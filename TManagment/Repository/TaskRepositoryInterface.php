<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 18.11.2018 г.
 * Time: 17:52
 */

namespace TManagment\Repository;


use TManagment\DTO\TasksDTO;

interface TaskRepositoryInterface
{
    public function count() :int;

    public function findAll(): \Generator;

    public function findOneById(int $id): TasksDTO;

    public function insert(TasksDTO $task) : bool;

    public function update(TasksDTO $task,int $id): bool;

    public function delete(int $id): bool;

    public function findByAuthorId(int $authorId);

}