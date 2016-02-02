<?php
/**
 * Created by PhpStorm.
 * User: gmartin
 * Date: 25/06/2015
 * Time: 10:25 AM
 */
include_once('class.db.php');

class Usuario {

    public $id;
    public $user_name;
    public $password;
    public $name;
    public $email;
    public $is_admin;

    function __construct(){}
    function __destruct() { unset($this); }


} 