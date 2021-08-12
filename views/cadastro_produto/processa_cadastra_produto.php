
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../../controller/produto.php';

?>



<?php
  

    $produto = new Produtos();

     if(isset($_POST['cadastrar'])) {
        $nomedoproduto = $_POST['nomedoproduto'];
        $idmarca=$_POST['idmarca'];
        $idcategoria=$_POST['idcategoria'];
        $datavencimento=$_POST['datavencimento'];
        

        $produto->setNomeProduto($nomedoproduto);         
        $produto->setIdMarca($idmarca);
        $produto->setCategoria($idcategoria);
        $produto->setDataVencimento($datavencimento);
       


        if($produto->insert()){

            echo "produto inserindo com sucesso <br><br>";
        }
    }
    
?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de produtos inserido</title>
</head>

<body>

  
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">
                <center><h2>lista de produtos inserindo</h2></center>
               
                <thead>
                    <tr class="active">
                        <th>nomedoproduto</th>
                        <th>idmarca</th>
                        <th>idcategoria</th>
                        <th>datavencimento</th>    
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $produto=New Produtos();

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $produto = $_POST['idproduto'];
                        
                        $produto->delete($idproduto);
                    }
                                                         
                    
                    

                    foreach ($produto->Mostrar_produto_inserindo() as $key => $value) { ?>
          
                    <tr>
                        <td> <?php echo $value->nomedoproduto;?> </td>

                        <td> <?php echo $value->idmarca;?> </td>

                        <td> <?php echo $value->idcategoria;?> </td>

                        <td> <?php echo $value->datavencimento;?> </td>                      

                        <td>

                        <form method="post" action="AlterarVenda.php">
                                <input name="nomedoproduto" type="hidden" value="<?php echo $value->nomedoproduto;?>"/>                
                                <input name="idmarca" type="hidden" value="<?php echo $value->idmarca;?>"/>
                                 <input name="idcategoria" type="hidden" value="<?php echo $value->idcategoria;?>"/>                  
                                <input name="datavencimento" type="hidden" value="<?php echo $value->datavencimento;?>"/>
                                                   
                               
                                <button name="alterar" type="submit">Alterar</button><br>
                         </form>
<td>
                            <form method="post" >
                                <input name="idmarca" type="hidden" value="<?php echo $value->idmarca;?>"/>                  
                                <input name="idusuario" type="hidden" value="<?php echo $value->idusuario;?>"/>
                                 <input name="idcliente" type="hidden" value="<?php echo $value->idcliente;?>"/>                  
                                <input name="idforma_de_pagamento" type="hidden" value="<?php echo $value->idforma_de_pagamento;?>"/>
                                 <input name="datavenda" type="hidden" value="<?php echo $value->datavenda;?>"/>                  
                                <input name="qntparcelas" type="hidden" value="<?php echo $value->qntparcelas;?>"/>
                                 <input name="prazo" type="hidden" value="<?php echo $value->prazo;?>"/>                  
                                <input name="descontototal" type="hidden" value="<?php echo $value->descontototal;?>"/>
                                 <input name="descontoacerto" type="hidden" value="<?php echo $value->descontoacerto;?>"/>                  
                                <input name="status" type="hidden" value="<?php echo $value->status;?>"/>
                                 <input name="valortotal" type="hidden" value="<?php echo $value->valortotal;?>"/>
                                <button name="excluir" type="submit">Excluir</button>
                            </form>
                        </td>

                    </tr>
                    
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->

             
    </form>
  
    
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
     <form method="post" action="cadastrar_produto.php">
        <button onclick="cadastrar_produto.php">inserir novos produtos?</button>        
    </form>
</body>
</html>
