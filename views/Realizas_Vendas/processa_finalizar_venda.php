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
                <link rel="stylesheet" href="../../public/css/inicio.css">
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

                    <form method="post" action="index.php">
                        <h1 class="titulo">Venda Realizada com Sucesso!</h1>
                        <input class="buton" type="submit" name="nova-venda" value="realizar nova venda">

                    </form>

        <footer> &#169; 2021 Copyright - <b>John, Leonardo, Paulo Sergio, Robério.</b></footer>
                    
</body>
</html>