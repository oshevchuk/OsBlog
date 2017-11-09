<?php
/**
 * Created by PhpStorm.
 * User: Oshevchuk
 * Date: 08.11.2017
 * Time: 21:03
 */

session_start();
require_once 'Core/AutoLoader.php';

define('APP', 'Blog');

new \Core\Init;