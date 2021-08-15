<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/Fornecedor.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de fornecedors - WEB I</title>
</head>

<body>
   <fieldset>
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">

                        <th>Descriçao Fornecedor</th> 
                        <th>Razao Social</th>
                        <th>cnpj </th>  
                        <th>Nome Fantasia</th>
                       
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    
                    $fornecedor =  New Fornecedor;

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $idfornecedor = $_POST['idfornecedor'];
                        
                        $fornecedor->delete($idfornecedor);
                    }
                                                         
                    
                    

                    foreach ($fornecedor->findAll() as $key => $value) { ?>
          
                    <tr>
                        
                        <td> <?php echo $value->idfornecedor;?> </td>
                         <td> <?php echo $value->razaosocial;?> </td>
                        <td> <?php echo $value->cnpj;?> </td>
                        <td> <?php echo $value->nomefantasia;?> </td>

                        
                        <td>

                             

                        <form method="post" action="Alterarfornecedor.php">
                            <tr>
                                <td><input name="idfornecedor" type="hidden" value="<?php echo $value->idfornecedor;?>"/> </td>

                               
                                <td><input name="razaoSocial" type="hidden" value="<?php echo $value->razaoSocial;?>"/> </td>    

                                 <td><input name="cnpj" type="hidden" value="<?php echo $value->cnpj;?>"/> </td>    

                                <td><input name="nomefantasia" type="hidden" value="<?php echo $value->nomefantasia;?>"/> </td>                                                               
                               
                               
                                
                            </tr>
                                <td><button name="alterar" type="submit">Alterar</button></td>

                         </form>
<td>


                            <form method="post" >
                                <input name="idfornecedor" type="hidden" value="<?php echo $value->idfornecedor;?>"/>
                                
                                <button name="excluir" type="submit" >Excluir</button>
                            </form>
                        </td>

                    </tr>
                    </fieldset>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->

<br><br><br><a href=Cadastrarfornecedor.php><td><button name="Cadastrar nova fornecedor" type="submit">Cadastrar nova fornecedor</button></td></a>


    </form>

</body>
</html>
