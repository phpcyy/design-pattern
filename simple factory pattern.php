<?php

/**
 * Class Compute
 */
abstract class Compute
{
    protected $number1;
    protected $number2;

    /**
     * @return float
     */
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
             *  I don't know which way to create the class is better. Please reply me(phpcyy@163.com) if you have a good answer.
             */
            return new $mode;
            //return (new ReflectionClass($mode))->newInstance();
        }
        throw new Exception("Compute type not found.");
    }
}

try {
    $compute = computeFactory::create("sub");
    $compute->number1 = 1;
    $compute->number2 = 2;
    echo $compute->getResult();
} catch (Error $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
