<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("../../controller/Parcelas.php");

?>


<?php
    
      $CrudParcelas = new Parcelas();
      if(isset($_POST['cadastrar'])):
            $idforma_de_pagamento = $_POST['idforma_de_pagamento'];
            $numerodeparcelas = $_POST['numerodeparcelas'];
            $valortotalparcela = $_POST['valortotalparcela'];
         
           
            $CrudParcelas->setNumerosdeparcelas($numerodeparcelas);
            $CrudParcelas->setIdForma_de_pagamento($idforma_de_pagamento);
            $CrudParcelas->setValorTotalParcela($valortotalparcela);
            

            if($CrudParcelas->insert_parcela()){

            echo "venda finalizada com sucesso";  
            }

            
      endif;
     
     
    ?>
 <!DOCTYPE html>
            <html>
            <head>
    
            </head>
                <body>

                    <form method="post" action="index.php">
                        <input type="submit" name="nova-venda" value="realizar nova venda">

                    </form>

                    
                </body>
</html>