<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 18.11.2018 г.
 * Time: 17:35
 */

namespace TManagment\DTO;


class TasksDTO
{

    private $id;
    private $title;
    private $description;
    private $location;
    /**
     * @var UserDTO
     */
    private $author;
    /**
     * @var CategoryDTO
     */
    private $category;

    private $startedOn;
    private $dueDate;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return UserDTO
     */
    public function getAuthor(): UserDTO
    {
        return $this->author;
    }

    /**
     * @param UserDTO $author
     */
    public function setAuthor(UserDTO $author)
    {
        $this->author = $author;
    }

    /**
     * @return CategoryDTO
     */
    public function getCategory(): CategoryDTO
    {
        return $this->category;
    }

    /**
     * @param CategoryDTO $category
     */
    public function setCategory(CategoryDTO $category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getStartedOn()
    {
        return $this->startedOn;
    }

    /**
     * @param mixed $startedOn
     */
    public function setStartedOn($startedOn)
    {
        $this->startedOn = $startedOn;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param mixed $dueDate
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }


}