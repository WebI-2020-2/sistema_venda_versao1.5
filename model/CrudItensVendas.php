<?php
	include "../../controller/conexao/conexao_ItensVenda/DB_ItensVenda.php"; 
	

abstract class CrudItensVendas extends DB_ItensVenda
{
		protected $tabela;
		public $idvenda;
		public $idproduto;
		public $quantidade_itens;
		public $valorvenda;
		public $desconto;

	public function setIdItensVenda($iditensvendas){
		$this->iditensvendas = $iditensvendas;
	}

	public function getIdItensVenda(){
		return $this->iditensvendas;
	} 

	public function setIdVenda($idvenda){
		$this->idvenda=$idvenda;
	}

	public function getIdCliente(){
		return $this->idvenda; 
	}

	public function setIdProduto($idproduto){
		$this->idproduto=$idproduto;
	}

	public function getIdProduto(){
		return $this->idproduto;
	}

	public function setQuantidade_Itens($quantidade_itens){
		$this->quantidade_itens=$quantidade_itens;
	}

	public function getQuantidade_Itens(){
		return $this->quantidade_itens;
	}

	public function setValor($valor){
		$this->valor=$valor;
	}

	public function getValor(){
		return $this->valor;
	}

	public function setDesconto($desconto){
		$this->desconto=$desconto;
	}

	public function getDesconto(){
		return $this->desconto;
	}

	

}








?>