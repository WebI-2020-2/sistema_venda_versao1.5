<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
    require_once'../../controller/Fornecedor.php';
    require_once'../../controller/Contato_Fornecedor.php';
?>


<!DOCTYPE html>
<html>
<head>
      <link rel="stylesheet" type="text/css" href="../../public/css/CadastrarFornecedor.css">
	<meta charset="utf-8">
	<title>cadastrar de Fornecedor </title>
</head>
<body>
     <section id="nav-test">
      <div id="nav-container">
          <ul>
           
              <li class="nav-li"><a href="../../Login2/usuarios.php">USUARIOS <img src="../../public/imagem/clientes.png"></a></li>
            
             <li class="nav-li"><a href="../views/Cadastro_fornecedor/Cadastro_fornecedor.php">FORNECEDOR <img src="../../public/imagem/fornecedor.png"></a></li>
               
               <li class="nav-li"><a href="../../Login2/AdministracaodoSistema.php">ADMINISTRAÇÃO <img src="../../public/imagem/administracao.png"></a></li> 

          </ul>
          <img class="logo" src="../../public/imagem/LOGO2.png">

      </div>

  </section>
    <form method='post' action="">


             <h1 class='titulo'>Cadastro de Fornecedor</h1>
            <form method="post" action="">
                <br><label class="dados" for='cnpj'></label>
                <br><input class="inp" type="text" name="cpnj" placeholder="Digite o CNPJ"><br><br>

                <br><label class="dados" for='razaosocial'></label>    
                <br><input class="inp" type="text" name="razaosocial" placeholder="Razao Social" /><br><br>    
                     

        <br><br>   
           <h1 class="titulo">Contatos do Fornecedor</h1>
           
          
              <br><label class="dados" for='telefone_fornecedor'></label>
            <br><input class="inp" type="text" name="telefone_fornecedor"  placeholder="Digite o Telefone "><br><br>

            <br><label class="dados" for='WhatsappFornecedor'></label>    
            <br><input class="inp" type="text" name="WhatsappFornecedor" placeholder="Digite o whatsapp" /><br><br>

             <br><label class="dados" for='telefone_fornecedor'></label>
            <br><input class="inp" type="email" name="email_fornecedor"  placeholder="Digite o email"><br><br>


             <input class="buton" type="submit"  name="cadastrar"> 
             
    </form>
    <footer> &#169; 2021 Copyright - <b>John, Leonardo, Paulo Sergio, Robério.</b>
    <a href ='logout.php'>Sair</a>
 </footer>
 </body>
</html>


<?php
      

      $fornecedor = new Fornecedor();
      $contato_fornecedor = new Contato_Fornecedor(); 

      if(isset($_POST['cadastrar'])):

            $cpnj = $_POST['cpnj'];
            $razaosocial = $_POST['razaosocial'];
        
            $fornecedor->setCnpj($cpnj);
            $fornecedor->setRazaoSocial($razaosocial);

         

            if($fornecedor->insert()){

                 try {
                        $idfornecedor = $fornecedor->insert($idfornecedor, date("Y-m-d"), 0);
                        /*index.php?idcliente significa que vou passa o ultimo idvenda da tabela para proximo pagina
                         para proximo pagina */
                        header("Location:Cadastro_fornecedor.php?idfornecedor=" . $idfornecedor);


                    } catch (PDOException $err) {
                        echo $err->getMessage();
                    }  
                
            }   

            $idfornecedor = $_GET['idfornecedor'];
            $telefone_fornecedor = $_POST['telefone_fornecedor'];
            $email_fornecedor = $_POST['email_fornecedor'];
            $whatsappfornecedor = $_POST['WhatsappFornecedor'];


            $contato_fornecedor->setIdFornecedor($idfornecedor);
            $contato_fornecedor->setTelefone_fornecedor($telefone_fornecedor);
            $contato_fornecedor->setEmail_fornecedor($email_fornecedor);
            $contato_fornecedor->setWhatsappfornecedor($whatsappfornecedor);

            if($contato_fornecedor->insert_contato_fornecedor()){
                echo "cadastro realizado com sucesso";

            }  

                 
   
      endif;     
?>



