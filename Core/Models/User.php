<?php
/**
 * Created by PhpStorm.
 * User: Oshevchuk
 * Date: 13.10.2017
 * Time: 16:17
 */

namespace Core\Models;

use Core\DatabaseProvider;
class User{
    public static $login;
    public static $role;
    private $db;
    function __construct()
    {
        $this->db = new DatabaseProvider();
//        $this->login=Roles::$guest;
//        $this->role=Roles::$guest;
    }

    public static function setUser($login){
        User::$login=$login;
        
    }

    public function Register(){
        $login=User::CheckInput($_POST["login"]);
        $pass=User::CheckInput($_POST["password"]);
        if($login && $pass){
//            echo  $login, $pass;
            $request=$this->db->getUser($login);
            if(count($request)>0){
                return "user is registered";
            }else{
                $this->db->registerUser($login, $pass);
                $_COOKIE["login"]=$login;
                User::$login=$_POST["login"];
//                $_COOKIE["login"]=$_POST["login"];
                setcookie("login", $_POST["login"]);
//                echo $_POST["login"];;
                header('Location: /');
                return "registered";
            };
//            echo "bench!!";
        }else{
            return "invalid login or password";
        }
    }

    public function Check(){
        if(isset($_COOKIE["login"]) && $_COOKIE["login"]!=""){
            User::$login=$_COOKIE["login"];
            return true;
        }else{
            User::$login=Roles::$guest;
            return false;
        }
//        echo $_COOKIE["login"].'<br>**--**';
    }

    public function Logout(){
        if (isset($_COOKIE["login"])){
            $_COOKIE["login"]="";
//            header("Refresh:0");
//            header('Location: ');
            return true;
        }
    }

    public static function CheckInput($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        if(strlen($data)>0)
            return $data;
        return null;
    }
}