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
        $this->login=Roles::$guest;
        $this->role=Roles::$guest;
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
                User::$login=$login;
                return "registered";
            };
//            echo "bench!!";
        }else{
            return "invalid login or password";
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