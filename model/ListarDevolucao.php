<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/Devolucao.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de Devolucao - WEB I</title>
</head>

<body>
   <fieldset>
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">

                        <th>Data da Venda</th>
                        <th>Descrição da Devolucao</th>
                        <th>Quantidade Devolvida </th>  
                        <th>Data da Devolucao</th>
                       
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    
                    $devolucao = New Devolucao;

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $iddevolucao = $_POST['iddevolucao'];
                        
                        $devolucao->delete($iddevolucao);
                    }
                                                         
                    
                    

                    foreach ($devolucao->findAll() as $key => $value) { ?>
          
                    <tr>

                        <td> <?php echo $value->idvenda;?> </td>
                        
                        <td> <?php echo $value->quantidadedevolvida;?> </td>

                        <td> <?php echo $value->datadevolucao;?> </td>

                        <td> <?php echo $value->descricaodadevolucao;?> </td>

                        
                        <td>

                             

                        <form method="post" action="AlterarDevolucao.php">
                            <tr>
                                <td><input name="iddevolucao" type="hidden" value="<?php echo $value->iddevolucao;?>"/> </td> 

                                <td><input name="idvenda" type="hidden" value="<?php echo $value->idvenda;?>"/> </td> 

                                 <td><input name="quantidadedevolvida" type="hidden" value="<?php echo $value->quantidadedevolvida;?>"/> </td>                     
                                <td><input name="datadevolucao" type="hidden" value="<?php echo $value->datadevolucao;?>"/> </td>                                                               
                                <td><input name="descricaodadevolucao" type="hidden" value="<?php echo $value->descricaodadevolucao;?>"/></td> 
                               
                                
                            </tr>
                                <td><button name="alterar" type="submit">Alterar</button></td>

                         </form>
<td>


                            <form method="post" >
                                <input name="iddevolucao" type="hidden" value="<?php echo $value->iddevolucao;?>"/>
                                <button name="excluir" type="submit" >Excluir</button>
                            </form>
                        </td>

                    </tr>
                    </fieldset>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->

<br><br><br><a href=CadastrarDevolucao.php><td><button name="Cadastrar nova Devolucao" type="submit">Cadastrar nova Devolucao</button></td></a>


    </form>

</body>
</html>
