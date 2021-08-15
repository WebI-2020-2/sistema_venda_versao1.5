<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/contato_cliente.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de contato_clientes - WEB I</title>
</head>

<body>
   <fieldset>
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">

                        <th>IDCLiente</th>
                        <th>telefone</th>
                        <th>whatsapp</th>
                        <th>email </th>  
                        
                       
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    
                    $contato_cliente =  New Contato_cliente;

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $idcliente = $_POST['idcliente'];
                        
                        $contato_cliente->delete($idcliente);
                    }
                                                         
                    
                    

                    foreach ($contato_cliente->findAll() as $key => $value) { ?>
          
                    <tr>
                        
                        <td> <?php echo $value->idcliente;?> </td>
                      
                         <td> <?php echo $value->whatsapp;?> </td>

                        <td> <?php echo $value->telefone;?> </td>

                        <td> <?php echo $value->email;?> </td>

                        
                        <td>

                             

                        <form method="post" action="Alterarcontato_cliente.php">
                            <tr>
                                <td><input name="idcliente" type="hidden" value="<?php echo $value->idcliente;?>"/> </td>


                                <td><input name="telefone" type="hidden" value="<?php echo $value->telefone;?>"/> </td>                     
                                <td><input name="email" type="hidden" value="<?php echo $value->email;?>"/> </td>

                                <td><input name="whatsapp" type="hidden" value="<?php echo $value->whatsapp;?>"/> </td> 

                                  
                                                               
                               
                               
                                
                            </tr>
                                <td><button name="alterar" type="submit">Alterar</button></td>

                         </form>
<td>


                            <form method="post" >
                                <input name="idcliente" type="hidden" value="<?php echo $value->idcliente;?>"/>
                                
                                <button name="excluir" type="submit" >Excluir</button>
                            </form>
                        </td>

                    </tr>
                    </fieldset>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->

<br><br><br><a href=Cadastrarcontato_cliente.php><td><button name="Cadastrar nova contato_cliente" type="submit">Cadastrar nova contato_cliente</button></td></a>


    </form>

</body>
</html>
