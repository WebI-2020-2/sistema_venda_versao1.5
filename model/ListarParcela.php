<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../controller/Parcelas.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de parcelas - WEB I</title>
</head>

<body>
    <h2>Lista das Parcelas</h2>
   <fieldset>
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">

                         
                        <th>Forma_de_pagamento</th>
                        <th>Número de parcelas</th>  
                        <th>Valor da parcela</th>
                         <th>Status</th>
                        <th>Vencimento </th>  
                        <th>Valor total </th>
                       
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    
                    $parcela =  New Parcelas;

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $idparcelas = $_POST['idparcelas'];
                        
                        $parcela->delete($idparcelas);
                    }
                                                         
                    
                    

                    foreach ($parcela->findAll() as $key => $value) { ?>
          
                    <tr>
                        
                        <td> <?php echo $value->idforma_de_pagamento;?> </td>

                        <td> <?php echo $value->numerodeparcelas;?> </td>

                        <td> <?php echo $value->valorparcela;?> </td>

                        <td> <?php echo $value->status;?> </td>

                        <td> <?php echo $value->vencimento;?> </td>

                        <td> <?php echo $value->valortotalparcela;?> </td>

                        
                        <td>

                             

                        <form method="post" action="AlterarParcela.php">
                            <tr>
                                <td><input name="idparcelas" type="hidden" value="<?php echo $value->idparcelas;?>"/> </td>        
                                 <td><input name="idforma_de_pagamento" type="hidden" value="<?php echo $value->idforma_de_pagamento;?>"/> </td>                     
                                <td><input name="numerodeparcelas" type="hidden" value="<?php echo $value->numerodeparcelas;?>"/> </td>                                               
                                <td><input name="valorparcela" type="hidden" value="<?php echo $value->valorparcela;?>"/></td> 
                                <td><input name="status" type="hidden" value="<?php echo $value->status;?>"/></td> 
                                <td><input name="vencimento" type="hidden" value="<?php echo $value->vencimento;?>"/></td> 
                                <td><input name="valortotalparcela" type="hidden" value="<?php echo $value->valortotalparcela;?>"/></td> 
                               
                                
                            </tr>
                                <td><button name="alterar" type="submit">Alterar</button></td>

                         </form>
<td>


                            <form method="post" >
                                <input name="idparcelas" type="hidden" value="<?php echo $value->idparcelas;?>"/>
                                <button name="excluir" type="submit" >Excluir</button>
                            </form>
                        </td>

                    </tr>
                    </fieldset>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->

<br><br><br><a href= ../views/CadastrarParcela.php><td><button name="Cadastrar nova Parcela" type="submit">Cadastrar nova Parcela</button></td></a>


    </form>

</body>
</html>
