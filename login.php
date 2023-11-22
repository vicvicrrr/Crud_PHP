<?php
session_start();
ob_start();
require 'banco\conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>CRUD-Login</title>
</head>
<body>

    <?php
    $dado = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $conexao = new \banco\Conexao();

    

    if(!empty($dado['cad_login_button'])){
        if((!empty($dado['cad_usuario'])) AND (!empty($dado['cad_senha']))){
        $senhaHash = password_hash($dado['cad_senha'], PASSWORD_DEFAULT);
            $query_insert = "INSERT INTO usuarios (nome_usuario, senha_usuario) VALUES (?, ?)";
                $resCon = $conexao->getConn()->prepare($query_insert);
                $resCon->bindValue(1,$dado['cad_usuario']);
                $resCon->bindValue(2,$senhaHash);
                    $resCon->execute();
        header("Location: index.php");
            }else{
                $_SESSION['msg'] = "<p style='color: #ff0000'>ERRO! Usuario ou Senha não informados!</p>";
            }
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
    }
    
    ?>

    <h1>Criar conta</h1>
    <form method="POST" action="">
    <input class="form-control" type="text" name="cad_usuario" placeholder="Usuario">
        <br><br>
    <input class="form-control" type="password" name="cad_senha" placeholder="senha">
        <br><br>
    <input type="submit" name="cad_login_button" value="cadastrar">
    </form>
    <br>
    <a href="index.php">já possui uma conta?</a>

    
</body>
</html>

