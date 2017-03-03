<?php

abstract class Compute
{
    protected $number1;
    protected $number2;

    public abstract function getResult():float;

    public function __set($name, $value)
    {
        if (!in_array($name, ['number1', 'number2']) || !is_numeric($value)) {
            throw new Exception("Numbers you input are invalid");
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

class computeContext
{
    private $compute;
    public function __construct($mode)
    {
        $mode = ucwords($mode);
        if (class_exists($mode)) {
           $this->compute = new $mode();
        }else{
            throw new Exception("Compute type not found.");
        }
    }

    public function getResult($number1, $number2){
        $this->compute->number1 = $number1;
        $this->compute->number2 = $number2;
        return $this->compute->getResult();
    }
}

try {
    $context = new computeContext("div");
    echo $context->getResult(1,2);
} catch (Throwable $e) {
    echo $e->getMessage();
}