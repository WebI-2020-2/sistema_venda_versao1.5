<?php

/**
 * Salvar como Produtos.php
 * herda da classe crudProdutos
 * contem metodos basicos para criar, deletar, Lê e apagar dados no BD
 */

require_once '../../model/CrudFormapagamento.php';

 class Formaspagamentos extends CrudFormapagamento{
    
    protected $tabela = 'forma_de_pagamento';  //define a tabela do banco

      
    //busca 1 item
    public function findUnit($idmarca) {
        $sql = "SELECT * FROM $this->tabela WHERE idforma_de_pagamento = :idforma_de_pagamento";
        $stm = DB_Formapagamentos::prepare($sql);
        $stm->bindParam(':idforma_de_pagamento', $idforma_de_pagamento, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }
    //busca todos os itens
    public function findAll() {
        $sql = "SELECT * FROM $this->tabela";
        $stm = DB_Formapagamentos::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
    
     //faz insert   
     public function insert_forma_pagamento() {
        $sql = "INSERT INTO $this->tabela(tipo_pagamento,idvenda) VALUES (:tipo_pagamento,:idvenda)";
        $stm = DB_Formapagamentos::prepare($sql);
        $stm->bindParam(':tipo_pagamento', $this->tipo_pagamento);
        $stm->bindParam(':idvenda', $this->idvenda);
        $stm->execute();
         return DB_Formapagamentos::lastInsertId();

     
    }
    
    //update de itens
    public function update($idforma_de_pagamento) {
        $sql = "UPDATE $this->tabela SET  idforma_de_pagamento = :idforma_de_pagamento, tipo_pagamento = :tipo_pagamento WHERE idforma_de_pagamento = :idforma_de_pagamento";
        $stm = DB_Formapagamentos::prepare($sql);
        $stm->bindParam(':idforma_de_pagamento', $idforma_de_pagamento, PDO::PARAM_INT);
        $stm->bindParam(':tipo_pagamento', $this->tipo_pagamento);
        return $stm->execute();
    }
    
//deleta  1 item
    public function delete($idforma_de_pagamento) {
        $sql = "DELETE FROM $this->tabela WHERE idforma_de_pagamento = :idforma_de_pagamento";
        $stm = DB_Formapagamentos::prepare($sql);
        $stm->bindParam(':idforma_de_pagamento', $idforma_de_pagamento, PDO::PARAM_INT);
        return $stm->execute();
    }
    
}
?>