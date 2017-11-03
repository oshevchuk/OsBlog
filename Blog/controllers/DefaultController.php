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
        echo "$id++";
        $this->view->load('index', ['pageTitle' => "$id comments"]);
    }

    public function post($id)
    {
//        echo 'heare!';
//        print_r($id);
        $post = $this->db->getPost($id);
        print_r($post);
//        $this->changeLayout('post');
        $this->view->load('post', ['pageTitle' => 'os-blog', 'posts' => $post]);
    }

    public function t($id)
    {
        echo "-ok-";
        print_r( $id);
        return 'ok';
    }
    
    public function register(){

        $this->view->load('register', ['pageTitle' => 'os-blog', 'reginfo'=>$this->user->Register()]);
    }

    public  function Logout(){
        if($this->user->Logout()){
            header('Location: /dfg');
        };
//        $this->view->load('register', ['pageTitle' => 'os-blog', 'reginfo'=>$this->user->Register()]);
    }
}