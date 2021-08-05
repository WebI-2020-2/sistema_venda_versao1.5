<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/Entrada.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de entradas - WEB I</title>
</head>

<body>
   <fieldset>
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">

                         
                        <th>Descrição da entrada</th>
                        <th>Data da compra </th>  
                        <th>Valor da Compra</th>
                       
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    
                    $entrada =  New Entrada;

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $identrada = $_POST['identrada'];
                        
                        $entrada->delete($identrada);
                    }
                                                         
                    
                    

                    foreach ($entrada->findAll() as $key => $value) { ?>
          
                    <tr>
                        
                        <td> <?php echo $value->identrada;?> </td>
                         <td> <?php echo $value->idusuario;?> </td>
                         <td> <?php echo $value->idfornecedor;?> </td>


                        <td> <?php echo $value->datacompra;?> </td>

                        <td> <?php echo $value->valortotaldanota;?> </td>

                        
                        <td>

                             

                        <form method="post" action="Alterarentrada.php">
                            <tr>
                                <td><input name="identrada" type="hidden" value="<?php echo $value->identrada;?>"/> </td>

                                <td><input name="idfornecedor" type="hidden" value="<?php echo $value->idfornecedor;?>"/> </td> 

                                <td><input name="idusuario" type="hidden" value="<?php echo $value->idusuario;?>"/> </td>    

                                 <td><input name="datacompra" type="hidden" value="<?php echo $value->datacompra;?>"/> </td>                     
                                <td><input name="valortotaldanota" type="hidden" value="<?php echo $value->valortotaldanota;?>"/> </td>                                                               
                               
                               
                                
                            </tr>
                                <td><button name="alterar" type="submit">Alterar</button></td>

                         </form>
<td>


                            <form method="post" >
                                <input name="identrada" type="hidden" value="<?php echo $value->identrada;?>"/>
                                
                                <button name="excluir" type="submit" >Excluir</button>
                            </form>
                        </td>

                    </tr>
                    </fieldset>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->

<br><br><br><a href=Cadastrarentrada.php><td><button name="Cadastrar nova entrada" type="submit">Cadastrar nova entrada</button></td></a>


    </form>

</body>
</html>
