<?php
/**
 * Created by PhpStorm.
 * User: Oshevchuk
 * Date: 06.10.2017
 * Time: 9:26
 */

namespace Core;
class View{
    private $viewsFolder=APP.'/views';
    private $layoutPath;
    private $data=[];

    public function __construct($layout)
    {
        $layoutPath="$this->viewsFolder/$layout.php";
        if(file_exists($layoutPath)){
            $this->layoutPath=$layoutPath;
        }else{
            throw new \Exception("Layout [$layoutPath] not found");
        }
    }

    public function addData($key, $value=null){
        if(is_array($key)){
            $this->data=array_merge($this->data, $key);
        }else{
            $this->data[$key]=$value;
        }
        return $this;
    }

    public function load($title, array $data=array()){
        $this->addData($data);
        $filePath="$this->viewsFolder/$title.php";
        if(isset($this->layoutPath) && file_exists($filePath)){
            $this->data['pageContent'] = $this->getContent($filePath);
            extract($this->data);
            require $this->layoutPath;
        }else{
            throw new \Exception("View [$filePath] not found");
        }
    }

    public function getContent($pagePath){
        ob_start();
        extract($this->data);
        
        require $pagePath;

        $data=ob_get_contents();
        ob_end_clean();

        return $data;
    }
}