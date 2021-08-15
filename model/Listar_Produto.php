
   

    <?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/Produto.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de produtos - WEB I</title>
</head>

<body>
     <fieldset>
   
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">

                        <th>idproduto</th>
                        <th>nomedoproduto</th>  
                        <th>idmarca</th>
                        <th>icms</th>     
                        <th>ipi</th>
                        <th>frete</th>  
                        <th>valornafabrica</th>
                        <th>valorvenda</th>   
                        <th>desconto</th>  
                        <th>quantidade</th>
                        <th>datavencimento</th>                  
                                       
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    
                    $produto=New Produtos;

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $idproduto = $_POST['idproduto'];
                        
                        $produto->delete($idproduto);
                    }
                                                         
                    
                    

                    foreach ($produto->findAll() as $key => $value) { ?>
          
                    <tr>
                        <td> <?php echo $value->idproduto;?> </td>

                        <td> <?php echo $value->nomedoproduto;?> 

                        <td> <?php echo $value->idmarca;?> </td>

                        <td> <?php echo $value->icms;?> </td>

                        <td> <?php echo $value->ipi;?> </td>

                        <td> <?php echo $value->frete;?> </td>

                        <td> <?php echo $value->valornafabrica;?> </td>

                        <td> <?php echo $value->valorvenda;?> </td>

                         <td> <?php echo $value->desconto;?> </td>

                        <td> <?php echo $value->quantidade;?> </td>

                        <td> <?php echo $value->datavencimento;?> </td>

                    
                        <td>

                             

                        <form method="post" action="AlterarCategoria.php">
                            <tr>
                                <td><input name="idproduto" type="hidden" value="<?php echo $value->idproduto;?>"/> </td>          
                                <td><input name="nomedoproduto" type="hidden" value="<?php echo $value->nomedoproduto;?>"/></td>
                                <td><input name="idmarca" type="hidden" value="<?php echo $value->idmarca;?>"/> </td>          
                                <td><input name="ipi" type="hidden" value="<?php echo $value->icms;?>"/></td>  
                                 <td><input name="ipi" type="hidden" value="<?php echo $value->ipi;?>"/> </td> 

                                <td><input name="frete" type="hidden" value="<?php echo $value->frete;?>"/></td> 
                                 <td><input name="valornafabrica" type="hidden" value="<?php echo $value->valornafabrica;?>"/> </td>          
                                <td><input name="valorvenda" type="hidden" value="<?php echo $value->valorvenda;?>"/></td> 
                                 <td><input name="desconto" type="hidden" value="<?php echo $value->desconto;?>"/> </td>          
                                <td><input name="quantidade" type="hidden" value="<?php echo $value->quantidade;?>"/></td> 
                                 <td><input name="datavencimento" type="hidden" value="<?php echo $value->datavencimento;?>"/> </td>          
                                
                            </tr>
                                <td><button name="alterar" type="submit">Alterar</button></td>
                                

                         </form>
<td>


                            <form method="post" >
                                <input name="idcategoria" type="hidden" value="<?php echo $value->idcategoria;?>"/>
                                <button name="excluir" type="submit" >Excluir</button>
                            </form>
                        </td>

                    </tr>
                     </fieldset>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->

<br><br><br><a href=../views/CadastrarProduto.php><td><button name="Cadastrar novo produtos" type="submit">Cadastrar novo Produto</button></td></a>


    </form>

</body>
</html>
