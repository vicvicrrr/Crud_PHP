<?php
namespace banco;

require 'banco\conexao.php';


class ProdutoDao{

    public function create(Produto $p){

        $sql= 'INSERT INTO produtos (nome, preco, quantidade, descricao) VALUES (?,?,?,?)';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $p->getNome());
        $stmt->bindValue(2, $p->getPreco());
        $stmt->bindValue(3, $p->getQuantidade());
        $stmt->bindValue(4, $p->getDescricao());

        $stmt->execute();
    }

    public function read(){
        $sql= 'SELECT * FROM produtos';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
    }

    public function update(Produto $p){
        $sql= 'UPDATE produtos SET nome = ?, preco = ?, quantidade = ?, descricao = ? WHERE id = ? ';
        
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $p->getNome());
        $stmt->bindValue(2, $p->getPreco());
        $stmt->bindValue(3, $p->getQuantidade());
        $stmt->bindValue(4, $p->getDescricao());
        $stmt->bindValue(5, $p->getId());

        $stmt->execute();
    }
    
    public function delete($id){
        $sql = 'DELETE FROM produtos WHERE id = ?';
        
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
