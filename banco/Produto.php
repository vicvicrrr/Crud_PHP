<?php



class Produto{

    private $id, $nome, $preco, $quantidade, $descricao;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        return $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        return $this->nome = $nome;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function setPreco($preco){
        return $this->preco = $preco;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function setQuantidade($quantidade){
        return $this->quantidade = $quantidade;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        return $this->descricao = $descricao;
    }
}
