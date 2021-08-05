<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/Marcas.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Lista de marcas de produtos - WEB I</title>
</head>

<body>
   <fieldset>
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">

                        <th>Código da marca</th>
                        <th>Nome da marca</th>                        
                        
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    
                    $marca=New Marcas;

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $idmarca = $_POST['idmarca'];
                        
                        $marca->delete($idmarca);
                    }
                                                         
                    
                    

                    foreach ($marca->findAll() as $key => $value) { ?>
          
                    <tr>
                        <td> <?php echo $value->idmarca;?> </td>

                        <td> <?php echo $value->nomemarca;?> </td>

                    
                        <td>

                             

                        <form method="post" action="AlterarMarca.php">
                            <tr>
                                <td><input name="idmarca" type="hidden" value="<?php echo $value->idmarca;?>"/> </td>          
                                <td><input name="nomemarca" type="hidden" value="<?php echo $value->nomemarca;?>"/></td> 
                                
                                
                            </tr>
                                <td><button name="alterar" type="submit">Alterar</button></td>

                         </form>
<td>


                            <form method="post" >
                                <input name="idmarca" type="hidden" value="<?php echo $value->idmarca;?>"/>
                                <button name="excluir" type="submit" >Excluir</button>

                            </form>
                        </td>

                    </tr>
                    </fieldset>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->
        

<br><br><br><a href=CadastrarMarca.php><td><button name="Cadastrar nova Marca" type="submit">Cadastrar nova Marca</button></td></a>
    </form>

</body>
</html>
