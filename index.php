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
require_once 'banco\conexao.php';


?>

    <h1>Login</h1>
    <form method="POST" action="crud.php">

        <input type="text" name="usuario" placeholder="Usuario">
        <br><br>
        <input type="password" name="senha" placeholder="senha">
        <br><br>
        <input type="submit" name="login" value="Entrar">

    </form>

    <br>
    <a href="login.php">Não tem uma conta?</a>
    
</body>
</html>
 