<?php
/**
 * Created by PhpStorm.
 * User: mira
 * Date: 29.8.2018 г.
 * Time: 9:43
 */

namespace Database;


interface StatementInterface
{
    public function execute(...$params) : ResulSetInterface;
}