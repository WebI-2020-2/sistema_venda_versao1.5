<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/Prateleiras.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Lista de prateleiras - WEB I</title>
</head>

<body>
   <fieldset>
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">

                         
                        <th>Descrição da prateleira</th>
                        <th>Categoria </th>  
                        <th>Quantidade de frascos</th>
                       
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    
                    $prateleira =  New Prateleiras;

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $idprateleira = $_POST['idprateleira'];
                        
                        $prateleira->delete($idprateleira);
                    }
                                                         
                    
                    

                    foreach ($prateleira->findAll() as $key => $value) { ?>
          
                    <tr>
                        
                        <td> <?php echo $value->descricaoprateleira;?> </td>

                        <td> <?php echo $value->idcategoria;?> </td>

                        <td> <?php echo $value->quantidadefrascos;?> </td>

                        
                        <td>

                             

                        <form method="post" action="AlterarPrateleira.php">
                            <tr>
                                <td><input name="idprateleira" type="hidden" value="<?php echo $value->idprateleira;?>"/> </td>        
                                 <td><input name="idcategoria" type="hidden" value="<?php echo $value->idcategoria;?>"/> </td>                     
                                <td><input name="descricaoprateleira" type="hidden" value="<?php echo $value->descricaoprateleira;?>"/> </td>                                                               
                                <td><input name="quantidadefrascos" type="hidden" value="<?php echo $value->quantidadefrascos;?>"/></td> 
                               
                                
                            </tr>
                                <td><button name="alterar" type="submit">Alterar</button></td>

                         </form>
<td>


                            <form method="post" >
                                <input name="idprateleira" type="hidden" value="<?php echo $value->idprateleira;?>"/>
                                <button name="excluir" type="submit" >Excluir</button>
                            </form>
                        </td>

                    </tr>
                    </fieldset>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->

<br><br><br><a href=CadastrarPrateleira.php><td><button name="Cadastrar nova Prateleira" type="submit">Cadastrar nova Prateleira</button></td></a>


    </form>

</body>
</html>
