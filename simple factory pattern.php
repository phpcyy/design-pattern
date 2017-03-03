<?php

abstract class Compute
{
    protected $number1;
    protected $number2;

    public abstract function getResult():float;

    public function __set($name, $value)
    {
        if (!in_array($name, ['number1', 'number2']) || !is_numeric($value)) {
            throw new Exception("input numbers is invalid");
        }
        $this->$name = $value;
    }
}

class Add extends Compute
{
    public function getResult():float
    {
        return $this->number1 + $this->number2;
    }
}

class Sub extends Compute
{
    public function getResult():float
    {
        return $this->number1 - $this->number2;
    }
}

class Mul extends Compute
{
    public function getResult():float
    {
        return $this->number1 * $this->number2;
    }
}

class Div extends Compute
{
    public function getResult():float
    {
        return $this->number1 / $this->number2;
    }
}

class computeFactory
{
    public static function create($mode):Compute
    {
        $mode = ucwords($mode);
        if (class_exists($mode)) {
            /*
             *  Which way is better?
             */
            return new $mode;
            //return (new ReflectionClass($mode))->newInstance();
        }
        throw new Exception("Compute type not found.");
    }
}

try {
    $compute = computeFactory::create("add");
    $compute->number1 = 1;
    $compute->number2 = 2;
    echo $compute->getResult();
} catch (Throwable $e) {
    echo $e->getMessage();
}