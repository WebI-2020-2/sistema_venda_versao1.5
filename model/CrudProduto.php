<?php
	include "../../controller/conexao/conexao_produto/DB_Produto.php"; 

abstract class CrudProdutos extends DB_Produto 
{
		protected $tabela;
	
		public $nomedoproduto;
		public $idmarca;
		public $idcategoria;
		public $datavencimento;
		


	public function setNomeProduto($nomedoproduto){
		$this->nomedoproduto=$nomedoproduto;
	}

	public function getNomeProduto(){
		return $this->nomedoproduto; 
	}

	public function setIdMarca($idmarca){
		$this->idmarca=$idmarca;
	}

	public function getIdMarca(){
		return $this->idmarca;
	}

	public function setCategoria($idcategoria){
		$this->idcategoria=$idcategoria;
	}

	public function getCategoria(){
		return $this->idcategoria;
	}

	public function setDataVencimento($datavencimento){
		$this->datavencimento=$datavencimento;
	}

	public function getDataVencimento(){
		return $this->datavencimento;
	}
	

}








?>