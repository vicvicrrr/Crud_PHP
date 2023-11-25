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
    <link rel="stylesheet" href="styles/style_update.css">
    <title>CRUD-Alterar</title>
</head>
<body>

<header id="head">
<a id="out_page" href='crud_insert.php'><button class="bi bi-arrow-left"> Voltar</button></a>
        <h1>Alterar Produtos</h1>
        <a id="out" href='logout.php'><button class="bi bi-box-arrow-left"> Logout</button></a>
    
        
</header>

    <?php
    $dado_prod = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $produto = new \banco\Produto();
    $produtoDao = new \banco\ProdutoDao();    

    if(!empty($_POST['idI'])){
    $produtoDao->delete($_POST['idI']);
    }

    if(!empty($produtoDao->read($produto->getNome()))){

        $controle = 1; 
     foreach($produtoDao->read() as $produto){
        
        ?>
        <!--divs de update-->

            <br>
        <div id="div_update_bloco">

        <div id="div_update">

            <input type="hidden" id="input_id<?php echo $controle;?>" value="<?php echo $produto['id'];?>">

            <h5>nome: </h5>
            <h5 class="nome_class" onclick="clickDuplo(conn=<?php echo $controle;?>)" id="input_nome<?php echo $controle;?>" contenteditable="true"><?php echo $produto['nome'];?></h5>

            <h5>descrição: </h5>
            <h5 class="desc_class" id="input_des<?php echo $controle;?>" contenteditable="true"><?php echo $produto['descricao'];?></h5>
                <p></p>

            <input type="submit" class="btn btn-dark" id="btn_update<?php echo $controle;?>" onclick="alerta(controle=<?php echo $controle;?>)" name="btn_update" value="Salvar">
        </div>
        
        

        <!--form de deletes-->
            <form id="form_delete" action="" method="POST">
                <input type="hidden" name="idI" value="<?php echo $produto['id'];?>">
                <input type="submit" class="btn btn-dark" onclick="deletes()" name="deletar" value="deletar">
            </form>
        </div>
                <br>
                    <div id="resposta"></div>
        <?php

        $controle ++;

     }
     }else{
        echo "<h2 style='color: #ff0000'>Não a nada no banco!</h2>";
     }
        ?>
    
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="jqueryJs/script_update.js"></script>
</body>
</html>
