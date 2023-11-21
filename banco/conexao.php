<?php
namespace banco;
//Singleton

class Conexao{

    private static $instance;

    public static function getConn(){
    try{
        if(!isset(self::$instance)):
            self::$instance = new \PDO('mysql:host=localhost;dbname=produto;charset=utf8','root','');
        endif;
                return self::$instance;
    }catch(PDOException $err){
            echo "Erro: conecao nao concedida".$err->getMessage();
    }
    }
}
