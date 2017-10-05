<?php
/**
 * Created by PhpStorm.
 * User: Matrix
 * Date: 05.10.2017
 * Time: 21:30
 */
namespace Core;

class Init{
    private $controller = APP.'\controllers\DefaultController';
    private $action = 'index';

    public function __construct()
    {
        echo "111";
    }
}