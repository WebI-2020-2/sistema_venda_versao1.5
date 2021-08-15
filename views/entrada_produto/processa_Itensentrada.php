<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../../controller/ItensEntrada.php';
require_once '../../controller/Entrada.php';


?>

<?php
  

    $itens_entrada = new ItensEntrada();

     if(isset($_POST['cadastrar'])) {
        $identrada = $_POST['identrada'];
        $idproduto=$_POST['idproduto'];
        $precocompra=$_POST['precocompra'];
        $quantidade=$_POST['quantidade'];
        $unidade=$_POST['unidade'];
        $ipi=$_POST['ipi'];
        $frete=$_POST['frete'];
        $icms=$_POST['icms'];

        $itens_entrada->setIdentrada($identrada);         
        $itens_entrada->setIdproduto($idproduto);
        $itens_entrada->setPrecocompra($precocompra);
        $itens_entrada->setQuantidadeitensentrada($quantidade);
        $itens_entrada->setUnidade($unidade);
        $itens_entrada->setIpi($ipi);
        $itens_entrada->setFrete_itensentrada($frete);
        $itens_entrada->setIcms($icms);


        if($itens_entrada->insert()){

            echo "itens inserindo com sucesso";
        }
    }
    
?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        
        <link rel="stylesheet" type="text/css" href="../../public/css/processa_Itensentrada.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
        <title class="titulo">Lista de Itens de Entrada - WEB I</title>
</head>

<body>

    <section id="nav-test">
                  <div id="nav-container">
                      <ul>

                          <li class="nav-li"><a href="../views/Cadastro_Cliente/CadastrarCliente.php">CLIENTES <img src="../../public/imagem/clientes.png"></a></li>
                          <li class="nav-li"><a href="gera_id_entrada.php">ENTRADA <img src="../../public/imagem/fornecedor.png"></a></li>
                           <li class="nav-li"><a href="../model/ListarProdutoVenda.php">PRODUTOS <img src="../../public/imagem/produto.png"></a></li> 

                      </ul>
                      <img class="logo" src="../../public/imagem/LOGO2.png">

                  </div>

    </section>
        </section>

  
    <!-- Inicio da tabela -->
         <div >
        <table class="bordered striped centered">
                <center><h1 class="titulo">lista de produtos inserindo</h1></center>
               
                <thead>
                    <tr class="nomes">
                        <th>iditensentrada</th>
                        <th>identrada</th>
                        <th>idproduto</th>
                        <th>preço de compra</th>
                        <th>quantidade</th>  
                         <th>unidade</th>
                        <th>ipi</th>
                        <th>frete</th>
                        <th>icms</th>      
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $itensentrada=New ItensEntrada();

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $itensentrada = $_POST['iditensentrada'];
                        
                        $itensentrada->delete($iditensentrada);
                    }
                                                         
                    
                    

                    foreach ($itensentrada->Mostrar_Itens_Entrada() as $key => $value) { ?>
          
                    <tr>
                        <td> <?php echo $value->iditensentrada;?> </td>

                        <td> <?php echo $value->identrada;?> </td>

                        <td> <?php echo $value->idproduto;?> </td>

                        <td> <?php echo $value->precocompra;?> </td>

                         <td> <?php echo $value->quantidade;?> </td>

                         <td> <?php echo $value->unidade;?> </td>
                         <td> <?php echo $value->ipi;?> </td>

                         <td> <?php echo $value->frete;?> </td>

                         <td> <?php echo $value->icms;?> </td>

                       

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
                               
                                <button class="buton1" name="alterar" type="submit">Alterar</button><br>
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
                                <button class="buton1" name="excluir" type="submit" >Excluir</button>
                            </form>
                        </td>

                    </tr>
                    
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->
    </form>

    <form action="gera_id_entrada.php">

          <button class="buton" onclick="gera_id_entrada.php">Inserir novos produtos</button>
        
    </form>

    <footer> &#169; 2021 Copyright - <b>John, Leonardo, Paulo Sergio, Robério.</b></footer>




</body>
</html>
