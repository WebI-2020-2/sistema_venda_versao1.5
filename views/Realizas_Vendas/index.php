<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("Venda/Venda.php");
require_once("ItensVenda/ItensVenda.php");



?>


<!DOCTYPE html>
<html>
<head>
    <script src="views/js/script.js"></script>
    <script src="views/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
	<title class="titulo">cadastrar vendas</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
        <body>

            <fieldset><br><br>
        	
            <form method='post' action="">
	           
                  <fieldset class="formulario"><br><br>
                    <fieldset>
                        <h2>cadastro de vendas</h2>
                       <label class="dados" for='idcliente'> nome do cliente:</label><br><br>
                        <select name="idcliente">
                            <option>
                            <?php
                                /*
                                * Método de conexão sem padrões
                                */

                                $username = 'postgres';
                                $password = '123456';

                                try {
                                    $conn = new PDO('pgsql:host=localhost;dbname=venda', $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $data = $conn->query('SELECT nomecliente, idcliente FROM cliente ');

                                    foreach($data as $row) {
                                         echo  '<option value="'.$row['idcliente'].'">'.$row['nomecliente'].'-'.$row['idcliente'].'</option>';

                                    }
                                } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>
                             </option>
                        </select><br><br>

                      <label class="dados" for='datavenda'> data da venda </label>    
                   <input class="entrada" type="date" name="datavenda"/><br><br>
                   
                </fieldset><br><br>
                       <input class="botao" type="submit"  value="realizar venda" name="cadastrar" onclick="ItensVenda/index.php">
                 
                </form>
            </fieldset>
	</fieldset>
</body>
</html>



    <?php
  

    $venda = new Vendas;
     if(isset($_POST['cadastrar'])) {


        $idcliente = ($_POST['idcliente']);
        $venda->setIdCliente($idcliente);

        if($venda->insert()){
        }
   

    try {
        $idvenda = $venda->insert($idcliente, date("Y-m-d"), 0);
        /*index.php?idvenda significa que vou passa o ultimo idvenda da tabela para proximo pagina
         para proximo pagina */
        header("Location: ./ItensVenda/index.php?idvenda=" . $idvenda);

    } catch (PDOException $err) {
        echo $err->getMessage();
    }
    }
    
    ?>



