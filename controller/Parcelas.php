<?php

/**
 * Salvar como Produtos.php
 * herda da classe crudProdutos
 * contem metodos basicos para criar, deletar, Lê e apagar dados no BD
 */

require_once '../../model/CrudParcelas.php';

 class Parcelas extends CrudParcelas{
    
    protected $tabela = 'parcelas';  //define a tabela do banco

      
    //busca 1 item
    public function findUnit($idparcelas) {
        $sql = "SELECT * FROM $this->tabela WHERE idparcelas = :idparcelas";
        $stm = DB_Parcelas::prepare($sql);
        $stm->bindParam(':idparcelas', $idparcelas, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }
    //busca todos os itens
    public function findAll() {
        $sql = "SELECT * FROM $this->tabela";
        $stm = DB_Parcelas::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
    
     //faz insert   
    public function insert_parcela() {
        $sql = "INSERT INTO $this->tabela (numerodeparcelas,idforma_de_pagamento,valortotalparcela) VALUES (:numerodeparcelas,:idforma_de_pagamento,:valortotalparcela)";
        $stm = DB_Parcelas::prepare($sql);
        $stm->bindParam(':numerodeparcelas', $this->numerodeparcelas);
        $stm->bindParam(':idforma_de_pagamento', $this->idforma_de_pagamento);
        $stm->bindParam(':valortotalparcela', $this->valortotalparcela);
        return $stm->execute();
    }
    
    //update de itens
    public function update($idparcelas) {
        $sql = "UPDATE $this->tabela SET  idparcelas = :idparcelas, numerosdeparcelas = :numerosdeparcelas, idforma_de_pagamento = :idforma_de_pagamento, idvenda= :idvenda  WHERE idprateleira = :idprateleira";
        $stm = DB_Parcelas::prepare($sql);
        $stm->bindParam(':idparcelas', $idparcelas, PDO::PARAM_INT);
        $stm->bindParam(':numerosdeparcelas', $this->numerosdeparcelas);
        $stm->bindParam(':idforma_de_pagamento', $this->idforma_de_pagamento);
        $stm->bindParam(':idvenda', $this->idvenda);
        return $stm->execute();
    }
    
//deleta  1 item
    public function delete($idparcelas) {
        $sql = "DELETE FROM $this->tabela WHERE idparcelas = :idparcelas";
        $stm = DB_Parcelas::prepare($sql);
        $stm->bindParam(':idparcelas', $idparcelas, PDO::PARAM_INT);
        return $stm->execute();
    }
    
}
?>