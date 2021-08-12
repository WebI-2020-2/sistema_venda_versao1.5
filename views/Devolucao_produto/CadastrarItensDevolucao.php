<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/ItensDevolucao.php';

?>
   
<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Cadastro de Itens Devolucao - WEB I</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
   <?php
     
      $itensdevolucao = new ItensDevolucao;
      if(isset($_POST['Cadastrar'])):
            //$idproduto = $_POST['idproduto'];
            $iddevolucao = $_POST['iddevolucao'];
            $idproduto = $_POST['idproduto'];
            $quantidade_devolvida = $_POST['quantidade_devolvida'];
            $datadevolvida = $_POST['datadevolvida'];
            //$datavencimento = $_POST['datavencimento'];
            
            //$produto->setIdproduto($idproduto);
            $itensdevolucao->setIddevolucao($iddevolucao);
            $itensdevolucao->setIdproduto($idproduto);
            $itensdevolucao->setQuantidade_devolvida($quantidade_devolvida);
            $itensdevolucao->setDatadevolvida($datadevolvida);
            

            if($itensdevolucao->insert()){
                echo "A Quantidade da devolucao ". $quantidade_devolvida. " foi inserida com sucesso";
            }
      endif;
      //input type="submit" value="Cadastrar"
    ?>

        <fieldset>

        <form method='post' action="">          

            <br><label class="dados" for='iddevolucao'> Descricao da Devolucao </label>    
            <select name="iddevolucao">
              <option> Selecione </option>
                        <option>
                            <?php
                                /*
                                * Método de conexão sem padrões
                                */

                                $username = 'postgres';
                                $password = '123456';

                                try {
                                    $conn = new PDO('pgsql:host=localhost;dbname=John2', $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $data = $conn->query('SELECT iddevolucao, descricaodadevolucao FROM devolucao');

                                    foreach($data as $row) {
                                         echo  '<option value="'.$row['iddevolucao'].'">'.$row['iddevolucao']. '-'.$row['descricaodadevolucao'].'</option>';

                                    }

                                    } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>

                            </option>
                     </select><br><br> 

                     <br><label class="dados" for='idproduto'> Nome do Produto </label>    
            <select name="idproduto">
              <option> Selecione </option>
                        <option>
                            <?php
                                /*
                                * Método de conexão sem padrões
                                */

                                $username = 'postgres';
                                $password = '123456';

                                try {
                                    $conn = new PDO('pgsql:host=localhost;dbname=John2', $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $data = $conn->query('SELECT idproduto, nomedoproduto FROM produto');

                                    foreach($data as $row) {
                                         echo  '<option value="'.$row['idproduto'].'">'.$row['idproduto']. '-'.$row['nomedoproduto'].'</option>';

                                    }

                                    } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>

                            </option>
                     </select><br><br>

            <br><label class="dados" for='quantidade_devolvida'> Quantidade Devolvida</label>
            <br><input class="entrada" type="text" name="quantidade_devolvida"  placeholder="Digite a quantidade devolvida"/>

            <br><label class="dados" for='datadevolvida'> Data devolvida </label>    
            <br><input class="entrada" type="date" name="datadevolvida"/>  
            
            
             <br><br><td><button class="botao" name="Cadastrar" type="submit">Cadastrar</button></td>
        </form>
         </fieldset>
</body>
</html>
