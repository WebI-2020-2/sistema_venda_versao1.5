<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/Clientes.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de Clientes - WEB I</title>
</head>

<body>
   
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">
                        <th>idcliente</th>
                        <th>nomecliente</th>
                        

                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $cliente=New Clientes;

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $idcliente = $_POST['idcliente'];
                        
                        $cliente->delete($idcliente);
                    }
                                                         
                    
                    

                    foreach ($cliente->findAll() as $key => $value) { ?>
          
                    <tr>
                        <td> <?php echo $value->idcliente;?> </td>

                        <td> <?php echo $value->nomecliente;?> </td>

                        <td>

                        <form method="post" action="Alterar_Cliente.php">
                                <input name="idcliente" type="hidden" value="<?php echo $value->idcliente;?>"/>                  
                                <input name="nomecliente" type="hidden" value="<?php echo $value->nomecliente;?>"/>
                               
                                <button name="alterar" type="submit">Alterar</button>
                         </form>
<td>
                            <form method="post" >
                                <input name="idcliente" type="hidden" value="<?php echo $value->idcliente;?>"/>
                                <button name="excluir" type="submit" >Excluir</button>
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
