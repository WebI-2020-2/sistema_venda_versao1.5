

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../../controller/ItensEntrada.php';
require_once '../../controller/Entrada.php';


?>


<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet"  href="../../public/css/inserir_Itens_entra.css">
 
    
  <meta charset="utf-8">

  <title>cadastrar itens da entrada</title>
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

  <h1 class="titulo">Cadastro de itens da entrada</h1>


  
    <!--id fitensVendas ajudar para controlar o javascript -->
    

       
                
         <form method='post' action="processa_Itensentrada.php">

        <input type="hidden" name="identrada" value="<?php echo($identrada=$_GET['identrada']); ?>">

        <label  class="inp2"  for='nomedoproduto'> Nome do perfume </label> 
             <select name="idproduto" class="inp2">
                        <option> selecione</option>
                        <option>
                            <?php
                                /*
                                * Método de conexão sem padrões
                                */

                                $username = 'jeglqcbjjjuymy';
                                $password = '0ad662fe8fe884dc3326e28e229daa2ec896848d88ac3066e7c418d9405db45a';


                                try {
                                    $conn = new PDO('pgsql:host=ec2-34-194-14-176.compute-1.amazonaws.com;dbname=d5gv25ellk3j9v', $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $data = $conn->query('SELECT nomedoproduto, idproduto FROM produto');

                                    foreach($data as $row) {
                                         echo  '<option value="'.$row['idproduto'].'">'.$row['nomedoproduto'].'-'.$row['idproduto'].'</option>';

                                    }
                                } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>
                    
                        </option>
                 </select><br><br>

                  
           

     <label class="dados"  for='precocompra'></label>    
        <input class="inp" type="text" name="precocompra" placeholder="Preço de compra"><br><br>

     <label  class="dados" for='quantidade'></label>    
        <input class="inp" type="text" name="quantidade" placeholder="Quantidade"><br><br>

     <label class="dados"  for='unidade'></label>    
        <input class="inp" type="text" name="unidade" placeholder="Unidade"><br><br>

     <label class="dados"  for='ipi'></label>    
        <input class="inp" type="text" name="ipi"placeholder="IPI"><br><br>

     <label class="dados"  for='frete'></label>    
        <input class="inp"  type="text" name="frete"placeholder="Frete"><br><br>

     <label class="dados"  for='icms'></label>    
        <input class="inp" type="text" name="icms" placeholder="ICMS"><br><br>

    
     
        <input  class="buton" type="submit" value="confirma" name="cadastrar">
        
    </form>
        

    </div>

    <footer> &#169; 2021 Copyright - <b>John, Leonardo, Paulo Sergio, Robério.</b></footer>

</body>
</html>

