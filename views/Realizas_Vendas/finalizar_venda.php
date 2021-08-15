<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("../../controller/Parcelas.php");

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../public/css/finalizar_venda.css">
  
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
                        <form method='post' action="processa_finalizar_venda.php">
                            <h1 class="titulo">Quantidade de Parcelas</h1>
                    
                        <input class="inp" type="hidden" name="idforma_de_pagamento" value="<?php echo($idforma_de_pagamento=$_GET['idforma_de_pagamento']); ?>">
                        <label class="inp">Valor Total da Compra: </label>
                      
                        <input class="inp" type="text" name="valortotalparcela" 
                        value="<?php  
                        $username = 'jeglqcbjjjuymy';
                        $password = '0ad662fe8fe884dc3326e28e229daa2ec896848d88ac3066e7c418d9405db45a';

                                try {
                                    $conn = new PDO('pgsql:host=ec2-34-194-14-176.compute-1.amazonaws.com;dbname=d5gv25ellk3j9v', $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $data = $conn->query('SELECT valortotal FROM venda ORDER BY valortotal DESC LIMIT 1');

                                    foreach($data as $row) {
                                         echo  $row['valortotal'];

                                    }
                                } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                } ?>">  
                        

                               
                             <br><br><label class="inp">Quantidade Parcela:</label>
                            <input class="inp" type="text" name="numerodeparcelas"><br><br>
                              
                            <input class="buton" type="submit" value="confirmar a forma de pagamento" name="cadastrar">
                        </form>   

                        <footer> &#169; 2021 Copyright - <b>John, Leonardo, Paulo Sergio, Robério.</b></footer>

</body>
</html>


 

   


