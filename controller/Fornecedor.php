<?php

/**
 * Salvar como Produtos.php
 * herda da classe crudProdutos
 * contem metodos basicos para criar, deletar, Lê e apagar dados no BD
 */ 

require_once '../../model/CrudFornecedor.php';

 class Fornecedor extends CrudFornecedor{
    
    protected $tabela = 'fornecedor';  //define a tabela do banco

      
    //busca 1 item
    public function findUnit($idfornecedor) {
        $sql = "SELECT * FROM $this->tabela WHERE idfornecedor = :idfornecedor";
        $stm = DB_Fornecedor::prepare($sql);
        $stm->bindParam(':idfornecedor', $idfornecedor, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }
    //busca todos os itens
    public function findAll() {
        $sql = "SELECT * FROM $this->tabela";
        $stm = DB_Fornecedor::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
    
     //faz insert   
    public function insert() {
        $sql = "INSERT INTO $this->tabela (razaosocial,cnpj) VALUES (:razaosocial,:cnpj)";
        $stm = DB_Fornecedor::prepare($sql);
        $stm->bindParam(':razaosocial',$this->razaosocial);
        $stm->bindParam(':cnpj', $this->cnpj);
        $stm->execute();
        return DB_Fornecedor::lastInsertId();
    }
    
    //update de itens
    public function update($idfornecedor) {
        $sql = "UPDATE $this->tabela SET  razaosocial  = :razaosocial, idfornecedor  = :idfornecedor, cnpj = :cnpj WHERE idfornecedor = :idfornecedor";
        $stm = DB_Fornecedor::prepare($sql);
        $stm->bindParam(':idfornecedor', $idfornecedor, PDO::PARAM_INT);
        $stm->bindParam(':razaosocial', $this->razaosocial);
        $stm->bindParam(':idfornecedor', $this->idfornecedor);
        $stm->bindParam(':cnpj', $this->cnpj);
        return $stm->execute();
    }
    
//deleta  1 item
    public function delete($idfornecedor) {
        $sql = "DELETE FROM $this->tabela WHERE idfornecedor = :idfornecedor";
        $stm = DB_Fornecedor::prepare($sql);
        $stm->bindParam(':idfornecedor', $idfornecedor, PDO::PARAM_INT);
        return $stm->execute();
    }
    
}
?>