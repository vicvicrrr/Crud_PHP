<?php

namespace banco

class Conexao{

    private static $instance;

    public static function getconn(){

        if(!isset(self::$instance)){
            self::$instance = new PDO('mysql:host=localhost;dbname=produto;charset=utf8','root','');
        }
                self::$instance;
        
    }
}