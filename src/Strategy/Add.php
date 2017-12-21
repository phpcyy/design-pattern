<?php
/**
 * Created by PhpStorm.
 * User: phpcyy
 * Date: 21/12/2017
 * Time: 2:54 PM
 */

namespace Strategy;


class Add extends Compute
{
    public function getResult(): float
    {
        return $this->number1 + $this->number2;
    }
}