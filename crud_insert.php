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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/style_insert.css">
    <title>CRUD-Cadastro</title>
</head>
<body>
<header id="head">
        <h1 id="layout_cad">Cadastro de Produtos</h1>
        <a id="out" href='logout.php'><button class="bi bi-box-arrow-left"> Logout</button></a>
</header>
<?php

$dado_prod = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$produto = new \banco\Produto();
$produtoDao = new \banco\ProdutoDao();

//$produto->setId(1);


if(!empty($dado_prod['cadas_prod']) AND !empty($dado_prod['nome_prod'])){
    
    $produto->setNome($dado_prod['nome_prod']);
    $produto->setDescricao($dado_prod['descr_prod']);

    $produtoDao->create($produto);

    header("Location: crud_update.php");

}else{
    echo '<br><h3 id="add">adicione um produto!</h3><br>';
}

?>
<div id="form_insert">
<form id="form_fora"  method="POST" action="">
<div id="form_div">
<input class="form-control" id="nome_input" type="text" name="nome_prod" placeholder="nome">
<br>
<input class="form-control" id="desc_input" type="text" name="descr_prod" placeholder="descrição">
<br>
<input id="btn_insert" class="btn btn-dark" type="submit" name="cadas_prod" value="cadastrar">
</div>
</form>
<a id="out_page" href='crud_update.php'><input id="btn_banco" class="btn btn-secondary" type="submit" name="cadas_prod" value="Ver Produtos"></a>
</div>

</body>
</html>

