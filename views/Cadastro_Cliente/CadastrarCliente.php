<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
    require_once'../../controller/Clientes.php';
    require_once'../../controller/Contato_Cliente.php';
    require_once'../../controller/Endereco_cliente.php';


?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../public/css/cliente2.css">
	<meta charset="utf-8">
	<title>cadastrar cliente</title>
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

            <h1 class="titulo">Contatos de Cliente</h1>
    <form method='post' action="">
      
            <!--Cadastro de Cliente-->
            
             <!--Contatos de Cliente-->
            <input type="hidden" name="idcliente" value="<?php echo($idcliente=$_GET['idcliente']); ?>">

            
             <br><label class="dados" for='telefone'></label>
            <br><input class="inp"  type="text" name="telefone"  placeholder="Digite o Telefone"><br><br>

            <br><label class="dados" for='email'></label>    
            <br><input class="inp"  type="email" name="email" placeholder="Digite o email"/><br><br>

            <br><label class="dados" for='whatsapp'></label>    
            <br><input class="inp" type="text" name="whatsapp" placeholder="Digite  o Whatsapp" /><br><br>

                 <!--endereço do Cliente-->

            <h1 class="titulo">Endereço do cliente</h1>

            
            <br><label class="dados" for='cidade'></label>
            <br><input class="inp"  type="text" name="cidade"  placeholder="Digite a cidade"><br><br>

            <br><label class="dados" for='estado'></label>    
            <br><input class="inp" type="text" name="estado" placeholder="Digite o Estado"/><br><br>

            <br><label class="dados" for='bairro'></label>    
            <br><input class="inp"  type="text" name="bairro" placeholder="Digite o Bairro"/><br><br>

            <br><label class="dados" for='rua'></label>    
            <br><input class="inp"type="text" name="rua" placeholder="Digite a Rua"/><br><br>

            <br><label class="dados" for='numero'></label>    
            <br><input class="inp"  type="text" name="numero" placeholder="Digite o Numero"/><br><br>

            <br><label class="dados" for='cep'></label>    
            <br><input class="inp" type="text" name="cep"placeholder="Digite o CEP"/><br><br>


    	 <input class="buton" type="submit" value="Finalizar Cadastro" name="cadastrar"/>
        
    </form>
         <footer> &#169; 2021 Copyright - <b>John, Leonardo, Paulo Sergio, Robério.</b></footer>
	</body>
</html>


<?php
      

      $endereco_cliente = new Endereco_cliente();
      $contato_cliente = new Contato_Cliente(); 
      if(isset($_POST['cadastrar'])):
            /*dados referente a cliente */
           
            /*contato cliente*/

            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $idcliente = $_GET['idcliente'];
            $whatsapp = $_POST['whatsapp'];


            $contato_cliente->setTelefone($telefone);
            $contato_cliente->setEmail($email);
            $contato_cliente->setIdcliente($idcliente);
            $contato_cliente->setWhatsapp($whatsapp);

            if($contato_cliente->insert()){
                echo "O telefone ". $telefone. " do";
            }       

            
      endif;

      if(isset($_POST['cadastrar'])):

         /*dados referente ao endereço do cliente */
            $idcliente=$_POST['idcliente'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado']; 
            $bairro = $_POST['bairro'];
            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $cep = $_POST['cep'];

            $endereco_cliente->setIdcliente($idcliente);
            $endereco_cliente->setCidade($cidade);
            $endereco_cliente->setEstado($estado);
            $endereco_cliente->setBairro($bairro);
            $endereco_cliente->setRua($rua);
            $endereco_cliente->setNumero($numero);
            $endereco_cliente->setCep($cep);

            if($endereco_cliente->insert()){
                echo "O endereço do cliente ". $_POST['idcliente']. " foi inserida com sucesso";
            }
      
      endif;
     
?>



