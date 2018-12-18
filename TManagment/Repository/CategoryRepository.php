<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 27.11.2018 г.
 * Time: 9:25
 */

namespace TManagment\Repository;


use Database\DatabaseInterface;
use TManagment\DTO\CategoryDTO;


class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;


    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    public function findAll(): \Generator
    {
        $query = "
            SELECT id,name
            FROM category
       ";

        return $this->db->query($query)
            ->execute()->fetch(CategoryDTO::class);
    }

    public function findTaskPerGroup(): \Generator
    {
        $query = "
            SELECT 
            category.id,
            name,
            COUNT(tasks.id) AS taskCount
            FROM
            category
            INNER JOIN 
            tasks
            ON 
            tasks.category_id = category.id
            GROUP BY
            category.id
            
            
        ";

        return $this->db->query($query)
            ->execute()->fetch(CategoryDTO::class);

    }

    public function findOne(int $id): CategoryDTO
    {
        $query = "
            SELECT id,name
            FROM category
            WHERE id = ?
       ";

        return $this->db->query($query)
            ->execute($id)->fetch(CategoryDTO::class)
            ->current();
    }
}