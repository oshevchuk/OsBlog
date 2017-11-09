<?php
/**
 * Created by PhpStorm.
 * User: Matrix
 * Date: 08.11.2017
 * Time: 22:28
 */

namespace Core;

use Core\Models\User;
use PDO;


class DatabaseProvider{
    private $dns;
    private $opt;
    private $pdo;
    static $perPage=5;
    static $total=0;
    static $navLink=0;

    public function __construct()
    {
        DatabaseProvider::$perPage=5;
        $settings = require 'dbConfig.php';

        $dns=$settings['dsn'];
        $opt=array(
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
        );

        $pdo=new PDO($dns, $settings['login'], $settings['password']);


        $this->dns=$dns;
        $this->opt=$opt;
        $this->pdo=$pdo;

    }

    public function paginator($page){
        $posts=$this->pdo->prepare('select count(*) as total from posts order by id desc');
        $posts->execute(array());

        $page_per=5;
        $start=$page_per*($page-1);
        $total=$posts->fetchAll()[0]["total"]/$page_per;


        $links="";
        for($i=0; $i<=$total; $i++){
            $links.= '<a href="/page/'. $i.'">'.$i.'</a>';
        }

        DatabaseProvider::$navLink=$links;
        DatabaseProvider::$perPage=$page_per;
        DatabaseProvider::$total=$total;
        echo $links;
    }

    public function getPostsCat($cat=0){
        $posts=$this->pdo->prepare('select * from posts WHERE category = "'.$cat.'"');
        $posts->execute(array());
        return $posts->fetchAll();
    }
    public function getPosts($page=0){

        $this->paginator(0);

        $posts=$this->pdo->prepare('select * from posts order by id desc limit '.($page*DatabaseProvider::$perPage).', '.DatabaseProvider::$perPage);
        $posts->execute(array(


        ));
        return $posts->fetchAll();
    }

    public function getPost($id=''){
        $posts=$this->pdo->prepare('select * from posts WHERE id = "'.$id.'"');
        $posts->execute(array());
        return $posts->fetchAll();
    }

    public function removePost($id){
        $posts=$this->pdo->prepare('delete from posts WHERE id = :id');
        $posts->execute(array(
            ':id' => $id
        ));
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

    public function addPost($title, $text, $image, $category){
        $posts=$this->pdo->prepare('insert into posts (caption, text, author_id, category, img) values (:caption, :text, :author, :category, :img)');
        $posts->execute(array(
            ':caption' => $title,
            ':text' => $text,
            ':author' => User::$login,
            ':category' => $category,
            ':img' => $image,
        ));
        return $posts->fetchAll();
    }

    public function addComment($post, $text){
//        echo $post; echo $text;
        $posts=$this->pdo->prepare('insert into comments (post_it, comment, author) values (:post_id, :comment, :author)');
        $posts->execute(array(
            ':post_id' => $post,
            ':comment' => $text,
            ':author' => $_COOKIE["login"]
        ));
        return $posts->fetchAll();
    }

    public function getComment($post){
        $posts=$this->pdo->prepare('select * from comments WHERE post_it = :post_it');
        $posts->execute(array(
            ':post_it' => $post
        ));
        return $posts->fetchAll();
    }

    public function likePost($id){
        $posts=$this->pdo->prepare('update posts set posts.like = posts.like + 1 WHERE posts.id = :id');
        $posts->execute(array(
            ':id' => $id
        ));
        return $posts->fetchAll();
    }

    /**
     * @return int
     */
    public static function getNavLink()
    {
        return self::$navLink;
    }
}