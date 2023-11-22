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
    <title>Document</title>
</head>
<body>
<header id="head">
        <h1>Aleterar de Produtos</h1>
        <a href="logout.php">Sair</a>
</header>

</body>
</html>
<?php
$dado_prod = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$produto = new \banco\Produto();
$produtoDao = new \banco\ProdutoDao();



//$produtoDao->update($produto);
if(!empty($_POST['id'])){
$produtoDao->delete($_POST['id']);
}

 foreach($produtoDao->read() as $produto){
     echo "<hr>".$produto['id']."<br>".$produto['nome']."<hr>";
     //echo "<input type='hiden' value='".htmlspecialchars($produto['id'])."'/><hr>";

     ?><form action="" method="POST">
       <input type="hidden" name="id" value="<?php echo $produto['id'];?>">
       <input type="submit" name="deletar" value="deletar">
       </form><?php
 }
?>
