<?php
/**
 * Created by PhpStorm.
 * User: makrem
 * Date: 06/04/2017
 * Time: 6:23 PM
 */
class AdminController
{
    function __construct()
    {


    }
    protected static function checkAccess(){
        session_start();

        if(!isset($_SESSION['user'])){
            header('Location: /test/users/login');
            die("vous n'avez pas l'accees");
        }else{
            return true;

        }
    }

}