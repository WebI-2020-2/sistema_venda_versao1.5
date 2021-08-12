<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once ('../controller/ItensDevolucao/ItensDevolucao.php');
include_once('../controller/Devolucao/Devolucao.php') ;



?>

<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Cadastro de Devolucoes - WEB I</title>

</head>

<body>
 
    <fieldset><br><br>
        <form method='post' action="">

            <h2>cadastro itens de devolução</h2>

                <select name="idvenda"> 
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

                                            $data = $conn->query('SELECT idvenda, datavenda FROM venda');

                                            foreach($data as $row) {
                                                 echo  '<option value="'.$row['idvenda'].'">'.$row['datavenda']. '-'.$row['idvenda'].'</option>';

                                            }

                                            } catch(PDOException $e) {
                                            echo 'ERROR: ' . $e->getMessage();
                                        }
                                    ?>

                            </option>
                </select><br><br>


                <label class="dados" for='quantidadedevolvida'> Quantidadedevolvida: </label>    
                <input class="entrada" type="text" name="quantidadedevolvida"/><br><br>


                <label class="dados" for='datadevolucao'> Datadevolucao: </label>    
                <input class="entrada" type="date" name="datadevolucao"/><br><br>


                <label class="dados" for='descricaodadevolucao'> Descricaodadevolucao: </label>    
                <input class="entrada" type="text" name="descricaodadevolucao"/><br><br>

                <label class="dados" for='venda'> venda: </label>    

                <h2>cadastro devolução</h2>

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
            
            

            <input class="botao" type="submit" name="cadastrar"/>
            
        </form>
        
    </fieldset>
    

</body>
</html>

  <?php
    
      $devolucao = new Devolucao;
      $itensdevolucao = new ItensDevolucao;

      if(isset($_POST['cadastrar'])):
            /*cadastrar devolução*/
            $idvenda = $_POST['idvenda'];
            $quantidadedevolvida = $_POST['quantidadedevolvida'];
            $datadevolucao = $_POST['datadevolucao'];
            $descricaodadevolucao = $_POST['descricaodadevolucao'];
        
            $devolucao->setIdvenda($idvenda);
            $devolucao->setQuantidadedevolvida($quantidadedevolvida);
            $devolucao->setDatadevolucao($datadevolucao);
            $devolucao->setDescricaodadevolucao($descricaodadevolucao);

            /* cadastrar itens devolução*/
            $iddevolucao = $_POST['iddevolucao'];
            $idproduto = $_POST['idproduto'];
            $quantidade_devolvida = $_POST['quantidade_devolvida'];
            $datadevolvida = $_POST['datadevolvida'];
           
            $itensdevolucao->setIddevolucao($iddevolucao);
            $itensdevolucao->setIdproduto($idproduto);
            $itensdevolucao->setQuantidade_devolvida($quantidade_devolvida);
            $itensdevolucao->setDatadevolvida($datadevolvida);
            



            if($devolucao->insert()){
                echo "devolucao ". $descricaodadevolucao. " inserido com sucesso";
            }
      endif;
    ?>
