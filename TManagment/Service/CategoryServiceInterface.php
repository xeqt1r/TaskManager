<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 27.11.2018 г.
 * Time: 9:27
 */

namespace TManagment\Service;


use TManagment\DTO\CategoryDTO;

interface CategoryServiceInterface
{
    /**
     * @return \Generator|CategoryDTO[]
     */
    public function getAll() : \Generator;

    public function view(int $id): CategoryDTO;

    /**
     * @return \Generator|CategoryDTO[]
     */
    public function report() : \Generator;

}