<?php
##salvar como CrudProdutos.php
##arquivo que implementa a tabela e seus atributos, acessa os metodos get e set
include_once"../../controller/conexao/conexao_Formapagamentos/DB_Formapagamentos.php";    //inclui arquivo DB

 abstract class CrudFormapagamento extends DB_Formapagamentos {   //faz herança do arquivo DB
    
    //Nome da tabela e Atributos
    protected $tabela;
        public $idvenda;
        public $tipo_pagamento;

    public function setIdVenda($idvenda){
        $this->idvenda = $idvenda;
    }

    public function getIdVenda(){
        return $this->idvenda;
    } 

    public function setTipoPagamento($tipo_pagamento){
        $this->tipo_pagamento=$tipo_pagamento;
    }

    public function getTipoPagamento(){
        return $this->tipo_pagamento; 
    }
    
}

?>