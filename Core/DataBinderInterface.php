<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 21.10.2018 г.
 * Time: 12:15
 */

namespace Core;


interface DataBinderInterface
{
    public function bind(array $form,$className);
}