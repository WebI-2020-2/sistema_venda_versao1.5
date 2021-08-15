<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/endereco_cliente.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de endereco_clientes - WEB I</title>
</head>

<body>
   <fieldset>
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">

       
                        <th>ID CLiente</th>
                        <th>Cidade</th>
                        <th>Estado </th>  
                        <th>Rua</th>
                        <th>Bairro</th>
                        <th>Numero</th>
                        <th>Cep</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    
                    $endereco_cliente =  New Endereco_cliente;

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $idcliente = $_POST['idcliente'];
                        
                        $endereco_cliente->delete($idcliente);
                    }
                                                         
                    
                    

                    foreach ($endereco_cliente->findAll() as $key => $value) { ?>
          
                    <tr>
                        
                        <td> <?php echo $value->idcliente;?> </td>
                      
                         <td> <?php echo $value->rua;?> </td>

                        <td> <?php echo $value->cidade;?> </td>

                        <td> <?php echo $value->estado;?> </td>

                        <td> <?php echo $value->bairro;?> </td>

                        <td> <?php echo $value->numero;?> </td>
                        
                        <td> <?php echo $value->cep;?> </td>
                        
                        <td>

                             

                        <form method="post" action="Alterarendereco_cliente.php">
                            <tr>
                                <td><input name="idcliente" type="hidden" value="<?php echo $value->idcliente;?>"/> </td>


                                <td><input name="cidade" type="hidden" value="<?php echo $value->cidade;?>"/> </td>                     
                                <td><input name="estado" type="hidden" value="<?php echo $value->estado;?>"/> </td>

                                <td><input name="rua" type="hidden" value="<?php echo $value->rua;?>"/> </td>

                                <td><input name="bairro" type="hidden" value="<?php echo $value->bairro;?>"/> </td>

                                <td><input name="numero" type="hidden" value="<?php echo $value->numero;?>"/> </td>
                                <td><input name="cep" type="hidden" value="<?php echo $value->cep;?>"/> </td>


                                  
                                                               
                               
                               
                                
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

<br><br><br><a href=CadastrarEndereco_Cliente.php><td><button name="Cadastrar nova Endereco" type="submit">Cadastrar novo endereco</button></td></a>


    </form>

</body>
</html>
