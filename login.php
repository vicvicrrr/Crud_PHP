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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/style_login.css">
    <title>CRUD-Login</title>
</head>
<body>
<header id="header_criar">
    <h1>Cadastrar-se</h1>
</header>
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
        <br><br><br>
    <div id="form_div">
    <form id="form" method="POST" action="">
        <br>
    <div id="div_name">
    <input id="usuario" class="form-control" type="text" name="cad_usuario" placeholder="Usuario">
    </div>    
    <br>
    <div id="eye">
    <input id="senha" class="form-control" type="password" name="cad_senha" placeholder="senha">
    <i id="btn_eye" class="bi bi-eye"onclick="mostrarEye()"></i>
    </div>    
    <br>
    <input class="btn btn-dark" type="submit" name="cad_login_button" value="cadastrar">
    </form>
    
    <a href="index.php">já possui uma conta?</a>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="jqueryJs/script_login.js"></script>
</body>
</html>

