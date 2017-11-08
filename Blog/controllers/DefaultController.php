<?php
/**
 * Created by PhpStorm.
 * User: Oshevchuk
 * Date: 05.10.2017
 * Time: 21:36
 */

namespace blog\controllers;

use Core\DatabaseProvider;
use Core\Models\Roles;
use Core\Models\User;

class DefaultController extends Controller
{
    private $db;
    private $user ;
    public function __construct()
    {
        $this->db = new DatabaseProvider();
        parent::__construct();
//        User::$login=Roles::$guest;
        User::$role=Roles::$guest;
        $this->user=new User();
        $this->user->Check();
//        echo "*".$_SESSION["login"].'*'.User::$login;
    }

    public function index()
    {
        $posts = $this->db->getPosts();

        $this->view->load('index', ['pageTitle' => 'os-blog', 'posts' => $posts]);
    }

    public function cat($id = '')
    {
//        echo "$id++";
        $this->view->load('index', ['pageTitle' => "$id comments"]);
    }

    public function post($id)
    {
        $post = $this->db->getPost($id);
        $this->view->load('post', ['pageTitle' => 'os-blog', 'posts' => $post]);
    }

    public function t($id)
    {
//        echo "-ok-";
        print_r( $id);
        return 'ok';
    }
    
    public function register(){

        $this->view->load('register', ['pageTitle' => 'os-blog', 'reginfo'=>$this->user->Register()]);
    }

    public  function Logout(){
        if($this->user->Logout()){
            User::$login="guest";
            setcookie("login", "guest");
            header('Location: /');
        };
    }

    public function login(){
        if(isset($_POST["login"])){
//            echo count($this->db->UserLogin($_POST["login"], $_POST["password"]));
            if( count($this->db->UserLogin($_POST["login"], $_POST["password"]))==1){
//                echo "----";
                User::$login=$_POST["login"];
//                $_COOKIE["login"]=$_POST["login"];
                setcookie("login", $_POST["login"]);
//                echo $_POST["login"];;
                header('Location: /');
            }else{
                User::$login="guest";
//                $_COOKIE["login"]="guest";
                setcookie("login", "guest");
                $this->view->load('login', ['pageTitle' => 'os-blog', 'reginfo'=>$this->user->Register()]);
            }
        }else
            $this->view->load('login', ['pageTitle' => 'os-blog', 'reginfo'=>$this->user->Register()]);
    }

    public function addPost(){
        if(isset($_POST["title"])){
            $this->db->addPost($_POST["title"], $_POST["text"]);
//            echo $_POST["text"];
        }else {

            if ($_COOKIE["login"] == "admin")
                $this->view->load('addPost', ['pageTitle' => 'os-blog', 'reginfo' => $this->user->Register()]);
            else
                header('Location: /');
        }
    }
}