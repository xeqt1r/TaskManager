<?php
/**
 * Created by PhpStorm.
 * User: mira
 * Date: 29.8.2018 г.
 * Time: 9:45
 */

namespace Database;


interface ResulSetInterface
{
    public function fetch($className = null) : \Generator;

    public function fetchColumn(int $colNum = 0);
}