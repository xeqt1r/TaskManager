<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 27.11.2018 г.
 * Time: 9:27
 */

namespace TManagment\Service;


use TManagment\DTO\CategoryDTO;
use TManagment\Repository\CategoryRepositoryInterface;


class CategoryService implements CategoryServiceInterface
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;


    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Generator|CategoryDTO[]
     */

    public function getAll(): \Generator
    {
        return $this->categoryRepository->findAll();
    }

    /**
     * @return \Generator|CategoryDTO[]
     */

    public function report(): \Generator
    {
        return $this->categoryRepository->findTaskPerGroup();
    }

    public function view(int $id): CategoryDTO
    {
        return $this->categoryRepository->findOne($id);
    }
}