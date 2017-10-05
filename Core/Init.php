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
    private $args=[];
    public function __construct()
    {
        $this->InitRoute()->CallAction();
    }

    public function InitRoute(){
        $url = isset($_GET['_uri'])?$_GET['_uri']:'';
        $segments=explode('/', $url);
        if(!empty($segments[0])){
            $this->action=$segments[0];
            unset($segments[0]);
            if(!empty($segments[1])){
                $this->args=$segments;
            }
        }
        return $this;
    }

    public function CallAction(){
        if(class_exists($this->controller)){
            $Controller=new $this->controller();
            if(method_exists($Controller, $this->action)){
                call_user_func_array([$Controller, $this->action], $this->args);
            }else{
                $Controller->error(404);
            }
        }else{
            throw new \Exception("Controller [$this->controller] not found");
        }
    }
}