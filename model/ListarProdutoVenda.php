<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../controller/Produto.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de produtos - WEB I</title>
</head>

<body>
    <h2>Lista de Produtos</h2>
     <fieldset>
   
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">

                        <th>Nome do produto</th>  
                        <th>Marca</th>
                        <th>Categoria</th>
                        <th>Valor venda</th>
                        <th>Desconto</th>
                        <th>Quantidade</th>
                        <th>Data_vencimento</th>                  
                                       
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    
                    $produto=New Produtos;

                    /*//exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $idproduto = $_POST['idproduto'];
                        
                        $produto->delete($idproduto);
                    }*/
                                                         
                    
                    

                    foreach ($produto->findAll() as $key => $value) { ?>
          
                    <tr>
                        
                        <td> <?php echo $value->nomedoproduto;?> 

                        <td> <?php echo $value->idmarca;?> </td>

                        <td> <?php echo $value->idcategoria;?> </td>

                        <td> <?php echo $value->valorvenda;?> </td>

                         <td> <?php echo $value->desconto;?> </td>

                        <td> <?php echo $value->quantidade;?> </td>

                        <td> <?php echo $value->datavencimento;?> </td>

                    
                        <td>

                    
<td>


                            
                        </td>

                    </tr>
                     </fieldset>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->



    </form>

</body>
</html>
