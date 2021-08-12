<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("../../controller/Formapagamentos.php");

?>
 


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
	<title class="titulo">escolhar a forma como vai pagar</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
        <body>
        	<h2>escolhar a forma como vai pagar</h2>
	       <fieldset class="formulario">
                <form method='post' action="">

                    <fieldset>
                        <input type="hidden" name="idvenda" value="<?php echo($idvenda=$_GET['idvenda']); ?>">                 

                    <label class="dados" for='tipo_pagamento'>formas de pagamento</label><br><br>
                    <select name="tipo_pagamento">
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

                     <label>qual data melhor para o pagamento</label>
                     <input type="date" name="data_parcela">

                  
                   <input class="botao" type="submit" value="confirmar a forma de pagamento" name="cadastrar"/> 
                </form>
                        
            </fieldset>

                    
	        </fieldset>

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



  

