<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
    require_once'../../controller/Fornecedor.php';
    require_once'../../controller/Contato_Fornecedor.php';
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
	<title>cadastrar de Fornecedor </title>
</head>
<body>
  
    <form method='post' action="">

        <fieldset>
            <!--Cadastro de fornecedor-->

            <center><h2>Cadastro de Fornecedor</h2></center>

            <form method="post" action="">
                <br><label class="dados" for='cnpj'>CNPJ</label>
                <br><input class="entrada" type="text" name="cpnj"  placeholder="Digite o numero do cpnj do fornecedor" style="width:350px;"><br><br>

                <br><label class="dados" for='razaosocial'>Nome da Fantasia</label>    
                <br><input class="entrada" type="text" name="razaosocial" placeholder="digite nome a razão social?" /><br><br>    
                     

        </fieldset><br><br>   

        <fieldset>
            <center><h2>contatos do fornecedor</h2></center>
           
          
              <br><label class="dados" for='telefone_fornecedor'>telefone do fornecedor</label>
            <br><input class="entrada" type="text" name="telefone_fornecedor"  placeholder="Digite o numero do telefone do fornecedor" style="width:350px;"><br><br>

            <br><label class="dados" for='WhatsappFornecedor'>whatsapp do fornecedor</label>    
            <br><input class="entrada" type="text" name="WhatsappFornecedor" placeholder="digite whatsapp do fornecedor" /><br><br>

             <br><label class="dados" for='telefone_fornecedor'>email do fornecedor</label>
            <br><input class="entrada" type="email" name="email_fornecedor"  placeholder="Digite o email do fornecedor" style="width:350px;"><br><br>


             <input class="botao" type="submit"  name="cadastrar">   
        </fieldset>

             
    </form>



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



