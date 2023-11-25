<?php
session_start();
ob_start();

if((!isset($_SESSION['id'])) AND (!isset($_SESSION['usuario']))){
    $_SESSION['msg'] = "<p style='color: #ff0000'>ERRO! Pagina restrita, faça o login para acessar a pagina!</p>";
    header("Location: index.php");
}

require 'banco\Produto.php';
require 'banco\ProdutoDAO.php';


$produto = new \banco\Produto();
$produtoDao = new \banco\ProdutoDao();   

$idProd = $_POST['input_id'];
$nomeProd = $_POST['input_nome'];
$descProd = $_POST['input_des'];

if(!empty($idProd)){
    $produto->setId($idProd);
    $produto->setNome($nomeProd);
    $produto->setDescricao($descProd);

    $produtoDao->update($produto);
    }
    