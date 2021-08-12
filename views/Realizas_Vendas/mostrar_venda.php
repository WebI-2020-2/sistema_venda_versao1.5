
 <?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../../controller/ItensVenda.php';
require_once '../../controller/Venda.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Lista de venda - WEB I</title>
</head>

<body>
   
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">

                <thead>
                    <tr class="active">                      
                        <th>datavenda</th>
                        <th>descontototal</th>
                        <th>descontoacerto</th>
                        <th>valortotal</th>                 

                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $venda=New Vendas;

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $idvenda = $_POST['idvenda'];
                        
                        $venda->delete($iditensvendas);
                    }
                                                         
                    
                    

                    foreach ($venda->Mostrar_Venda() as $key => $value) { ?>
          
                    <tr>

                         <td> <?php echo $value->datavenda;?> </td>

                         <td> <?php echo $value->descontototal;?> </td>

                         <td> <?php echo $value->descontoacerto;?> </td>

                        <td> <?php echo $value->valortotal;?> </td>

                        <td>

                        <form method="post" action="AlterarVenda.php">
                                <input name="idvenda" type="hidden" value="<?php echo $value->idvenda;?>"/>                  
                                 <input name="idcliente" type="hidden" value="<?php echo $value->idcliente;?>"/>                  
                                 <input name="datavenda" type="hidden" value="<?php echo $value->datavenda;?>"/>                              
                                <input name="descontototal" type="hidden" value="<?php echo $value->descontototal;?>"/>
                                 <input name="descontoacerto" type="hidden" value="<?php echo $value->descontoacerto;?>"/>        
                                 <input name="valortotal" type="hidden" value="<?php echo $value->valortotal;?>"/>                  
                               
                                <button name="alterar" type="submit">Alterar</button>
                         </form>
<td>
                            <form method="post" >
                                <input name="idvenda" type="hidden" value="<?php echo $value->idvenda;?>"/>                  
                                 <input name="idcliente" type="hidden" value="<?php echo $value->idcliente;?>"/>                  
                                 <input name="datavenda" type="hidden" value="<?php echo $value->datavenda;?>"/>                  
                                               
                                <input name="descontototal" type="hidden" value="<?php echo $value->descontototal;?>"/>
                                 <input name="descontoacerto" type="hidden" value="<?php echo $value->descontoacerto;?>"/>                  
                                 <input name="valortotal" type="hidden" value="<?php echo $value->valortotal;?>"/>
                                <button name="excluir" type="submit" >Excluir</button>
                            </form>
                        </td>

                    </tr>
                    
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->




    </form>

    <form method="post" action="">
       
        <input type="submit" name="escolher-forma-pagamento" value="escolher forma de pagamento">
    </form>

</body>
</html>




 <?php
    $venda = new Vendas;
     if(isset($_POST['escolher-forma-pagamento'])) {


    try {
        $idvenda = $venda->insert($idcliente, date("Y-m-d"), 0);
        header("Location:forma_pagamento.php?idvenda=" . $idvenda);

    } catch (PDOException $err) {
        echo $err->getMessage();
    }
    }
?>
