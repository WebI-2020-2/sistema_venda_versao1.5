

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../../controller/ItensVenda.php';

?>
<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" type="text/css" href="../../public/css/escolher_itens_vendas.css">
        
  <meta charset="utf-8">

  <title>cadastrar itens da venda</title>
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
                
        <form method='post' action="">
        <h1 class="titulo">Cadastro Itens Vendas</h1>

        <input type="hidden" name="idvenda" value="<?php echo($idvenda=$_GET['idvenda']); ?>">

        <label class="dados"  for='nomedoproduto'></label><br><br> 
             <select name="idproduto" class="inp2">
                        <option> Selecione Itens</option>
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

                  
     <label class="dados"  for='quantidade_itens'>    
        <input class="inp2" type="text" name="quantidade_itens" placeholder="Digite a Quantidade"><br><br>

     <label class="dados" for='valor'></label>    
        <input class="inp2" type="text" name="valor" placeholder="Digite o Valor"><br><br>

     <label class="dados"  for='desconto'></label>    
        <input class="inp2" type="text" name="desconto" placeholder="Digite o Desconto"><br><br>

     
        <input class="buton" type="submit" value="Confirma" name="cadastrar">
        
    </form>
        

<footer> &#169; 2021 Copyright - <b>John, Leonardo, Paulo Sergio, Robério.</b></footer>

 

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

      