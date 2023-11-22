<?php
session_start();
ob_start();

if((!isset($_SESSION['id'])) AND (!isset($_SESSION['usuario']))){
    $_SESSION['msg'] = "<p style='color: #ff0000'>ERRO! Pagina restrita, faça o login para acessar a pagina!</p>";
    header("Location: index.php");
}

require 'banco\Produto.php';
require 'banco\ProdutoDAO.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>CRUD-Cadastro</title>
</head>
<body>
<header id="head">
        <h1>Cadastro de Produtos</h1>
        <a href="logout.php">Sair</a>
</header>
<?php


$produto = new \banco\Produto();

$teste='qqqq';
//$produto->setId(1);
$produto->setNome($teste);
$produto->setPreco('12');
$produto->setQuantidade('2');
$produto->setDescricao('ddd');

$produtoDao = new \banco\ProdutoDao();

//$produtoDao->create($produto);

//$produtoDao->update($produto);
$deleted = 18;
//$produtoDao->delete();


$produtoDao->read();

foreach($produtoDao->read() as $produto){
    echo "<hr>".$produto['id']."<br>".$produto['nome']."<hr>";
    echo "<input type='hiden' value='".htmlspecialchars($produto['id'])."'/><hr>";
}
?>

<h1>Cadastro de Produto</h1>

<form method="POST" action="">

<input type="text" name="nome" placeholder="nome">
<br><br>
<input type="text" name="preco" placeholder="preço">
<br><br>
<input type="text" name="quantidade" placeholder="quantidade">
<br><br>
<input type="text" name="descricao" placeholder="descrição">
<br><br>
<input type="submit" name="cadastrar" value="cadastrar">

</form>

</body>
</html>

