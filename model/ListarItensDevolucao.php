<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/ItensDevolucao.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de Itens da Devolucao - WEB I</title>
</head>

<body>
   <fieldset>
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">

                        <th>Descricao da Devolucao</th>
                        <th>Nome do Produto</th>
                        <th>Quantidade Devolvida </th>  
                        <th>Data devolvida</th>
                       
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    
                    $itensdevolucao = New ItensDevolucao;

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $iditensdevolucao = $_POST['iditensdevolucao'];
                        
                        $itensdevolucao->delete($iditensdevolucao);
                    }
                                                         
                    
                    

                    foreach ($itensdevolucao->findAll() as $key => $value) { ?>
          
                    <tr>

                        <td> <?php echo $value->iddevolucao;?> </td>
                        
                        <td> <?php echo $value->idproduto;?> </td>

                        <td> <?php echo $value->quantidade_devolvida;?> </td>

                        <td> <?php echo $value->datadevolvida;?> </td>

                        
                        <td>

                             

                        <form method="post" action="AlterarItensDevolucao.php">
                            <tr>
                                <td><input name="iditensdevolucao" type="hidden" value="<?php echo $value->iditensdevolucao;?>"/> </td> 

                                <td><input name="idproduto" type="hidden" value="<?php echo $value->idproduto;?>"/> </td> 

                                 <td><input name="quantidade_devolvida" type="hidden" value="<?php echo $value->quantidade_devolvida;?>"/> </td>                     
                                <td><input name="datadevolvida" type="hidden" value="<?php echo $value->datadevolvida;?>"/> </td>            
                               
                                
                            </tr>
                                <td><button name="alterar" type="submit">Alterar</button></td>

                         </form>
<td>


                            <form method="post" >
                                <input name="iditensdevolucao" type="hidden" value="<?php echo $value->iditensdevolucao;?>"/>
                                <button name="excluir" type="submit" >Excluir</button>
                            </form>
                        </td>

                    </tr>
                    </fieldset>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->

<br><br><br><a href=CadastrarItensDevolucao.php><td><button name="Cadastrar novo Itens da Devolucao" type="submit">Cadastrar novo itens Devolucao</button></td></a>


    </form>

</body>
</html>
