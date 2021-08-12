<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


    
require_once '../controller/Endereco_Cliente.php';
?>
   
<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Cadastro de endereco_clientes - WEB I</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
   <?php
     
      $endereco_cliente = new Endereco_cliente;
      if(isset($_POST['Cadastrar'])):
            //$idproduto = $_POST['idproduto'];

            $idcliente = $_POST['idcliente'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $bairro = $_POST['bairro'];
            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $cep = $_POST['cep'];
           
            //$datavencimento = $_POST['datavencimento'];
            
            //$produto->setIdproduto($idproduto);
            $endereco_cliente->setCidade($cidade);
            $endereco_cliente->setEstado($estado);
            $endereco_cliente->setIdcliente($idcliente);
            $endereco_cliente->setBairro($bairro);
            $endereco_cliente->setRua($rua);
            $endereco_cliente->setNumero($numero);
            $endereco_cliente->setCep($cep);
      

            if($endereco_cliente->insert()){
                echo "O endereço do cliente ". $_POST['idcliente']. " foi inserida com sucesso";
            }
      endif;
      //input type="submit" value="Cadastrar"
    ?>

        <fieldset>

        <form method='post' action="">            
            <br><label class="dados" for='cidade'> cidade: </label>
            <br><input class="entrada" type="text" name="cidade"  placeholder="Digite a cidade"/>

            <br><label class="dados" for='estado'>estado: </label>    
            <br><input class="entrada" type="text" name="estado"/><br><br>

            <br><label class="dados" for='bairro'>bairro: </label>    
            <br><input class="entrada" type="text" name="bairro"/><br><br>

            <br><label class="dados" for='rua'>rua: </label>    
            <br><input class="entrada" type="text" name="rua"/><br><br>

            <br><label class="dados" for='numero'>numero: </label>    
            <br><input class="entrada" type="text" name="numero"/><br><br>

            <br><label class="dados" for='cep'>cep: </label>    
            <br><input class="entrada" type="text" name="cep"/><br><br>


             <br><label class="dados" for='idcliente'> Selecione o Cliente:  </label>   
            <select name="idcliente"> 
            <option> Selecione </option>
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

                                    $data = $conn->query('SELECT idcliente, nomecliente FROM cliente');

                                    foreach($data as $row) {
                                         echo  '<option value="'.$row['idcliente'].'">'.$row['idcliente']. '-'.$row['nomecliente'].'</option>';

                                    }

                                    } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>

                            </option>
                     </select><br><br>
            




             <br><br><td><button class="botao" name="Cadastrar" type="submit">Cadastrar</button></td>
            

        </form>
         </fieldset>
</body>
</html>
