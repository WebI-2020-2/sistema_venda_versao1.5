<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../../controller/ItensVenda.php';

?>



<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once '../../controller/ItensVenda.php';
?>

 <?php

      $ItensVenda = new ItensVendas();  
    if(isset($_POST['cadastrar'])):
            $idvenda = $_POST['idvenda'];
            $idproduto = $_POST['idproduto'];
            $quantidade_itens = $_POST['quantidade_itens'];
            $valorvenda = $_POST['valor'];
            $desconto = $_POST['desconto'];
          
            $ItensVenda->setIdVenda($idvenda);
            $ItensVenda->setIdProduto($idproduto);
            $ItensVenda->setQuantidade($quantidade_itens);
            $ItensVenda->setValorVenda($valorvenda);
            $ItensVenda->setDesconto($desconto);

             if($ItensVenda->insert()){
                echo "itens_vendas ". $idproduto. " inserido com sucesso";
                header("Location:mostrar_venda.php");
           
            }

    endif;  
   
?>
  

  



    
    


   

 



