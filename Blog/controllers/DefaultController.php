<?php
/**
 * Created by PhpStorm.
 * User: Oshevchuk
 * Date: 05.10.2017
 * Time: 21:36
 */

namespace blog\controllers;

use Core\DatabaseProvider;

class DefaultController extends Controller{
    private $db;
    public function __construct()
    {
        $this->db=new DatabaseProvider();
        parent::__construct();
    }

    public function index(){
        $posts=$this->db->getPosts();

        $this->view->load('index', ['pageTitle'=>'comments', 'posts' => $posts]);
    }

    public function cat($id=''){
        echo "$id++";
        $this->view->load('index', ['pageTitle'=>"$id comments"]);
    }
}