<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/contato_fornecedor.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de contato_fornecedors - WEB I</title>
</head>

<body>
   <fieldset>
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">

                      
                        <th>IDfornecedor:</th>
                        <th>Telefone fornecedor:</th>
                        <th>Email Fornecedor: </th>  
                        <th>whatsapp Fornecedor:</th>
                       
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    
                    $contato_fornecedor =  New Contato_fornecedor;

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $idcontatofornecedor = $_POST['idcontatofornecedor'];
                        
                        $contato_fornecedor->delete($idcontatofornecedor);
                    }
                                                         
                    
                    

                    foreach ($contato_fornecedor->findAll() as $key => $value) { ?>
          
                    <tr>
                        
                       

                        <td> <?php echo $value->idfornecedor;?> </td>
                         <td> <?php echo $value->whatsappfornecedor;?> </td>

                        <td> <?php echo $value->telefone_fornecedor;?> </td>

                        <td> <?php echo $value->email_fornecedor;?> </td>

                        
                        <td>

                             

                        <form method="post" action="Alterarcontato_fornecedor.php">
                            <tr>

                            
                                <td><input name="idfornecedor" type="hidden" value="<?php echo $value->idfornecedor;?>"/> </td>


                                <td><input name="telefone_fornecedor" type="hidden" value="<?php echo $value->telefone_fornecedor;?>"/> </td> 

                                <td><input name="email_fornecedor" type="hidden" value="<?php echo $value->email_fornecedor;?>"/> </td>

                                <td><input name="whatsappfornecedor" type="hidden" value="<?php echo $value->whatsappfornecedor;?>"/> </td> 

                                  
                                                               
                               
                               
                                
                            </tr>
                                <td><button name="alterar" type="submit">Alterar</button></td>

                         </form>
<td>


                            <form method="post" >
                                <input name="idcontatofornecedor" type="hidden" value="<?php echo $value->idcontatofornecedor;?>"/>
                                
                                <button name="excluir" type="submit" >Excluir</button>
                            </form>
                        </td>

                    </tr>
                    </fieldset>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->

<br><br><br><a href=Cadastrarcontato_fornecedor.php><td><button name="Cadastrar nova contato_fornecedor" type="submit">Cadastrar nova contato_fornecedor</button></td></a>


    </form>

</body>
</html>
