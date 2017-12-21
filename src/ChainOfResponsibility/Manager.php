<?php
/**
 * Created by PhpStorm.
 * User: phpcyy
 * Date: 21/12/2017
 * Time: 2:49 PM
 */

namespace ChainOfResponsibility;


interface Manager
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function handle(Request $request);
}