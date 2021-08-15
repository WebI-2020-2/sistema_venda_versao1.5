<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("../../controller/Formapagamentos.php");

?>
 


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"  href="../../public/css/forma_pagamento.css">
	<meta charset="utf-8">
	<title class="titulo">Forma de Pagamento</title>
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
                <h1 class="titulo">Escolha a Forma de Pagamento</h1>
                  
                        <input type="hidden" name="idvenda" value="<?php echo($idvenda=$_GET['idvenda']); ?>">                 

                    <label for='tipo_pagamento'></label><br><br>
                    <select name="tipo_pagamento" class="inp2">
                        <option> Selecione a Forma de Pagamento </option>
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

                                    $data = $conn->query('SELECT tipo_pagamento FROM forma_de_pagamento limit 4');

                                    foreach($data as $row) {
                                         echo  '<option value="'.$row['tipo_pagamento'].'">'.$row['tipo_pagamento'].'</option>';

                                    }
                                } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>
                    
                        </option>
                     </select><br><br>
                     <!-- colocar no automatico o valor total do pagamento-->

                     <label class="inp">Data Pagamento:</label>
                     <input class="inp" type="date" name="data_parcela">

                  
                   <input class="buton" type="submit" value="Confirmar" name="cadastrar"/> 
                </form>
            
            <footer> &#169; 2021 Copyright - <b>John, Leonardo, Paulo Sergio, Robério.</b></footer>
            

</body>
</html>

    <?php
    
      $CrudFormaPagamento = new Formaspagamentos();
      if(isset($_POST['cadastrar'])):
            $idvenda = $_POST['idvenda'];
            $tipo_pagamento = $_POST['tipo_pagamento'];
           
    
            $CrudFormaPagamento->setIdVenda($idvenda);
            $CrudFormaPagamento->setTipoPagamento($tipo_pagamento);
            

            if($CrudFormaPagamento->insert_forma_pagamento()){

                try {
                    /*novamente agora em vez de passa idvenda passou idforma_de_pagamento para a pagina finalizar*/
                    $idforma_de_pagamento = $CrudFormaPagamento->insert_forma_pagamento($idforma_de_pagamento,$idvenda, 0);
                      header("Location:finalizar_venda.php?idforma_de_pagamento=" . $idforma_de_pagamento);

                } catch (PDOException $err) {
                    echo $err->getMessage();
                }
               
            }
      endif;
    ?>



  

