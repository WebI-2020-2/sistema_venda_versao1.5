//<?php

/**
 * Salvar como Produtos.php
 * herda da classe crudProdutos
 * contem metodos basicos para criar, deletar, Lê e apagar dados no BD
 */
/*
require_once '../model/CrudLogin.php';

 class Login extends CrudLogin{
    
    protected $tabela = 'usuario';  //define a tabela do banco

      
    //busca 1 item
    public function findUnit($idusuario) {
        $sql = "SELECT * FROM $this->tabela WHERE idusuario = :idusuario";
        $stm = DB::prepare($sql);
        $stm->bindParam(':idusuario', $idusuario, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }
    //busca todos os itens
    public function findAll() {
        $sql = "SELECT * FROM $this->tabela";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
    
     //faz insert para fazer cadastro no login   
    public function insert() {
        $sql = "INSERT INTO $this->tabela (idusuario, nomeusuario, login, senha, cargo, sexo) VALUES (:idusuario, :nomeusuario,:login, :senha, :cargo, :sexo)";

        $stm = DB::prepare($sql);
        $stm->bindParam(':idusuario', $this->idusuario);
        $stm->bindParam(':nomeusuario', $this->usuario);
        $stm->bindParam(':login', $this->usuario);
        $stm->bindParam(':senha', $this->senha);
        $stm->bindParam(':cargo', $this->usuario);
        $stm->bindParam(':sexo', $this->usuario);
        return $stm->execute();
    }
    
    //update de itens
    public function update($idusuario) {
        $sql = "UPDATE $this->tabela SET idusuario = :idusuario, nomeusuario = :nomeusuario, login = :login, senha = :senha, cargo = :cargo, sexo = :sexo WHERE idusuario = :idusuario";
        $stm = DB::prepare($sql);
        $stm->bindParam(':idusuario', $idusuario, PDO::PARAM_INT);
        $stm->bindParam(':nomeusuario', $this->usuario);
        $stm->bindParam(':login', $this->usuario);
        $stm->bindParam(':senha', $this->senha);
        $stm->bindParam(':cargo', $this->usuario);
        $stm->bindParam(':sexo', $this->usuario);
        return $stm->execute();
    }
    
//deleta  1 item
    public function delete($idusuario) {
        $sql = "DELETE FROM $this->tabela WHERE idusuario = :idusuario";
        $stm = DB::prepare($sql);
        $stm->bindParam(':idusuario', $idusuario, PDO::PARAM_INT);
        return $stm->execute();
    }
    
}
?>*/