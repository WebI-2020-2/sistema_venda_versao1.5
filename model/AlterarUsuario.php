<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../controller/Usuario.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

	<title>Alteração de usuarios - WEB I</title>

</head>

<body>
	<h3>Alterar Usuario</h3>
	<fieldset>
	<?php
		//Alterar Cliente

		$idusuario = $_POST['idusuario'];
		$nomeusuario = $_POST['nomeusuario'];
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$cargo = $_POST['cargo'];
		$sexo = $_POST['sexo'];
		$adm = $_POST['adm'];
		

		if (isset($_POST['alterarDados']));
		{
		 $usuario = new Usuarios;

		 	$usuario->setNomeusuario($nomeusuario);
		 	$usuario->setLogin($login);
		 	$usuario->setSenha($senha);
	    	$usuario->setCargo($cargo);
            $usuario->setSexo($sexo);
            $usuario->setAdm($adm);
		 	$usuario->update($idusuario);

		 }

		//endif;
	?>

	<form method='post' action="">
		<br><label for='nomeusuario'> Nome do Usuário</label>
            <br><input type="text" name="nomeusuario" value="<?php echo $nomeusuario;?>"/>

		<br><br><label for='login'> Login</label>
			<br><input type="text" name="login" value="<?php echo $login;?>"/>

		<br><br><label for='senha'> Senha</label>
			<br><input type="text" name="senha" value="<?php echo $senha;?>"/>
		<br><br><label for='cargo'> Cargo</label>
			<br><input type="text" name="cargo" value="<?php echo $cargo;?>"/>
            <br><br><label for='sexo'> Sexo</label>
            <br><input type="text" name="sexo" value="<?php echo $sexo;?>"/>
            <br><br><label for='adm'> Adm</label>
            <br><input type="text" name="adm" value="<?php echo $adm;?>"/>		
		
		<input type="hidden" name="idusuario" value="<?php echo $idusuario;?>"/>
		<br><br><input type="submit" value="AlterarDados"/><br>
		<br><br><br><a href=ListarUsuario.php>Lista de usuários</a>

	</form>
						<!-- Fim da tabela -->
</fieldset>
</body>
</html>