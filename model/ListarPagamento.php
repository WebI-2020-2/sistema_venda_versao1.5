<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/Pagamentos.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Lista de pagamentos - WEB I</title>
</head>

<body>
   
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">

                        <th>Parcelas</th>
                        <th>Forma de pagamento</th>
                        <th>Valor pagamento</th>
                        <th>Data pagamento</th>
                        <th>Numeros de parcelas</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    
                    $pagamento=New Pagamentos;

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $idpagamento = $_POST['idpagamento'];
                        
                        $pagamento->delete($idpagamento);
                    }
                                                         
                    
                    

                    foreach ($pagamento->findAll() as $key => $value) { ?>
          
                    <tr>
                        <td> <?php echo $value->idparcelas;?> </td>

                        <td> <?php echo $value->idforma_de_pagamento;?> </td>

                        <td> <?php echo $value->valor_pagamento;?> </td>

                        <td> <?php echo $value->data_pagamento;?> </td>

                        <td> <?php echo $value->numerosdeparcelas;?> </td>

                        <td>

                        <form method="post" action="AlterarPagamento.php">
                            <tr>
                                <td><input name="idpagamento" type="hidden" value="<?php echo $value->idpagamento;?>"/> </td>          
                                <td><input name="idparcelas" type="hidden" value="<?php echo $value->idparcelas;?>"/></td> 
                                <td><input name="idforma_de_pagamento" type="hidden" value="<?php echo $value->idforma_de_pagamento;?>"/></td> 
                                <td><input name="valor_pagamento" type="hidden" value="<?php echo $value->valor_pagamento;?>"/></td> 
                                <td><input name="data_pagamento" type="hidden" value="<?php echo $value->data_pagamento;?>"/></td> 
                                <td><input name="numerosdeparcelas" type="hidden" value="<?php echo $value->numerosdeparcelas;?>"/></td> 
                                
                            </tr>
                                <td><button name="alterar" type="submit">Alterar</button></td>

                         </form>
<td>
                            <form method="post" >
                                <input name="idpagamento" type="hidden" value="<?php echo $value->idpagamento;?>"/>
                                <button name="excluir" type="submit" >Excluir</button>
                            </form>
                        </td>

                    </tr>
                    
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->
<br><br><br><a href=CadastrarPagamento.php><td><button name="Cadastrar novo Pagamento" type="submit">Cadastrar novo Pagamento</button></td></a>



    </form>

</body>
</html>
