<?php
/**
 * Created by PhpStorm.
 * User: Oshevchuk
 * Date: 08.11.2017
 * Time: 21:31
 */
namespace blog\controllers;

use Core\View;

abstract class Controller
{
    protected $view;
    public function __construct()
    {
        $this->view=new View('layouts/main');
        $this->view->addData('pageTitle', 'Undefined');
    }

    public function changeLayout($name){
        $this->view=new View('layouts/'.$name);
    }

    public function error($code){
        $this->view->load("errors/$code", ['pageTitle'=>'Error', 'pageContent'=>'werewrqwe']);
    }


}