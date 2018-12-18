<?php
/**
 * Created by PhpStorm.
 * User: mira
 * Date: 29.8.2018 г.
 * Time: 9:41
 */

namespace Database;


interface DatabaseInterface
{
    public function query(string $query) : StatementInterface;

    public function getLastError(): array;


}