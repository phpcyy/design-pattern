<?php
/**
 * Created by PhpStorm.
 * User: phpcyy
 * Date: 21/12/2017
 * Time: 3:06 PM
 */

namespace Strategy;


class ComputeContext
{
    /**
     * @var Compute
     */
    private $compute;

    public function __construct(Compute $compute)
    {
        $this->compute = $compute;
    }

    public function getResult($number1, $number2)
    {
        $this->compute->number1 = $number1;
        $this->compute->number2 = $number2;
        return $this->compute->getResult();
    }
}