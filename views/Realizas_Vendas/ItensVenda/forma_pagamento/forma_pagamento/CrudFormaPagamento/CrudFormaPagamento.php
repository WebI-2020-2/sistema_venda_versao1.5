<?php
	require_once 'conexao/BD_FormaPagamento.php';

abstract class CrudFormaPagamento extends DB_FormaPagamento
{
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