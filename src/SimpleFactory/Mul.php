<?php
/**
 * Created by PhpStorm.
 * User: phpcyy
 * Date: 21/12/2017
 * Time: 2:55 PM
 */

namespace SimpleFactory;


class Mul extends Compute
{
    public function getResult(): float
    {
        return $this->number1 * $this->number2;
    }
}