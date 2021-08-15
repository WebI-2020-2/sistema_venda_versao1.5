<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/Formapagamentos.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de formas de pagamentos - WEB I</title>
</head>

<body>
   <fieldset>
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">

                        <th>Código da forma de pagamento</th>
                        <th>Tipos de pagamento</th>                        
                        
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    
                    $formaspagamento=New Formaspagamentos;

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $idforma_de_pagamento = $_POST['idforma_de_pagamento'];
                        
                        $formaspagamento->delete($idforma_de_pagamento);
                    }
                                                         
                    
                    

                    foreach ($formaspagamento->findAll() as $key => $value) { ?>
          
                    <tr>
                        <td> <?php echo $value->idforma_de_pagamento;?> </td>

                        <td> <?php echo $value->tipo_pagamento;?> </td>

                    
                        <td>

                             

                        <form method="post" action="AlterarFormapagamento.php">
                            <tr>
                                <td><input name="idforma_de_pagamento" type="hidden" value="<?php echo $value->idforma_de_pagamento;?>"/> </td>          
                                <td><input name="tipo_pagamento" type="hidden" value="<?php echo $value->tipo_pagamento;?>"/></td> 
                                
                                
                            </tr>
                                <td><button name="alterar" type="submit">Alterar</button></td>

                         </form>
<td>


                            <form method="post" >
                                <input name="idforma_de_pagamento" type="hidden" value="<?php echo $value->idforma_de_pagamento;?>"/>
                                <button name="excluir" type="submit" >Excluir</button>

                            </form>
                        </td>

                    </tr>
                    </fieldset>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->
        

<br><br><br><a href=CadastrarFormapagamento.php><td><button name="Cadastrar nova Forma de pagamento" type="submit">Cadastrar nova Forma de pagamento</button></td></a>
    </form>

</body>
</html>
