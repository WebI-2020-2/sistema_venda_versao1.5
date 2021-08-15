<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/Parcelas.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de Itens de Entrada - WEB I</title>
</head>

<body>

  
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">

                <thead>
                    <tr class="active">
                        <th>idparcelas</th>
                        <th>idforma_de_pagamento</th>
                        <th>idvenda</th>
                        <th>numerodeparcelas</th>
                        <th>valorparcela</th>  
                         <th>status</th>
                        <th>vencimento</th>
                        <th>valortotalparcela</th>    
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $parcela=New Parcelas();

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $parcela = $_POST['idparcelas'];
                        
                        $parcela->delete($idparcelas);
                    }
                                                         
                    
                    

                    foreach ($parcela->findAll() as $key => $value) { ?>
          
                    <tr>
                        <td> <?php echo $value->idparcelas;?> </td>

                        <td> <?php echo $value->idforma_de_pagamento;?> </td>

                        <td> <?php echo $value->idvenda;?> </td>

                        <td> <?php echo $value->numerodeparcelas;?> </td>

                         <td> <?php echo $value->valorparcela;?> </td>

                         <td> <?php echo $value->status;?> </td>
                         <td> <?php echo $value->vencimento;?> </td>

                         <td> <?php echo $value->valortotalparcela;?> </td>

                                        

                        <td>

                        <form method="post" action="AlterarVenda.php">
                                <input name="idparcelas" type="hidden" value="<?php echo $value->idparcelas;?>"/>                  
                                <input name="idforma_de_pagamento" type="hidden" value="<?php echo $value->idforma_de_pagamento;?>"/>
                                 <input name="idvenda" type="hidden" value="<?php echo $value->idvenda;?>"/>                  
                                <input name="numerodeparcelas" type="hidden" value="<?php echo $value->numerosdeparcelas;?>"/>
                                 <input name="valordeparcela" type="hidden" value="<?php echo $value->valordeparcela;?>"/>                  
                                <input name="status" type="hidden" value="<?php echo $value->status;?>"/>
                                 <input name="vencimento" type="hidden" value="<?php echo $value->vencimento;?>"/>                  
                                <input name="valortotalparcela" type="hidden" value="<?php echo $value->valortotalparcela;?>"/>
                               
                               
                                <button name="alterar" type="submit">Alterar</button>
                         </form>
<td>
                            <form method="post" >
                                <input name="idparcelas" type="hidden" value="<?php echo $value->idparcelas;?>"/>                  
                                <input name="idforma_de_pagamento" type="hidden" value="<?php echo $value->idforma_de_pagamento;?>"/>
                                 <input name="idvenda" type="hidden" value="<?php echo $value->idvenda;?>"/>                  
                                <input name="numerodeparcelas" type="hidden" value="<?php echo $value->numerosdeparcelas;?>"/>

                                 <input name="valordeparcela" type="hidden" value="<?php echo $value->valordeparcela;?>"/>                  
                                <input name="status" type="hidden" value="<?php echo $value->status;?>"/>
                                 <input name="vencimento" type="hidden" value="<?php echo $value->vencimento;?>"/>                  
                                <input name="valortotalparcela" type="hidden" value="<?php echo $value->valortotalparcela;?>"/>
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
