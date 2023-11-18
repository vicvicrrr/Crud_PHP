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

    }

    public function update(Produto $p){

    }
    
    public function delete($id){

    }
}
