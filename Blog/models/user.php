<?php
/**
 * Created by PhpStorm.
 * User: Oshevchuk
 * Date: 13.10.2017
 * Time: 16:17
 */
namespace models;

class user{
    public $login;
    public $role;
    function __construct()
    {
        $this->login=Roles::$guest;
        $this->role=Roles::$guest;
    }
}