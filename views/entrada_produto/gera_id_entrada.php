<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("../../controller/Entrada.php");

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"  href="../../public/css/gera_id_entrada.css"> 
    <meta charset="utf-8">
    <title class="titulo">cadastrar vendas</title>
    </head>
        <body>

            <section id="nav-test">
                  <div id="nav-container">
                      <ul>

                          <li class="nav-li"><a href="../views/Cadastro_Cliente/CadastrarCliente.php">CLIENTES <img src="../../public/imagem/clientes.png"></a></li>
                          <li class="nav-li"><a href="gera_id_entrada.php">ENTRADA <img src="../../public/imagem/fornecedor.png"></a></li>
                           <li class="nav-li"><a href="../../model/ListarProdutoVenda.php">PRODUTOS <img src="../../public/imagem/produto.png"></a></li> 

                      </ul>
                      <img class="logo" src="../../public/imagem/LOGO2.png">

                  </div>

            </section>

            <div class="container">
            <table class="bordered striped centered">

            
            
            <form method='post' action="">
               
                  
                        <h1 class="titulo">Cadastro de entrada</h1>
                       <label class="inp" for='idfornecedor'> Nome do fornecedor</label><br><br>
                        <select name="idfornecedor" class="inp2">
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

                                    $data = $conn->query('SELECT razaosocial, idfornecedor FROM fornecedor ');

                                    foreach($data as $row) {
                                         echo  '<option value="'.$row['idfornecedor'].'">'.$row['razaosocial'].'-'.$row['idfornecedor'].'</option>';

                                    }
                                } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>
                             </option>
                        </select><br><br>

                   
                
                       <input class="buton" type="submit"  value="realizar entrada de produtos" name="cadastrar">
                 
                </form>
            
    <footer> &#169; 2021 Copyright - <b>John, Leonardo, Paulo Sergio, Robério.</b></footer>
</body>
</html>

    <?php
  

    $entrada = new Entrada;
     if(isset($_POST['cadastrar'])) {


        if($entrada->insert()){
        }
   

    try {
        $identrada = $entrada->insert($identrada, date("Y-m-d"), 0);
        /*index.php?idvenda significa que vou passa o ultimo idvenda da tabela para proximo pagina
         para proximo pagina */
        header("Location:inserir_Itens_entradas.php?identrada=" . $identrada);

    } catch (PDOException $err) {
        echo $err->getMessage();
    }
    }
    
    ?>




