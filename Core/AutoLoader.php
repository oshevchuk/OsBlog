<?php
/**
 * Created by PhpStorm.
 * User: Oshevchuk
 * Date: 08.11.2017
 * Time: 21:10
 */
namespace Core;

class AutoLoader{
    public static function autoload($path){
        $path="$path.php";
        if(file_exists($path)){
            require $path;
        }
    }
}

\spl_autoload_register('Core\Autoloader::autoload');