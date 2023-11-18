<?php

require 'banco\Produto.php';
require 'banco\ProdutoDAO.php';

$produto = new \banco\Produto();

$teste='teste2';
$produto->setId(1);
$produto->setNome($teste);
$produto->setPreco('12');
$produto->setQuantidade('1');
$produto->setDescricao('ddd');

$produtoDao = new \banco\ProdutoDao();

//$produtoDao->create($produto);

$produtoDao->update($produto);
$deleted = 18;
//$produtoDao->delete();


$produtoDao->read();

foreach($produtoDao->read() as $produto){
    echo $produto['id']."<br>".$produto['nome']."<hr>";
}


