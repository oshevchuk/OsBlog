<?php
/**
 * Created by PhpStorm.
 * User: Matrix
 * Date: 05.10.2017
 * Time: 21:30
 */
namespace Core;

use Core\Models\User;

class Init{
    private $controller = APP.'\controllers\DefaultController';
    private $action = 'index';
    private $args=[];
    public function __construct()
    {
        $this->InitRoute()->CallAction();

    }

    public function InitRoute(){
//        print_r($_SERVER['REQUEST_URI']);

//        $url = isset($_GET['_uri'])?$_GET['_uri']:'';
        $url = isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:'';

        $segments=explode('/', $url);
        unset($segments[0]);
//        print_r($segments);

        if(!empty($segments[1])){
            $this->action=$segments[1];
//            echo "$this->action -----";

            unset($segments[1]);
            if(!empty($segments[2])){
                $this->args=$segments;
            }
        }
        return $this;
    }

    public function CallAction(){
        if(class_exists($this->controller)){
            $Controller=new $this->controller();
//            print_r($Controller->t());
//            echo method_exists($Controller, $this->action);
//            $this->action='t';
//            print_r($this->args);
//            call_user_func_array([$Controller, $this->action], $this->args);

            if(method_exists($Controller, $this->action)){
                call_user_func_array([$Controller, $this->action], $this->args);
//                echo '>>';
            }else{
                $Controller->error(404);
            }
        }else{
            throw new \Exception("Controller [$this->controller] not found");
        }
    }
}