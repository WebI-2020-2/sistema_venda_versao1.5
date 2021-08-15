
 <?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../../controller/ItensVenda.php';
require_once '../../controller/Venda.php';

?>



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

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
       <link rel="stylesheet"  href="../../public/css/mostrar_venda.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
        <title>Lista de Venda</title>
</head>

<body>
    
    <section id="nav-test">
      <div id="nav-container">
          <ul>

              <li class="nav-li active-nav"><a href="../../Login2/dashboard.php">INICIO  <img src="../../public/imagem/home.png"></a></li>
              <li class="nav-li"><a href="../Cadastro_Cliente/CadastrarCliente.php">CLIENTES <img src="../../public/imagem/clientes.png"></a></li>
              <li class="nav-li"><a href="../Realizas_Vendas/index.php">VENDAS <img src="../../public/imagem/vendas.png"></a></li>
          </ul>
          <img class="logo" src="../../public/imagem/LOGO2.png">

      </div>

  </section>
                
    <!-- Inicio da tabela -->
    <div class="container">
    <table class="bordered striped centered">

                <thead>
                    <tr class="nomes">                      
                        <th>Data Venda</th>
                        <th>Desconto Total</th>
                        <th>Desconto Acerto</th>
                        <th>Valor Total</th>                 

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

                        

                        <form method="post" action="AlterarVenda.php">
                                <input name="idvenda" type="hidden" value="<?php echo $value->idvenda;?>"/>                  
                                 <input name="idcliente" type="hidden" value="<?php echo $value->idcliente;?>"/>                  
                                 <input name="datavenda" type="hidden" value="<?php echo $value->datavenda;?>"/>                              
                                <input name="descontototal" type="hidden" value="<?php echo $value->descontototal;?>"/>
                                 <input name="descontoacerto" type="hidden" value="<?php echo $value->descontoacerto;?>"/>        
                                 <input name="valortotal" type="hidden" value="<?php echo $value->valortotal;?>"/>                  
                               
                                <td><button class="buton1" name="alterar" type="submit">Alterar</button></td>
                         </form>

                            <form method="post" >
                                <input name="idvenda" type="hidden" value="<?php echo $value->idvenda;?>"/>                  
                                 <input name="idcliente" type="hidden" value="<?php echo $value->idcliente;?>"/>                  
                                 <input name="datavenda" type="hidden" value="<?php echo $value->datavenda;?>"/>                  
                                               
                                <input name="descontototal" type="hidden" value="<?php echo $value->descontototal;?>"/>
                                 <input name="descontoacerto" type="hidden" value="<?php echo $value->descontoacerto;?>"/>                  
                                 <input name="valortotal" type="hidden" value="<?php echo $value->valortotal;?>"/>
                                <td><button class="buton1" name="excluir" type="submit" >Excluir</button></td>
                            </form>
                      

                    </tr>
                    
                    <?php } ?>
                </tbody>
            </table>
            </div>
            <!-- Fim da tabela -->




    </form>

    <form method="post" action="">
       
        <input class="buton" type="submit" name="escolher-forma-pagamento" value="Formas de Pagamentos">
    </form>
    
    <footer> &#169; 2021 Copyright - <b>John, Leonardo, Paulo Sergio, Robério.</b></footer>
</body>
</html>

