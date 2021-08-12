<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/ItensVenda.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de venda - WEB I</title>
</head>

<body>

   
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">

                <thead>
                    <tr class="active">
                        <th>iditensvendas</th>
                        <th>idvenda</th>
                        <th>idproduto</th>
                        <th>quantidade</th>
                        <th>valorvenda</th>      
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $itensvenda=New ItensVendas();

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $iditensvenda = $_POST['iditensvendas'];
                        
                        $itensvenda->delete($iditensvendas);
                    }
                                                         
                    
                    foreach ($itensvenda->findAll() as $key => $value) { ?>
          
                    <tr>
                        <td> <?php echo $value->iditensvendas;?> </td>

                        <td> <?php echo $value->idvenda;?> </td>

                        <td> <?php echo $value->idproduto;?> </td>

                        <td> <?php echo $value->quantidade;?> </td>

                         <td> <?php echo $value->valorvenda;?> </td>

                       

                        <td>



                        <form method="post" action="AlterarVenda.php">

                                <input name="idvenda" type="hidden" value="<?php echo $value->idvenda;?>"/>                  
                                <input name="idusuario" type="hidden" value="<?php echo $value->idusuario;?>"/>
                                 <input name="idcliente" type="hidden" value="<?php echo $value->idcliente;?>"/>                  
                                <input name="idforma_de_pagamento" type="hidden" value="<?php echo $value->idforma_de_pagamento;?>"/>
                                 <input name="datavenda" type="hidden" value="<?php echo $value->datavenda;?>"/>                  
                                <input name="qntparcelas" type="hidden" value="<?php echo $value->qntparcelas;?>"/>
                                 <input name="prazo" type="hidden" value="<?php echo $value->prazo;?>"/>                  
                                <input name="descontototal" type="hidden" value="<?php echo $value->descontototal;?>"/>
                                 <input name="descontoacerto" type="hidden" value="<?php echo $value->descontoacerto;?>"/>                  
                                <input name="status" type="hidden" value="<?php echo $value->status;?>"/>
                                 <input name="valortotal" type="hidden" value="<?php echo $value->valortotal;?>"/>                  
                               
                                <button name="alterar" type="submit">Alterar</button>
                         </form>
<td>
                            <form method="post" >
                                <input name="idvenda" type="hidden" value="<?php echo $value->idvenda;?>"/>                  
                                <input name="idusuario" type="hidden" value="<?php echo $value->idusuario;?>"/>
                                 <input name="idcliente" type="hidden" value="<?php echo $value->idcliente;?>"/>                  
                                <input name="idforma_de_pagamento" type="hidden" value="<?php echo $value->idforma_de_pagamento;?>"/>
                                 <input name="datavenda" type="hidden" value="<?php echo $value->datavenda;?>"/>                  
                                <input name="qntparcelas" type="hidden" value="<?php echo $value->qntparcelas;?>"/>
                                 <input name="prazo" type="hidden" value="<?php echo $value->prazo;?>"/>                  
                                <input name="descontototal" type="hidden" value="<?php echo $value->descontototal;?>"/>
                                 <input name="descontoacerto" type="hidden" value="<?php echo $value->descontoacerto;?>"/>                  
                                <input name="status" type="hidden" value="<?php echo $value->status;?>"/>
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

</body>
</html>
