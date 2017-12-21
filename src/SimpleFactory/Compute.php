<?php
/**
 * Created by PhpStorm.
 * User: phpcyy
 * Date: 21/12/2017
 * Time: 2:53 PM
 */

namespace SimpleFactory;


abstract class Compute
{
    protected $number1;
    protected $number2;

    public abstract function getResult(): float;

    /**
     * @param $name
     * @param $value
     * @throws \Exception
     */
    public function __set($name, $value)
    {
        if (!in_array($name, ['number1', 'number2']) || !is_numeric($value)) {
            throw new \Exception("input numbers is invalid");
        }
        $this->$name = $value;
    }
}