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
    <link rel="stylesheet" href="styles/style1.css">
    <title>CRUD</title>
</head>
<body>

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
            header("Location: crud.php");
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

    <h1>Login</h1>
    <form method="POST" action="">

        <input class="form-control" type="text" name="usuario" value="<?php 
        if(isset($dados['usuario'])){
            echo $dados['usuario'];
        }?>"placeholder="Usuario">
        <br><br>
        <input class="form-control" type="password" name="senha" value="<?php 
        if(isset($dados['senha'])){
            echo $dados['senha'];
        }?>" placeholder="senha">
        <br><br>
        <input type="submit" name="login_button" value="Entrar">

    </form>

    <br>
    <a href="login.php">Não tem uma conta?</a>
    
</body>
</html>
