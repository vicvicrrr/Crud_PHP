<?php
session_start();
ob_start();
require 'banco\conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/style_index.css">
    <title>CRUD-Enter</title>
</head>
<body>
<header id="header_login">
    <h1>Cadastro</h1>
</header>
<br>


<?php
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$conexao = new \banco\Conexao();
if(!empty($dados['login_button'])){
   
    $query_usuario = "SELECT id, nome_usuario, senha_usuario FROM usuarios WHERE nome_usuario =:usuario LIMIT 1";
    
    $res = $conexao->getConn()->prepare($query_usuario);
    $res->bindParam(':usuario', $dados['usuario']);
    $res->execute();

    if(($res) AND ($res->rowCount() != 0)){
        $row_usuario = $res->fetch(PDO::FETCH_ASSOC);
        
        if(password_verify($dados['senha'], $row_usuario['senha_usuario'])){
            $_SESSION['id'] = $row_usuario['id'];
            $_SESSION['usuario'] = $row_usuario['nome_usuario'];
            header("Location: crud_insert.php");
        }else{
            $_SESSION['msg'] = "<p style='color: #ff0000'>ERRO! Usuario ou Senha incorreta!</p>";
        }
    }else{
        $_SESSION['msg'] = "<p style='color: #ff0000'>ERRO! Usuario ou Senha incorreta!</p>";
    }
}
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

    <br><br>
    <div id="form_login_div">
    <form id="form" method="POST" action="">
        <br>
        <div id="nome_div">
        <input id="input_usuario" class="form-control" type="text" name="usuario" value="<?php 
        if(isset($dados['usuario'])){
            echo $dados['usuario'];
        }?>"placeholder="Usuario">
        </div>
        <br>
        <div id="eye">
        <input id="input_senha" class="form-control" type="password" name="senha" value="<?php 
        if(isset($dados['senha'])){
            echo $dados['senha'];
        }?>" placeholder="senha">
        <i id="btn_eye" class="bi bi-eye"onclick="mostrar()"></i>
        </div>
        <br>
        <input class="btn btn-dark" type="submit" name="login_button" value="Entrar">
    </form>
    
    
    <a href="login.php">Não tem uma conta?</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="jqueryJs/script_index.js"></script>
</body>
</html>
