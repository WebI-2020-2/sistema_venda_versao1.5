<?php
##salvar como CrudAlunos.php
##arquivo que implementa a tabela e seus atributos, acessa os metodos get e set
include_once "../../controller/conexao/conexao_Fornecedor/DB_Fornecedor.php";     //inclui arquivo DB

 abstract class CrudFornecedor extends DB_Fornecedor{   //faz herança do arquivo DB
    
    protected $tabela;
    public $razaosocial;
    public $cnpj;

     
    

    public function setRazaoSocial($razaosocial) 
    {
        $this->razaosocial=$razaosocial;
    }

    public function getRazaoSocial() 
    {
        return $this->razaosocial;
    }

    public function setCnpj($cnpj) 
    {
        $this->cnpj = $cnpj;
    }

    public function getCnpj() 
    {
        return $this->cnpj;
    }
}

