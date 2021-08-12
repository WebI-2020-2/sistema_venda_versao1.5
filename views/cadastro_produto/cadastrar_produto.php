

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../../controller/produto.php';

?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../public/css/style.css">
    <script type="text/javascript" src="script.js"></script>
 
    
  <meta charset="utf-8">


  <title>cadastrar de produto</title>
</head>
<body>
  <h2>cadastro de produto</h2>


  <fieldset style="width: 500px;">
    <!--id fitensVendas ajudar para controlar o javascript -->
    <div id="fitensVendas">

       
                
         <form method='post' action="processa_cadastra_produto.php">

        <label class="dados"  for='nomedoproduto'> nome do perfume </label><br><br>
        <input class="entrada" type="text" name="nomedoproduto" placeholder="Digite o nome do produto?"><br><br>

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

</body>
</html>

