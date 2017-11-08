<?php
/**
 * Created by PhpStorm.
 * User: Matrix
 * Date: 05.10.2017
 * Time: 22:28
 */

namespace Core;

use Core\Models\User;
use PDO;


class DatabaseProvider{
    private $dns;
    private $opt;
    private $pdo;

    public function __construct()
    {
        $settings = require 'dbConfig.php';
//        print_r($settings);
        $dns=$settings['dsn'];
        $opt=array(
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
        );
//        echo $settings['dsn']."<<";
        $pdo=new PDO($dns, $settings['login'], $settings['password']);

//        $dbh = new PDO('mysql:host=localhost;dbname=osblog', 'root', '');
        $this->dns=$dns;
        $this->opt=$opt;
        $this->pdo=$pdo;
//
//        $sth = $this->db->prepare("SELECT id FROM users WHERE login = :login AND password = MD5(:password)");
//        $sth->execute(array(
//            ':login' => $_POST['login'],
//            ':password' => $_POST['password']
//        ));
    }

    public function getPosts(){
        $posts=$this->pdo->prepare('select * from posts');
        $posts->execute(array());
        return $posts->fetchAll();
    }

    public function getPost($id=''){
        $posts=$this->pdo->prepare('select * from posts WHERE id = "'.$id.'"');
        $posts->execute(array());
        return $posts->fetchAll();
    }

    public function getUser($login){
        $posts=$this->pdo->prepare('select * from users WHERE login = :login');
        $posts->execute(array(
            ':login' => $login
        ));
        return $posts->fetchAll();
    }
    public function UserLogin($login, $password){
        $posts=$this->pdo->prepare('select * from users WHERE login = :login and password = :password');
        $posts->execute(array(
            ':login' => $login,
            ":password"=>$password
        ));
        return $posts->fetchAll();
    }

    public function registerUser($login, $password){
        $posts=$this->pdo->prepare('insert into users (login, password) values (:login, :password)');
        $posts->execute(array(
            ':login' => $login,
            ':password' => $password
        ));
        return $posts->fetchAll();
    }

    public function addPost($title, $text){
        $posts=$this->pdo->prepare('insert into posts (caption, text, author_id) values (:caption, :text, :author)');
        $posts->execute(array(
            ':caption' => $title,
            ':text' => $text,
            ':author' => User::$login
        ));
        return $posts->fetchAll();
    }
}