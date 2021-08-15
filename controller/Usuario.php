<?php

/**
 * Salvar como Produtos.php
 * herda da classe crudProdutos
 * contem metodos basicos para criar, deletar, Lê e apagar dados no BD
 */

require_once '../model/CrudUsuario.php';

 class Usuarios extends CrudUsuario{
    
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
    
    public function insert() {
        $sql = "INSERT INTO $this->tabela (nomeusuario, email, senha,cargo, adm) VALUES ( :nomeusuario, :email, :senha, :cargo, :adm)";
        $stm = DB::prepare($sql);
        //$stm->bindParam(':idusuario', $this->idusuario);
        $stm->bindParam(':nomeusuario', $this->nomeusuario);
        $stm->bindParam(':email', $this->email);
        $stm->bindParam(':senha', $this->senha);
        $stm->bindParam(':cargo', $this->cargo);
        $stm->bindParam(':adm', $this->adm);
        return $stm->execute();
    }
    
    //update de itens
    public function update($idusuario) {
        $sql = "UPDATE $this->tabela SET  idusuario = :idusuario, nomeusuario = :nomeusuario, email = :email, senha= :senha, cargo= :cargo, adm= :adm   WHERE idusuario = :idusuario";
        $stm = DB::prepare($sql);
        $stm->bindParam(':idusuario', $idusuario, PDO::PARAM_INT);
        $stm->bindParam(':nomeusuario', $this->nomeusuario);
        $stm->bindParam(':email', $this->email);
        $stm->bindParam(':senha', $this->senha);
        $stm->bindParam(':cargo', $this->cargo);
        $stm->bindParam(':adm', $this->adm);
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
?>