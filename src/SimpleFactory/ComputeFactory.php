<?php
/**
 * Created by PhpStorm.
 * User: phpcyy
 * Date: 21/12/2017
 * Time: 2:57 PM
 */

namespace SimpleFactory;


class computeFactory
{
    /**
     * @param $mode
     * @return Compute
     * @throws \Exception
     */
    public static function create($mode): Compute
    {
        $mode = ucwords($mode);
        if (class_exists($mode)) {
            /*
             *  Which way is better?
             */
            return new $mode;
            //return (new ReflectionClass($mode))->newInstance();
        }
        throw new \Exception("Compute type not found.");
    }
}