<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/venda.php';

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
                        <th>idvenda</th>
                        <th>idusuario</th>
                        <th>idcliente</th>
                        <th>idforma_de_pagamento</th>
                        <th>datavenda</th>
                        <th>qntparcelas</th>
                        <th>prazo</th>
                        <th>descontototal</th>
                        <th>descontoacerto</th>
                        <th>status</th>
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
                                                         
                    
                    

                    foreach ($venda->findAll() as $key => $value) { ?>
          
                    <tr>
                        <td> <?php echo $value->idvenda;?> </td>

                        <td> <?php echo $value->idusuario;?> </td>

                        <td> <?php echo $value->idcliente;?> </td>

                        <td> <?php echo $value->idforma_de_pagamento;?> </td>

                         <td> <?php echo $value->datavenda;?> </td>

                        <td> <?php echo $value->qntparcelas;?> </td>

                        <td> <?php echo $value->prazo;?> </td>

                         <td> <?php echo $value->descontototal;?> </td>

                         <td> <?php echo $value->descontoacerto;?> </td>

                        <td> <?php echo $value->status;?> </td>

                        <td> <?php echo $value->valortotal;?> </td>

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
