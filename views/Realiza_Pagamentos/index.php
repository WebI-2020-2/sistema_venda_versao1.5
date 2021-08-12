

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../../controller/Pagamentos.php';

?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="script.js"></script>
 
    
  <meta charset="utf-8">


  <title>Realizar Pagamento de Parcela</title>
</head>
<body>
  <h2>cadastro de pagamento</h2>


  <fieldset style="width: 500px;">
    <!--id fitensVendas ajudar para controlar o javascript -->
    <div id="fitensVendas">

       
                
         <form method='post' action="processa_cadastra_produto.php">

        <label class="dados"  for='valor_pagamento'> valor do pagamento </label><br><br>
        <input type="text" name="valor_pagamento"><br><br>

        <label class="dados"  for='idmarca'> marca </label> 
             <select name="idmarca">
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

                                    $data = $conn->query('SELECT marca, idmarca FROM marca');

                                    foreach($data as $row) {
                                        echo  '<option value="'.$row['idmarca'].'">'.$row['marca'].'-'.$row['idmarca'].'</option>';

                                    }
                                } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>
                    
                        </option>
                 </select><br><br>


                 <label>categoria</label>
                   <select name="idcategoria">
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

                                    $data = $conn->query('SELECT categoria, idcategoria FROM categoria');

                                    foreach($data as $row) {
                                         echo  '<option value="'.$row['idcategoria'].'">'.$row['categoria'].'-'.$row['idcategoria'].'</option>';

                                    }
                                } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>
                    
                        </option>
                 </select><br><br>

     <label class="dados" for='valor'>data de vencimento</label>    
        <input class="entrada" type="date" name="datavencimento"><br><br>


       
        <input  type="submit" value="inserir_produto" name="cadastrar">
        
    </form>
        

    </div>

    
   
  </fieldset>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="../../public/js/style.js"></script>

</body>
</html>

