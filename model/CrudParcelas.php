<?php
##salvar como CrudProdutos.php
##arquivo que implementa a tabela e seus atributos, acessa os metodos get e set
include "../../controller/conexao/conexao_Parcelas/DB_Parcelas.php";    //inclui arquivo DB

 abstract class CrudParcelas extends DB_Parcelas {   //faz herança do arquivo DB
    
    //Nome da tabela e Atributos
     protected $tabela;
    public $numerodeparcelas;
    public $idforma_de_pagamento;
    public $valortotalparcela;

        


    public function setNumerosdeparcelas($numerodeparcelas) {
        $this->numerodeparcelas = $numerodeparcelas;
    }
    public function getNumerosdeparcelas() {
        return $this->numerodeparcelas;
    }
    public function setIdForma_de_pagamento($idforma_de_pagamento) {
        $this->idforma_de_pagamento = $idforma_de_pagamento;
    }
    public function getIdForma_de_pagamento() {
        return $this->idforma_de_pagamento;
    }

    public function setValorTotalParcela($valortotalparcela) {
        $this->valortotalparcela = $valortotalparcela;
    }
    public function getvalortotalparcela() {
        return $this->valortotalparcela;
    }
      
}

?>