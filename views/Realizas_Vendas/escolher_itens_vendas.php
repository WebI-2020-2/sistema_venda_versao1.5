

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../../controller/ItensVenda.php';

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="script.js"></script>
 
    
  <meta charset="utf-8">

  <title>cadastrar itens da venda</title>
</head>
<body>
  <h2>cadastro de itens da venda</h2>


  <fieldset style="width: 500px;">
    <!--id fitensVendas ajudar para controlar o javascript -->
    <div id="fitensVendas">

       
                
         <form method='post' action="">

        <input type="hidden" name="idvenda" value="<?php echo($idvenda=$_GET['idvenda']); ?>">

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

                  
     <label class="dados"  for='quantidade_itens'> quantidade: </label>    
        <input class="entrada" type="text" name="quantidade_itens"><br><br>

     <label class="dados" for='valor'> valor: </label>    
        <input class="entrada" type="text" name="valor"><br><br>

     <label class="dados"  for='desconto'>desconto: </label>    
        <input class="entrada" type="text" name="desconto"><br><br>

     
        <input  type="submit" value="confirma" name="cadastrar">
        
    </form>
        

    </div>

    
   
  </fieldset>



 

</body>
</html>
   

   

      <?php

      $ItensVenda = new ItensVendas();  
    if(isset($_POST['cadastrar'])):
            $idvenda = $_POST['idvenda'];
            $idproduto = $_POST['idproduto'];
            $quantidade_itens = $_POST['quantidade_itens'];
            $valor = $_POST['valor'];
            $desconto = $_POST['desconto'];
          
            $ItensVenda->setIdVenda($idvenda);
            $ItensVenda->setIdProduto($idproduto);
            $ItensVenda->setQuantidade_Itens($quantidade_itens);
            $ItensVenda->setValor($valor);
            $ItensVenda->setDesconto($desconto);

             if($ItensVenda->insert()){
                echo "itens_vendas ". $idproduto. " inserido com sucesso";
                header("Location:mostrar_venda.php");
           
            }

    endif;  
   
?>

      