

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../../controller/ItensEntrada.php';
require_once '../../controller/Entrada.php';


?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="script.js"></script>
 
    
  <meta charset="utf-8">

  <title>cadastrar itens da entrada</title>
</head>
<body>
  <h2>cadastro de itens da entrada</h2>


  <fieldset style="width: 500px;">
    <!--id fitensVendas ajudar para controlar o javascript -->
    <div id="fitensVendas">

       
                
         <form method='post' action="processa_Itensentrada.php">

        <input type="hidden" name="identrada" value="<?php echo($identrada=$_GET['identrada']); ?>">

        <label class="dados"  for='nomedoproduto'> nome do perfume </label> 
             <select name="idproduto">
                        <option> selecione </option>
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

                  
           

     <label class="dados"  for='precocompra'> preço de compra</label>    
        <input class="entrada" type="text" name="precocompra"><br><br>

     <label class="dados" for='quantidade'> quantidade </label>    
        <input class="entrada" type="text" name="quantidade"><br><br>

     <label class="dados"  for='unidade'>unidade </label>    
        <input class="entrada" type="text" name="unidade"><br><br>

     <label class="dados"  for='ipi'>ipi </label>    
        <input class="entrada" type="text" name="ipi"><br><br>

     <label class="dados"  for='frete'>frete</label>    
        <input class="entrada" type="text" name="frete"><br><br>

     <label class="dados"  for='icms'>icms</label>    
        <input class="entrada" type="text" name="icms"><br><br>

       <input class="botao" type="button" value="inserir itens de venda" onclick="inserirdados(idvenda.value, idproduto.value, quantidade_itens.value, valor.value, desconto.value)">

       <div id="titensVendas">
            <table class="tabela_itensVendas"  id="dtitensVendas" style="width: 400px;">
                    <thead>
                        <h4>lista de itens vendas inserido</h4>
                        <tr>                    
                            <td>produto</td>
                            <td>preço de compra</td>
                            <td>quantidade</td>
                            <td>unidade</td> 
                             <td>ipi</td>
                            <td>frete</td>
                            <td>icms</td>
                        </tr>
                    </thead>
              
                </table>
      
        </div>
        <input  type="submit" value="confirma" name="cadastrar">
        
    </form>
        

    </div>

    
   
  </fieldset>

</body>
</html>

