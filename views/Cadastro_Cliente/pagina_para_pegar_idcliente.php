<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
    require_once'../../controller/Clientes.php';
    require_once'../../controller/Contato_Cliente.php';
    require_once'../../controller/Endereco_cliente.php';
?>

<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>cadastro de cliente</title>
     <link rel="stylesheet" type="text/css" href="../../public/css/pagina_para_pegar_idcliente2.css">
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
    

        <form method="post" action="">
            <h1 class="titulo">Cadastro de cliente</h2>
            <label class="dados" for='nomecliente'></label><br><br>
            <input class="inp" type="text" name="nomecliente" placeholder="Digite Nome do Cliente" /><br><br>

            <label class="dados" for='cpfcliente'></label>    
            <input class="inp" type="text" name="cpfcliente" placeholder="Digite o CPF"/><br><br>

            <label class="dados" for='rgcliente'></label>    
            <input class="inp" type="text" name="rgcliente" placeholder="Digite o RG"/><br><br>

            <label class="dados" for='sexocliente'></label>    
            <input class="inp" type="text" name="sexocliente" placeholder="Digite o SEXO"/><br><br>

            <label class="inp2" for='datanascimento'> Data Nascimento: </label>    
            <input class="inp2" type="date" name="datanascimento"/><br><br>

            <input class="buton" type="submit" name="proximo" value="proximo">
        </form>
 
        <footer> &#169; 2021 Copyright - <b>John, Leonardo, Paulo Sergio, Robério.</b></footer>

</body>
</html>

<?php

$cliente = new Clientes;
     if(isset($_POST['proximo'])) {

         $nomecliente = $_POST['nomecliente'];
            $cpfcliente = $_POST['cpfcliente'];
            $rgcliente = $_POST['rgcliente'];
            $sexocliente = $_POST['sexocliente'];
            $datanascimento = $_POST['datanascimento'];

            $cliente->setNome($nomecliente);
            $cliente->setCpfCliente($cpfcliente);
            $cliente->setRgCliente($rgcliente);
            $cliente->setSexoCliente($sexocliente);
            $cliente->setDataNascimento($datanascimento);

             if($cliente->insert()){
                    
            }

            try {
                        $idcliente = $cliente->insert($idcliente, date("Y-m-d"), 0);
                        /*index.php?idcliente significa que vou passa o ultimo idvenda da tabela para proximo pagina
                         para proximo pagina */
                        header("Location:CadastrarCliente.php?idcliente=" . $idcliente);


                    } catch (PDOException $err) {
                        echo $err->getMessage();
                    }

    }
    

?>









