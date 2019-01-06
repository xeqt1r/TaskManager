<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 18.11.2018 г.
 * Time: 17:58
 */

namespace TManagment\Repository;


use Core\DataBinderInterface;
use Database\DatabaseInterface;
use TManagment\DTO\CategoryDTO;
use TManagment\DTO\TasksDTO;
use TManagment\DTO\UserDTO;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;
    /**
     * @var DataBinderInterface
     */
    private $databinder;

    /**
     * TaskRepository constructor.
     * @param DatabaseInterface $db
     * @param DataBinderInterface $databinder
     */
    public function __construct(DatabaseInterface $db, DataBinderInterface $databinder)
    {
        $this->db = $db;
        $this->databinder = $databinder;
    }


    public function count(): int
    {
        $query = "
        SELECT COUNT(id) AS taskCount
        FROM tasks
        ";

        return intval($this->db
            ->query($query)
            ->execute()
            ->fetchColumn());

    }

    public function findAll(): \Generator
    {
        $query = "
            SELECT 
                tasks.id AS task_id,
                title,
                description,
                location,
                users.id AS author_id,
                users.username AS username,
                users.password AS password,
                users.first_name AS firstName,
                users.last_name AS lastName,
                category.id AS category_id,
                 category.name AS name,
                started_on,
                due_date
             FROM
             tasks
             INNER JOIN
             category
             ON tasks.category_id = category.id
             INNER JOIN 
             users
             ON tasks.author_id = users.id
             ";


        $lazyTasksResult =  $this->db
            ->query($query)
            ->execute()
            ->fetch();

        foreach ($lazyTasksResult as $row){

            /**
             * @var TasksDTO$task;
             * @var UserDTO $author;
             * @var CategoryDTO $category;
             */
            $task = $this->databinder->bind($row,TasksDTO::class);
            $task->setId($row['task_id']);

            $author = $this->databinder->bind($row,UserDTO::class);
            $author->setId($row['author_id']);

            $category = $this->databinder->bind($row,CategoryDTO::class);
            $category->setId($row['category_id']);

            $task->setAuthor($author);
            $task->setCategory($category);

            yield $task;
        }
    }


    public function findByAuthorId(int $authorId)
    {
        $query = "SELECT * 
                  FROM tasks
                  WHERE author_id = ?";

        return $this->db
            ->query($query)
            ->execute($authorId)
            ->fetch(TasksDTO::class);


    }
    public function findOneById(int $id): TasksDTO
    {
        $query = "
        SELECT id,title,description,location,author_id,category_id,started_on,due_date
        FROM tasks
        WHERE id = ?
        ";

        return $this->db
            ->query($query)
            ->execute($id)
            ->fetch(TasksDTO::class)
            ->current();
    }

    public function insert(TasksDTO $task): bool
    {
        $query = "
                INSERT INTO tasks
                (title, description, location, author_id, category_id, started_on, due_date)
                 VALUES (?,?,?,?,?,?,?)";

        $this->db->query($query)
            ->execute($task->getTitle(),
                $task->getDescription(),
                $task->getLocation(),
                $task->getAuthor()->getId(),
                $task->getCategory()->getId(),
                $task->getStartedOn(),
                $task->getDueDate()
            );

        return true;
    }

    public function update(TasksDTO $task, int $id): bool
    {
        $query = "UPDATE tasks
                SET title=?,
                    description=?,
                    location=?,
                    author_id=?,
                    category_id=?,
                    started_on=?,
                    due_date=?
                WHERE id= ?
        ";

        $this->db->query($query)
            ->execute($task->getTitle(),
                      $task->getDescription(),
                      $task->getLocation(),
                      $task->getAuthor()->getId(),
                      $task->getCategory()->getId(),
                      $task->getStartedOn(),
                      $task->getDueDate(),
                      $id
            );

        return true;
    }



    public function delete(int $id): bool
    {
        $query = "DELETE 
                  FROM tasks
                  WHERE id = ?";

        $this->db->query($query)
            ->execute($id);

        return true;
    }
}