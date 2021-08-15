<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("../../controller/Venda.php");
require_once("../../controller/ItensVenda.php");



?>

<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" type="text/css" href="../../public/css/inicio.css">
	<meta charset="utf-8">
	<title class="titulo">cadastrar vendas</title>
   
    </head>

<body>

   <section id="nav-test">
      <div id="nav-container">
          <ul>

              <li class="nav-li active-nav"><a href="../../Login2/dashboard.php">INICIO  <img src="../../public/imagem/home.png"></a></li>
              <li class="nav-li"><a href="../Cadastro_Cliente/pagina_para_pegar_idcliente.php">CLIENTES <img src="../../public/imagem/clientes.png"></a></li>
              <li class="nav-li"><a href="../Realizas_Vendas/index.php">VENDAS <img src="../../public/imagem/vendas.png"></a></li>
          </ul>
          <img class="logo" src="../../public/imagem/LOGO2.png">

      </div>

  </section>

  </section>

        	
            <form method='post' action="">
	           
                        <h1 class="titulo">Cadastro de vendas</h1>
                       <label class="dados" for='idcliente'></label><br><br>
                        <select name="idcliente" class="inp2">
                            <option>Selecione o CLiente</option>
                            <?php
                                /*
                                * Método de conexão sem padrões
                                */

                                $username = 'jeglqcbjjjuymy';
                                $password = '0ad662fe8fe884dc3326e28e229daa2ec896848d88ac3066e7c418d9405db45a';

                                try {
                                    $conn = new PDO('pgsql:host=
                                    ec2-34-194-14-176.compute-1.amazonaws.com;dbname=d5gv25ellk3j9v', $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $data = $conn->query('SELECT nomecliente, idcliente FROM cliente ');

                                    foreach($data as $row) {
                                         echo  '<option value="'.$row['idcliente'].'">'.$row['nomecliente'].'-'.$row['idcliente'].'</option>';

                                    }
                                } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>
                           
                        </select><br><br>

                      <label class="inp" for='datavenda'>Data da venda </label>    
                   <input class="inp" type="date" name="datavenda"/><br><br>
                   
             
                       <input class="buton" type="submit"  value="Realizar venda" name="cadastrar" onclick="ItensVenda/index.php">
                 
                </form>

                <footer> &#169; 2021 Copyright - <b>John, Leonardo, Paulo Sergio, Robério.</b></footer>

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
        header("Location:escolher_itens_vendas.php?idvenda=" . $idvenda);

    } catch (PDOException $err) {
        echo $err->getMessage();
    }
    }
    
    ?>




