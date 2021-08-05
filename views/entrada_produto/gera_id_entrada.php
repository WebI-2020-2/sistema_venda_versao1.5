<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("../../controller/Entrada.php");

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
                        <h2>cadastro de entrada</h2>
                       <label class="dados" for='idfornecedor'> nome do fornecedor</label><br><br>
                        <select name="idfornecedor">
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

                   
                </fieldset><br><br>
                       <input class="botao" type="submit"  value="realizar entrada de produtos" name="cadastrar">
                 
                </form>
            </fieldset>
    </fieldset>
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




