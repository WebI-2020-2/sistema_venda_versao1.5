<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../controller/Usuario.php';

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>cadastrar cliente</title>
</head>
<body>
    <h1>sistema de venda</h1>

    <fieldset>
   
  
    <form method='post' action="">

     <label for='usuario'> Usuario </label>    
        <input type="text" name="usuario"/><br><br>

     <label for='senha'> Senha </label>    
        <input type="password" name="senha"/><br><br>

         <input type="submit" value="logar" name="logar"/>
        
    </form>
    </fieldset>

        <?php
    
        if (isset($_POST['logar'])){
                                            
                       
  
      $Usuario = new Usuarios;
      if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['senha'])){
            
            $usuario =addslashes($_POST['usuario']);
            $senha =addslashes($_POST['senha']); 
           
            $Usuario->setIdUsuario($usuario);
            $Usuario->setSenha($senha);
            
          };
        }  
    ?>

</body>
</html>

