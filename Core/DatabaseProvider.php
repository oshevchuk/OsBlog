<?php
/**
 * Created by PhpStorm.
 * User: Matrix
 * Date: 05.10.2017
 * Time: 22:28
 */

namespace Core;

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
    }

    public function getPosts(){
        $posts=$this->pdo->prepare('select * from posts');
        $posts->execute(array());
        return $posts->fetchAll();
    }
}