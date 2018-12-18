<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 18.11.2018 г.
 * Time: 17:47
 */

namespace TManagment\DTO;


class CategoryDTO
{

    private $id;
    private $name;
    private $taskCount;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getTaskCount()
    {
        return $this->taskCount;
    }

    /**
     * @param mixed $taskCount
     */
    public function setTaskCount($taskCount)
    {
        $this->taskCount = $taskCount;
    }


}