<?php
/**
 * Created by PhpStorm.
 * User: Oshevchuk
 * Date: 05.10.2017
 * Time: 21:36
 */

namespace blog\controllers;

use Core\DatabaseProvider;

class DefaultController extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new DatabaseProvider();
        parent::__construct();
    }

    public function index()
    {
        $posts = $this->db->getPosts();

        $this->view->load('post', ['pageTitle' => 'os-blog', 'posts' => $posts]);
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
        $this->changeLayout('post');
        $this->view->load('post', ['pageTitle' => 'os-blog', 'posts' => $post]);
    }

    public function t($id)
    {
        echo "-ok-";
        print_r( $id);
        return 'ok';
    }
}