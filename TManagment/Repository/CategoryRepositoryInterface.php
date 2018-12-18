<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 27.11.2018 г.
 * Time: 9:23
 */

namespace TManagment\Repository;


use TManagment\DTO\CategoryDTO;

interface CategoryRepositoryInterface
{
    public function findAll():\Generator;

    public function findOne(int $id) : CategoryDTO;

    public function findTaskPerGroup():\Generator;

}