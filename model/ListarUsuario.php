<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../controller/Usuario.php';

?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
        <title>Lista de usuarios - WEB I</title>
</head>

<body>
   <h2>Lista dos usuários Cadastrados no sistema</h2>
   <fieldset>
    <!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover", width="80%">
                <thead>
                    <tr class="active", style="font-weight: bold">

                        <td>Nome dos usuários</td>
                        <td>Login</td>
                        <td>Senha</td>
                        <td>Cargo</td>
                        <td>Sexo</td>
                        <td>ADM</td>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    
                    $usuario=New Usuarios;

                    //exclusao de Usuario
                    if (isset($_POST['excluir'])){
                                            
                        $idusuario = $_POST['idusuario'];
                        
                        $usuario->delete($idusuario);
                    }
                                                         
                    
                    

                    foreach ($usuario->findAll() as $key => $value) { ?>
          
                    <tr>
                        <td> <?php echo $value->nomeusuario;?> </td>

                        <td> <?php echo $value->login;?> </td>

                        <td> <?php echo $value->senha;?> </td>

                        <td> <?php echo $value->cargo;?> </td>

                        <td> <?php echo $value->sexo;?> </td>

                        <td> <?php echo $value->adm;?> </td>

                        <td>

                        <form method="post" action="AlterarUsuario.php">
                            <tr>
                                <td><input name="idusuario" type="hidden" value="<?php echo $value->idusuario;?>"/> </td>         
                                <td><input name="nomeusuario" type="hidden" value="<?php echo $value->nomeusuario;?>"/></td> 
                                <td><input name="login" type="hidden" value="<?php echo $value->login;?>"/></td> 
                                <td><input name="senha" type="hidden" value="<?php echo $value->senha;?>"/></td> 
                                <td><input name="cargo" type="hidden" value="<?php echo $value->cargo;?>"/></td> 
                                <td><input name="sexo" type="hidden" value="<?php echo $value->sexo;?>"/></td>
                                <td><input name="adm" type="hidden" value="<?php echo $value->adm;?>"/></td> 
                                
                            </tr>
                                <td><button name="alterar" type="submit">Alterar</button></td>

                         </form>
<td>
                            <form method="post" >
                                <input name="idusuario" type="hidden" value="<?php echo $value->idusuario;?>"/>
                                <button name="excluir" type="submit" >Excluir</button>
                            </form>
                        </td>

                    </tr>
                    
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->
<br><br><br><a href=../views/CadastrarUsuario.php><td><button name="Cadastrar novo Usuário" type="submit">Cadastrar novo Usuário</button></td></a>

<br><br><a href=../login2/dashboard.php><td><button name="Voltar" type="submit">Voltar</button></td></a>



    </form>
</fieldset>
</body>
</html>
