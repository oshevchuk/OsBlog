<?php
/**
 * Created by PhpStorm.
 * User: Oshevchuk
 * Date: 05.10.2017
 * Time: 21:03
 */

session_start();
require_once 'Core/AutoLoader.php';

define('APP', 'Fabric');

new \Core\Init;