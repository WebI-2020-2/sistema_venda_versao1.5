<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("../../controller/Parcelas.php");

?>

<!DOCTYPE html>
<html>
<head>
    <script src="views/js/script.js"></script>
    <script src="views/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="utf-8">
    <title class="titulo">escolhar a forma como vai pagar</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
        <body>
            
           <fieldset class="formulario">
                    <fieldset>
                    <h2>escolhar escolhar a quantidade de parcelas?</h2>
                        <form method='post' action="processa_finalizar_venda.php">
                        <input type="hidden" name="idforma_de_pagamento" value="<?php echo($idforma_de_pagamento=$_GET['idforma_de_pagamento']); ?>">
                        <label>valor total da comprar</label>
                      
                        <input type="text" name="valortotalparcela" 
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
                        

                               
                             <br><br><label>quantidade de parcelas que desejar pagar?</label>
                            <input type="text" name="numerodeparcelas"><br><br>
                              
                            <input class="botao" type="submit" value="confirmar a forma de pagamento" name="cadastrar">
                        </form>     
                    </fieldset>    
            </fieldset>

</body>
</html>


 

   


