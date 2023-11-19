<?php
namespace banco;
//Singleton

class Conexao{

    private static $instance;

    public static function getConn($db){

        if(!isset(self::$instance)):
            self::$instance = new \PDO('mysql:host=localhost;dbname='.$db.';charset=utf8','root','');
        endif;
                return self::$instance;
    }
}